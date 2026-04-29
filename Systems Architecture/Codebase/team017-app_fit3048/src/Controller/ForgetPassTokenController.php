<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ForgetPassToken Controller
 *
 * @property \App\Model\Table\ForgetPassTokenTable $ForgetPassToken
 * @method \App\Model\Entity\ForgetPassToken[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ForgetPassTokenController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $forgetPassToken = $this->paginate($this->ForgetPassToken);

        $this->set(compact('forgetPassToken'));
    }

    /**
     * View method
     *
     * @param string|null $id Forget Pass Token id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $forgetPassToken = $this->ForgetPassToken->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('forgetPassToken'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $forgetPassToken = $this->ForgetPassToken->newEmptyEntity();
        if ($this->request->is('post')) {
            $forgetPassToken = $this->ForgetPassToken->patchEntity($forgetPassToken, $this->request->getData());
            if ($this->ForgetPassToken->save($forgetPassToken)) {
                $this->Flash->success(__('The forget pass token has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forget pass token could not be saved. Please, try again.'));
        }
        $users = $this->ForgetPassToken->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('forgetPassToken', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Forget Pass Token id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $forgetPassToken = $this->ForgetPassToken->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $forgetPassToken = $this->ForgetPassToken->patchEntity($forgetPassToken, $this->request->getData());
            if ($this->ForgetPassToken->save($forgetPassToken)) {
                $this->Flash->success(__('The forget pass token has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The forget pass token could not be saved. Please, try again.'));
        }
        $users = $this->ForgetPassToken->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('forgetPassToken', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Forget Pass Token id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $forgetPassToken = $this->ForgetPassToken->get($id);
        if ($this->ForgetPassToken->delete($forgetPassToken)) {
            $this->Flash->success(__('The forget pass token has been deleted.'));
        } else {
            $this->Flash->error(__('The forget pass token could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
