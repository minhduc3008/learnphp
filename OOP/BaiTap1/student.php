<?php

class Student
{
    protected $fullName;
    protected $email;
    protected $phone;
    protected $gender;
    // Set
    public function setName($fullName)
    {
        $this->fullName = $fullName;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    // Get
    public function getName()
    {
        return $this->fullName;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public static function getMessageError($inputName)
    {
        if (empty($_POST[$inputName])) {
            if ($inputName === 'fullName') {
                return 'Please enter your full name';
            } else if ($inputName === 'email') {
                return 'Please enter your email address';
            } else if ($inputName === 'phone') {
                return 'Please enter your phone number';
            } else if ($inputName === 'gender') {
                return 'Please enter your gender';
            }
        }
        return;
    }

    public static function isFormSubmitted() 
    {
        return isset($_POST['btn-submit']);
    }

    // Sử lý submit form 
    public function processForm()
    {
        if (self::isFormSubmitted()) {
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        }

        $errFullName = self::getMessageError('fullName');
        if (!$errFullName) {
            $this->setName($fullName);
        }

        $errEmail = self::getMessageError('email');
        if (!$errEmail) {
            $this->setEmail($email);
        }

        $errPhone = self::getMessageError('phone');
        if (!$errPhone) {
            $this->setPhone($phone);
        }

        $errGender = self::getMessageError('gender');
        if (!$errGender) {
            $this->setGender($gender);
        }

    }

}

$student = new Student;

$student->processForm();

$errFullName = Student::getMessageError('fullName');
$errEmail = Student::getMessageError('email');
$errPhone = Student::getMessageError('phone');
$errGender = Student::getMessageError('gender');