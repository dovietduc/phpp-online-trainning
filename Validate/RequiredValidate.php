<?php

class RequiredValidate {


    public function passValidate($valueField) 
    {
        if($valueField) {
            return true;
        }
        return false;
    }

    public function showMessage($fieldName, $message) 
    {

        if($message) {
            return $message;
        }

        return $fieldName . ' not blank';

    }


}