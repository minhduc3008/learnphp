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
            'actionUrl' => 'index.php?controller=employees&action=update&id='.$employee->id,
        ]);
    }

    public function update()
    {
        $inputs = $_POST;
        $employeeID = $_GET['id'] ?? 0;

        $family = $this->model->findById($_GET['id'] ?? 0);

        if (!$family) {
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

    public function validate()
    {
        $inputs = $_POST;
        $errorMessage = [];

        // Validate
        if (empty($inputs['name'])) {
            $errorMessage['name'] = 'Name require';
        } 

        if (empty($inputs['phone'])) {
            $errorMessage['phone'] = 'phone require';
        }

        if (empty($inputs['email'])) {
            $errorMessage['email'] = 'email require';
        } 

        if (empty($inputs['address'])) {
            $errorMessage['address'] = 'address require';
        }

        if (empty($inputs['birthday'])) {
            $errorMessage['birthday'] = 'birthday require';
        }

        if (empty($inputs['gender'])) {
            $errorMessage['gender'] = 'gender require';
        }

        return $errorMessage;
    }
}