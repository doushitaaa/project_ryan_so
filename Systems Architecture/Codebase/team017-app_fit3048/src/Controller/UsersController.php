<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\ForgetPassToken;
use Cake\Event\EventInterface;
use Cake\Mailer\Mailer;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property \App\Model\Table\ForgetPassTokenTable $ForgetPassToken
 * @method \App\Controller\User[]|\App\Controller\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'changepass']);
    }

    public function login()
    {
        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            $target = $this->Authentication->getLoginRedirect() ?? '/';

            return $this->redirect($target);
        }

        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function add()
    {
        $currentUser = $this->Authentication->getResult()->getData();
        $this->set('currentUser', $currentUser);
        if ($currentUser['role'] == 1) {
            $user = $this->Users->newEmptyEntity();

            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->getData());

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Your registration was successful'));

                    return $this->redirect(['controller' => 'Users', 'action' => 'index']);
                }
                $this->Flash->error(__('Your registration failed, please check if you have a valid email address or password'));
            }
        } else {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();

            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function forgetpass()
    {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $query = $this->Users->findByEmail($email);
            if ($query->all()->isEmpty()) {
                $this->Flash->error('There is no account associated with this email address');
            } else {
                $token = bin2hex(random_bytes(32));
                $this->loadModel('ForgetPassToken');
                $forgetPassToken = new ForgetPassToken();
                $forgetPassToken -> user_id = $query->first()['id'];
                $forgetPassToken -> token = $token;
                $this->ForgetPassToken->save($forgetPassToken);
                $mailer = new Mailer();
                $mailer->setTransport('ibau');
                $mailer->setEmailFormat('html')
                    ->setTo($email)
                    ->setSubject('IB Australia - Please Reset Your Password')
                    -> viewBuilder()
                        -> setTemplate('default')
                        -> setVar('token', $token)
                        -> setVar('host', Router::url('/', true));
                $mailer->deliver();
                $this->Flash->success('An email has been sent! Please check your mailbox');
            }
        }
    }

    public function changepass()
    {
        $this->loadModel('ForgetPassToken');
        if ($this->request->is('get')) {
            $token = $_GET['token'];
            // Find the token record in the Forgetpasstoken table
            $tokenRecord = $this->ForgetPassToken->find('all', ['conditions' => ['token' => $token, 'is_valid' => 1]])->first();
            if ($tokenRecord) {
                $this->set('token', $token);

                return $this->render('changepass');
            }
            $this->Flash->error('Invalid token or token has expired');
            return $this->redirect(['action' => 'logout']);
        } elseif ($this->request->is('post')) {
            $token = $_POST['token'];
            $newPassword = $_POST['password'];
            $tokenRecord = $this->ForgetPassToken->find('all', ['conditions' => ['token' => $token, 'is_valid' => 1]])->first();
            if ($tokenRecord) {
                // Token is valid; find the user by user_id in the Users table
                $user = $this->Users->get($tokenRecord->user_id);
                // Update the user's password
                $user->password = $newPassword;
                // Save the updated user
                $saveResult = $this->Users->save($user);
                if ($saveResult) {
                    // Update the token to mark it as used
                    $tokenRecord->token = $token;
                    $tokenRecord->is_valid = 0;
                    $this->ForgetPassToken->save($tokenRecord);
                    $this->Flash->success('Password has been successfully reset. Please login using your new password');

                    return $this->redirect(['action' => 'login']);
                } else {
                    $this->Flash->error('New password cannot be changed');
                }
            } else {
                $this->Flash->error('Invalid token or token has expired');
            }
        }
    }

//         * Index method
//         *
//         * @return \Cake\Http\Response|null|void Renders view

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \App\Controller\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $currentUser = $this->Authentication->getResult()->getData();
        if ($id == null || $currentUser['role'] != 1) {
            $id = $currentUser['id'];
        }
        $user = $this->Users->get($id, ['contain' => [],]);
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \App\Controller\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $currentUser = $this->Authentication->getResult()->getData();
        $this->set('currentUser', $currentUser);
        if ($currentUser['role'] == 1) {
            $user = $this->Users->get($id, ['contain' => [],]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->getData());
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Changes has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Changes could not be saved. Please, try again in few minutes'));
            }
            $this->set(compact('user'));
        } else {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \App\Controller\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $currentUser = $this->Authentication->getResult()->getData();
        $this->set('currentUser', $currentUser);
        if ($currentUser['role'] == 1) {
            $this->request->allowMethod(['post', 'delete']);
            $user = $this->Users->get($id);
            if ($user->role == 1) {
                $this->Flash->error(__('This user cannot be deleted'));
            } elseif ($this->Users->delete($user)) {
                $this->Flash->success(__('The user has been deleted.'));
            } else {
                $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        } else {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function index()
    {
        $currentUser = $this->Authentication->getResult()->getData();
        $this->set('currentUser', $currentUser);
        if ($currentUser['role'] == 1) {
            $users = $this->paginate($this->Users);

            $this->set(compact('users'));
        } else {
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
