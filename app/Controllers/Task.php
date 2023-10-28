<?php

namespace App\Controllers;

use App\Entities\Enty;

class Task extends BaseController
{
    private $model; 
	private $current_user;
	
	public function __construct()
	{
        $this->model = new \App\Models\TaskModel;
		$this->current_user = service('auth')->getCurrentUser();
	}
	
    public function index()
	{
		$data = $this->model->paginateTasksByUserId($this->current_user->id);
		
		return view("Task/index", [
			'tasks' => $data,
            'pager' => $this->model->pager
		]);
	}

    public function show ($id)
    {
        $task = $this->getTaskOr404($id);
		
		return view('Task/show', [
            'task' => $task
        ]);
	}

    public function new()
	{

		$task = new Enty;
		
		return view('Task/new', [
		    'task' => $task
        ]);
	}

    public function create()
	{
		
        $task = new Enty($this->request->getPost());
				
		$task->user_id = $this->current_user->id;

		if ($this->model->insert($task)) {

			return redirect()->to("/task/show/{$this->model->insertID}")
							 ->with('info', 'Task created successfully');
		
        } else {

			return redirect()->back()
							 ->with('errors', $this->model->errors())
							 ->with('warning', 'Invalid data')
							 ->withInput();
		}
	}

    public function edit($id)
	{
        $task = $this->getTaskOr404($id);
		
		return view('Task/edit', [
            'task' => $task
        ]);
	}

    public function update($id)
	{		
		$task = $this->getTaskOr404($id);
		
		$post = $this->request->getPost();
		unset($post['user_id']);
		
		$task->fill($post);
		
		if ( ! $task->hasChanged()) {
			
            return redirect()->back()
                             ->with('warning', 'Nothing to update')
                             ->withInput();
		}
		
        if ($this->model->save($task)) {
				
	        return redirect()->to("/task/show/$id")
	                         ->with('info', 'Task updated successfully');
							 
		} else {
			
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid data')
							 ->withInput();
			
		}
	}

    public function delete($id)
	{
        $task = $this->getTaskOr404($id);
		
        if ($this->request->getMethod() === 'post') {
			
            $this->model->delete($id);
			
			return redirect()->to('/task')
                             ->with('info', 'Task deleted');
		}
		
		return view('Task/delete', [
            'task' => $task
        ]);
	}

	public function search()
    {
        $tasks = $this->model->search($this->request->getGet('q'), $this->current_user->id);
		
		return $this->response->setJSON($tasks);
	}
	
    private function getTaskOr404($id)
	{			
		/*
		$task = $this->model->find($id);
		
		if ($task !== null && ($task->user_id !== $user->id)) {
		
			$task = null;
			
		}
		*/

		$task = $this->model->getTaskByUserId($id, $this->current_user->id);

		if ($task === null) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id not found");
			
		}		
		
		return $task;
	}	
     
}