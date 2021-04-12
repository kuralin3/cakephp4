<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
/**
 * Hello Controller
 *
 * @method \App\Model\Entity\Hello[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HelloController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $str = $this->request->getData('text1');
        $msg = 'typed: ' . $str;
        if ($str == null) 
          { $msg = "please type..."; }
        $this->set('message', $msg);
        // $str = $this->request->getData('text1');
        // if ($str != null) {
        //     $str = $this->request->getData('text1');
        //     $this->set('message', 'You typed ' . '['.$str.']');
        // } else {
        //     $this->set('message', 'Type something!');
        // }
        // $this->autoRender = false;
        // if ($a == '') {
        //     $this->setAction('err');
        //     return;
        // }
        // echo "<html><head></head><body>";
        // echo "<h1>Hello!</h1>";
        // echo "<p>これは、サンプルで作成したページです。</p>";
        // echo "</body></html>";
        // if (!$a == '') {
        //     echo " パラメータA: " . $a;
        // }

        // default
        // $hello = $this->paginate($this->Hello);

        // $this->set(compact('hello'));
    }
    public function err()
    {
        $this->autoRender = false;
        echo "<html><head></head><body>";
        echo "<h1>Hello!</h1>";
        echo "<p>パラメータがありませんでした。</p>";
        echo "</body></html>";
    }

    /**
     * View method
     *
     * @param string|null $id Hello id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hello = $this->Hello->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('hello'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hello = $this->Hello->newEmptyEntity();
        if ($this->request->is('post')) {
            $hello = $this->Hello->patchEntity($hello, $this->request->getData());
            if ($this->Hello->save($hello)) {
                $this->Flash->success(__('The hello has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hello could not be saved. Please, try again.'));
        }
        $this->set(compact('hello'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hello id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hello = $this->Hello->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hello = $this->Hello->patchEntity($hello, $this->request->getData());
            if ($this->Hello->save($hello)) {
                $this->Flash->success(__('The hello has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hello could not be saved. Please, try again.'));
        }
        $this->set(compact('hello'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hello id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hello = $this->Hello->get($id);
        if ($this->Hello->delete($hello)) {
            $this->Flash->success(__('The hello has been deleted.'));
        } else {
            $this->Flash->error(__('The hello could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
