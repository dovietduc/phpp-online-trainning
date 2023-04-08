<?php

class MinValidate {

    private $min;
    public function __construct($min) 
    {
        $this->min = $min;
    }


    public function passValidate($valueField) 
    {
        if($this->min <= strlen($valueField)) {
            return true;
        }
        return false;
    }

    public function showMessage($fieldName, $message) 
    {
        if($message) {
            return $message;
        }
        return $fieldName . ' have min ' . $this->min . ' character';

    }


}