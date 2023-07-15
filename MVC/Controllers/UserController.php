<?php

class UserController
{
    protected $model;

    public function __construct()
    {
        $this->model = new User;
    }
    public function index()
    {
        view('users.index', [
            'title' => 'MVC in PHP',
            'users' => $this->model->getAll(),
        ]);
    }

    public function create()
    {
        view('users.form', [
            'headingTitle' => 'Create a new User',
            'actionUrl'    => 'index.php?controller=user&action=store'
        ]);
    }

    public function store()
    {
        $inputs = $_POST;
    
        $errorMessage = $this->validate();
        
        if (empty($errorMessage)) {
            // insert to database

            $this->model->create([
                'personal_id' => $inputs['personal_id'],
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'password' => $inputs['password'],
                'gender' => $inputs['gender'],
                'birthday' => $inputs['birthday'],
                'family_id ' => $inputs['family_id'],
            ]);

            return redirect('index.php?controller=user');
        }

        view('users.form', [
            'errorMessage' => $errorMessage,
        ]);
    }

    public function edit()
    {
        $user = $this->model->findById($_GET['id'] ?? 0);

        if (!$user) {
            echo 'Employee not found';
            return;
        }

        view('users.form', [
            'headingTitle' => 'Edit a Employee',
            'user' => $user,
            'actionUrl' => 'index.php?controller=user&action=update&id='.$user->id,
        ]);
    }


    public function update()
    {
        $inputs = $_POST;
        $userId = $_GET['id'] ?? 0;

        $user = $this->model->findById($_GET['id'] ?? 0);

        if (!$user) {
            echo 'Employee not found';
            return;
        }

        $errorMessage = $this->validate();

        if (empty($errorMessage)) {
            // Update to database
            $this->model->update([
                'personal_id' => $inputs['personal_id'],
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'password' => $inputs['password'],
                'gender' => $inputs['gender'],
                'birthday' => $inputs['birthday'],
                'family_id ' => $inputs['family_id'],

            ], $userId);

            return redirect('index.php?controller=user');
        }

        view('users.form', [
            'headingTitle' => 'Edit a Employee',
            'user' => $user,
            'errorMessage' => $errorMessage,
        ]);
    }

    public function delete()
    {
        $this->model->deleteById($_GET['id'] ?? 0);
        return redirect('index.php?controller=user');
    }

    public function validate()
    {
        $inputs = $_POST;
        $errorMessage = [];
        // Validate
        if (empty($inputs['name'])) {
            $errorMessage['name'] = 'Vui lòng nhập tên của bạn';
        } 

        if (empty($inputs['personal_id'])) {
            $errorMessage['personal_id'] = 'Vui lòng nhập số căn cước của bạn';
        }

        if (empty($inputs['email'])) {
            $errorMessage['email'] = 'Vui lòng nhập email của bạn';
        } 

        if (empty($inputs['password'])) {
            $errorMessage['password'] = 'Vui lòng nhập mật khẩu của bạn';
        }

        if (empty($inputs['birthday'])) {
            $errorMessage['birthday'] = 'Vui lòng nhập ngày sinh của bạn của bạn';
        }

        if (empty($inputs['gender'])) {
            $errorMessage['gender'] = 'Vui lòng chọn giới của bạn';
        }

        return $errorMessage;
    }
}