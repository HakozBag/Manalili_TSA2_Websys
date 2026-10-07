<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\UserModel;

class TaskController extends BaseController
{
    public function index()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->where('task_date', date('Y-m-d'))
                                   ->where('is_archived', 0)
                                   ->findAll();
        return view('welcome_message', $data);
    }

    public function tasks()
    {
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->where('is_archived', 0)->findAll();
        return view('tasks_list', $data);
    }

    public function profile()
    {
        $userModel = new UserModel();
        
        // Fetch the currently logged-in user based on their session ID
        $userId = session()->get('id');
        $data['user'] = $userModel->find($userId);

        return view('profile', $data);
    }

    public function about()
    {
        return view('about');
    }

    public function new()
    {
        return view('tasks_create');
    }

    public function create()
    {
        $taskModel = new TaskModel();

        $rules = [
            'title'     => 'required|min_length[3]',
            'task_date' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel->save([
            'title'     => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $taskModel = new TaskModel();
        $data['task'] = $taskModel->find($id);

        if (!$data['task'] || $data['task']['is_archived'] == 1) {
            return redirect()->to('/tasks')->with('error', 'Task not found.');
        }

        return view('tasks_edit', $data);
    }

    public function update($id)
    {
        $taskModel = new TaskModel();

        $rules = [
            'title'     => 'required|min_length[3]',
            'task_date' => 'required|valid_date',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $taskModel->update($id, [
            'title'     => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
        ]);

        return redirect()->to('/tasks')->with('success', 'Task updated successfully.');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();
        
        $taskModel->update($id, ['is_archived' => 1]);
        
        return redirect()->to('/tasks')->with('success', 'Task archived successfully.');
    }
}