<?php

class User extends Model
{
    public function getGender($value)
    {
        return $value == 1 ? 'Nam' : 'Nữ';
    }

    public function getFamily($value)
    {
        switch ($value) {
            case 1:
                $value = 'Gia đình số 1';
                break;
            case 2:
                $value = 'Gia đình số 2';
                break;
            case 3:
                $value = 'Gia đình số 3';
                break;
        }
        return $value;
    }
}