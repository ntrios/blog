<?php

class UsersController extends AppController
{
    public $helpers = array('Html', 'Form');
    public $name = 'Users';

    public function index()
    {
        $this->set('users', $this->User->find('all'));
    }

    public function view($id = null)
    {
        $this->set('user', $this->User->findById($id));
    }

    public function add()
    {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('User created sucessfully.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null)
    {
        $this->User->id = $id;

        if ($this->request->is('get')) {
            $this->request->data = $this->User->findById($id);
        } else {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('Your account has been updated.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function delete($id)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        if ($this->User->delete($id)) {
            $this->Flash->success('The user with id: ' . $id . ' has been deleted.');
            $this->redirect(array('action' => 'index'));
        }
    }
}
