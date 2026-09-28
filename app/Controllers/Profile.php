<?php

namespace App\Controllers;
use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['user'] = $this->userModel->find(1);

        return view('profile/index', $data);
    }
}