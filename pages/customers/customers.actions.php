<?php

require_once('../../classes/Customer.php');
require_once('../../classes/Car.php');
require_once('../../vendor/autoload.php');

use Rakit\Validation\Validator;

//check if a action isset
if(isset($_GET['action'])){

    $action = $_GET['action'];
    $input = $_POST;

    //used switch statement incase ohter actions need to be added in the future
    switch ($action){
        case 'new':
            createCustomer($input);
            break;
    }
} else {
    //no action isset, redirect
    header('Location: /index.php?page=overview&action_status=null_action');
}

/**
 * Create a customer
 * @param $input
 */
function createCustomer($input){

    $validator = new Validator;

    $validator = $validator->validate($input, [
        'first_name' => 'required',
        'last_name' => 'required',
        'leeftijd' => 'required|numeric',
        'brand' => 'required',
        'type' => 'required'
    ]);

    //if the input is valid
    if(!$validator->fails()){
        //create a customer
        $customerId = Customer::createCustomer($input['first_name'], $input['last_name'], $input['leeftijd']);

        //create the customers car
        $carId = Car::createCar($customerId, $input['brand'], $input['type']);

        //if customer was successfully made redirect with success status
        if($customerId > 0){
            header('Location: /index.php?page=overview&action_status=create_success#klanten');
        } else {
            header('Location: /index.php?page=add-customer&action_status=create_failed');
        }
    } else {
        //invalid input redirect validation failed status
        header('Location: /index.php?page=add-customer&action_status=validation_failed');
    }

}

