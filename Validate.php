<?php

require(__DIR__ . '/Validate/RequiredValidate.php');
require(__DIR__ . '/Validate/EmailValidate.php');
require(__DIR__ . '/Validate/MinValidate.php');
require(__DIR__ . '/Validate/BetweenValidate.php');

class Validate {

    private $dataForm = [];

    private $rules = [];

    private $errors = [];

    private $messages = [];


    private $ruleMapClass = [
        'required' => RequiredValidate::class,
        'email' => EmailValidate::class,
        'min' => MinValidate::class,
        'between' => BetweenValidate::class
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
                $optionalParams = explode(",", end($ruleArray));
                
                
                // thuc hien validate // solid
                $className = $this->ruleMapClass[$ruleName];
                $instanceClass = new $className(...$optionalParams);

                // check validate pass for rule
                $isValidatePass = $instanceClass->passValidate($valueField);
                if(!$isValidatePass) {
                    $keyMessage = $fieldName . '.' . $ruleName;
                    $message = $this->messages[$keyMessage] ?? null;
                    // add message error
                    $this->errors[$fieldName][] = $instanceClass->showMessage($fieldName, $message);
                    
                }


            }

        }
        
    }

    public function setMessages($messages) 
    {
        $this->messages = $messages;
    }

    public function getErrors() 
    {
        return $this->errors;
    }





}