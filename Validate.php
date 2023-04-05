<?php

require(__DIR__ . '/Validate/RequiredValidate.php');
require(__DIR__ . '/Validate/EmailValidate.php');
require(__DIR__ . '/Validate/MinValidate.php');

class Validate {

    private $dataForm = [];

    private $rules = [];

    private $errors = [];


    private $ruleMapClass = [
        'required' => RequiredValidate::class,
        'email' => EmailValidate::class,
        'min' => MinValidate::class
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

                $ruleArray = explode(":", $rule);
                $ruleName = $ruleArray[0];
                $optionalParams = end($ruleArray);
                
                // thuc hien validate // solid
                $className = $this->ruleMapClass[$ruleName];
                $instanceClass = new $className($optionalParams);

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