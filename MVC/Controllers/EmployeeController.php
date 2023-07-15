<?php

class EmployeeController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Employee;
    }

    public function index()
    {
        view('employees.index', [
            'employees' => $this->model->getAll(),
        ]);
    }

    public function create()
    {
        view('employees.form', [
            'headingTitle' => 'Create a Employee',
            'actionUrl'    => 'index.php?controller=employee&action=store'
        ]);
    }

    public function store()
    {
        $inputs = $_POST;
    
        $errorMessage = $this->validate();
        
        if (empty($errorMessage)) {
            // insert to database

            $this->model->create([
                'name' => $inputs['name'],
                'phone' => $inputs['phone'],
                'email' => $inputs['email'],
                'address' => $inputs['address'],
                'birthday' => $inputs['birthday'],
                'gender' => $inputs['gender'],
            ]);

            return redirect('index.php?controller=employee');
        }

        view('employees.form', [
            'errorMessage' => $errorMessage,
        ]);
    }

    public function edit()
    {
        $employee = $this->model->findById($_GET['id'] ?? 0);

        if (!$employee) {
            echo 'Employee not found';
            return;
        }

        view('employees.form', [
            'headingTitle' => 'Edit a Employee',
            'employee' => $employee,
            'actionUrl' => 'index.php?controller=employee&action=update&id='.$employee->id,
        ]);
    }

    public function update()
    {
        $inputs = $_POST;
        $employeeID = $_GET['id'] ?? 0;

        $employee = $this->model->findById($_GET['id'] ?? 0);

        if (!$employee) {
            echo 'Employee not found';
            return;
        }

        $errorMessage = $this->validate();

        if (empty($errorMessage)) {
            // Update to database
            $this->model->update([
                'name' => $inputs['name'],
                'phone' => $inputs['phone'],
                'email' => $inputs['email'],
                'address' => $inputs['address'],
                'birthday' => $inputs['birthday'],
                'gender' => $inputs['gender'],
            ], $employeeID);

            return redirect('index.php?controller=employee');
        }

        view('employees.form', [
            'headingTitle' => 'Edit a Employee',
            'employee' => $employee,
            'errorMessage' => $errorMessage,
        ]);
    }

    public function delete()
    {
        $this->model->deleteById($_GET['id'] ?? 0);
        return redirect('index.php?controller=employee');
    }

    public function validate()
    {
        $inputs = $_POST;
        $errorMessage = [];
        // Validate
        if (empty($inputs['name'])) {
            $errorMessage['name'] = 'Vui lòng nhập tên của bạn';
        } 

        if (empty($inputs['phone'])) {
            $errorMessage['phone'] = 'Vui lòng nhập số điện thoại của bạn';
        }

        if (empty($inputs['email'])) {
            $errorMessage['email'] = 'Vui lòng nhập email của bạn';
        } 

        if (empty($inputs['address'])) {
            $errorMessage['address'] = 'Vui lòng nhập địa chỉ của bạn';
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