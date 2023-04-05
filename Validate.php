<?php

require(__DIR__ . '/Validate/RequiredValidate.php');
require(__DIR__ . '/Validate/EmailValidate.php');

class Validate {

    private $dataForm = [];

    private $rules = [];

    private $errors = [];


    private $ruleMapClass = [
        'required' => RequiredValidate::class,
        'email' => EmailValidate::class
    ];

    public function __construct($dataForm) 
    {
        $this->dataForm = $dataForm;
    }

    public function setRules($rules) 
    {
        $this->rules = $rules;
    }

    public function validateForm() 
    {
       
        foreach($this->rules as $fieldName => $rules) {

            $valueField = $this->dataForm[$fieldName];

            foreach($rules as $rule) {
                
                // thuc hien validate // solid
                $className = $this->ruleMapClass[$rule];
                $instanceClass = new $className();

                // check validate pass for rule
                $isValidatePass = $instanceClass->passValidate($valueField);
                if(!$isValidatePass) {
                    // add message error
                    $this->errors[$fieldName][] = $instanceClass->showMessage($fieldName);
                    
                }


            }

        }
        
    }

    public function getErrors() 
    {
        return $this->errors;
    }





}