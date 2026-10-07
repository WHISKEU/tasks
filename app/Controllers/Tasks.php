<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
    }

    private function requireLogin()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()
                ->to('/login')
                ->with('error', 'Please log in to manage tasks.');
        }

        return null;
    }

    public function today()
    {
        $data['tasks'] = $this->taskModel
            ->where('task_date', date('Y-m-d'))
            ->where('is_archived', 0)
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('welcome', $data);
    }

    public function index()
    {
        $data['tasks'] = $this->taskModel
            ->where('is_archived', 0)
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        return view('tasks/create');
    }

    public function store()
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->taskModel->insert([
            'title' => $this->request->getPost('title'),
            'status' => 'pending',
            'task_date' => $this->request->getPost('task_date'),
            'created_at' => date('Y-m-d H:i:s'),
            'is_archived' => 0
        ]);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $task = $this->taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            return redirect()->to('/tasks');
        }

        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $rules = [
            'title' => 'required|max_length[150]',
            'task_date' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $task = $this->taskModel
            ->where('is_archived', 0)
            ->find($id);

        if (!$task) {
            return redirect()->to('/tasks');
        }

        $this->taskModel->update($id, [
            'title' => $this->request->getPost('title'),
            'task_date' => $this->request->getPost('task_date'),
            'status' => $this->request->getPost('status')
        ]);

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task updated successfully.');
    }

    public function delete($id)
    {
        if ($redirect = $this->requireLogin()) {
            return $redirect;
        }

        $task = $this->taskModel
            ->where('is_archived', 0)
            ->find($id);

        if ($task) {
            $this->taskModel->update($id, [
                'is_archived' => 1
            ]);
        }

        return redirect()
            ->to('/tasks')
            ->with('success', 'Task archived successfully.');
    }
}