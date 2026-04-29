<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ItemOrders Controller
 *
 * @property \App\Model\Table\ItemOrdersTable $ItemOrders
 * @method \App\Model\Entity\ItemOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItemOrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders'],
        ];
        $itemOrders = $this->paginate($this->ItemOrders);

        $this->set(compact('itemOrders'));
    }

    /**
     * View method
     *
     * @param string|null $id Item Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemOrder = $this->ItemOrders->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('itemOrder'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemOrder = $this->ItemOrders->newEmptyEntity();
        if ($this->request->is('post')) {
            $itemOrder = $this->ItemOrders->patchEntity($itemOrder, $this->request->getData());
            if ($this->ItemOrders->save($itemOrder)) {
                $this->Flash->success(__('The item order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item order could not be saved. Please, try again.'));
        }
        $orders = $this->ItemOrders->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('itemOrder', 'orders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemOrder = $this->ItemOrders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemOrder = $this->ItemOrders->patchEntity($itemOrder, $this->request->getData());
            if ($this->ItemOrders->save($itemOrder)) {
                $this->Flash->success(__('The item order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item order could not be saved. Please, try again.'));
        }
        $orders = $this->ItemOrders->Orders->find('list', ['limit' => 200])->all();
        $this->set(compact('itemOrder', 'orders'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemOrder = $this->ItemOrders->get($id);
        if ($this->ItemOrders->delete($itemOrder)) {
            $this->Flash->success(__('The item order has been deleted.'));
        } else {
            $this->Flash->error(__('The item order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
