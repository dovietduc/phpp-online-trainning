<?php

class RequiredValidate {


    public function passValidate($valueField) 
    {
        if($valueField) {
            return true;
        }
        return false;
    }

    public function showMessage($fieldName) 
    {

        return $fieldName . ' not blank';

    }


}