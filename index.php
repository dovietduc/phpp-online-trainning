<?php

require(__DIR__ . '/Validate.php');

// init data
$dataForm = [
    'name' => '',
    'email' => ''
];
$rules = [
    'name' => [
        'required'
    ],
    'email' => [
        'required',
        'email',
        'min:3'
    ]
];
$validate = new Validate($dataForm);
$validate->setRules($rules);


// call method validate
$validate->validateForm();

// get errors message
$errors = $validate->getErrors();


echo "<pre>";
print_r($errors);