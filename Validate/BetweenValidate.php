<?php

class BetweenValidate {

    private $min;
    private $max;
    public function __construct($min, $max) 
    {
       
        $this->min = $min;
        $this->max = $max;
    }


    public function passValidate($valueField) 
    {
        if($valueField >= $this->min && $valueField <= $this->max) {
            return true;
        }
        return false;
    }

    public function showMessage($fieldName) 
    {

        return $fieldName . ' must beween ' . $this->min . ' and ' . $this->max;

    }


}