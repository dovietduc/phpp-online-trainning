<?php

require(__DIR__ . '/Validate.php');

// init data
$dataForm = [
    'name' => '',
    'email' => 'duc.do@gmail.com'
];
$rules = [
    'name' => [
        'required'
    ],
    'email' => [
        'required',
        'email',
        'min:3',
        'between:3,10'
    ]
];
$messages = [
    'name.required' => 'ban khong duoc phep de trong ten',
    'email.between' => 'email ban phai nhap tu 3 den 10 ki tu',

];
$validate = new Validate($dataForm);
$validate->setRules($rules);
$validate->setMessages($messages);


// call method validate
$validate->validateForm();

// get errors message
$errors = $validate->getErrors();


echo "<pre>";
print_r($errors);