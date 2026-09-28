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

    public function today()
    {
        $data['tasks'] = $this->taskModel
            ->where('task_date', date('Y-m-d'))
            ->orderBy('id', 'ASC')
            ->findAll();

        return view('welcome', $data);
    }

    public function index()
    {
        $data['tasks'] = $this->taskModel
            ->orderBy('task_date', 'ASC')
            ->findAll();

        return view('tasks/index', $data);
    }
}