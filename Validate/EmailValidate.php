<?php

class EmailValidate {


    public function passValidate($valueField) 
    {
        if(filter_var($valueField, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function showMessage($fieldName, $message) 
    {

        if($message) {
            return $message;
        }
        return $fieldName . ' need true format email';

    }


}