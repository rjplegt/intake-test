<?php

require_once('../../classes/Task.php');
require_once('../../vendor/autoload.php');

use Rakit\Validation\Validator;

//check if a action isset
if(isset($_GET['action'])){

    $action = $_GET['action'];
    $input = $_POST;

    //used switch statement incase ohter actions need to be added in the future
    switch ($action){
        case 'new':
            createTask($input);
            break;
    }
} else {
    //no action isset, redirect
    header('Location: /index.php?page=overview&action_status=null_action');
}

/**
 * Create a task
 * @param $input
 */
function createTask($input){

    $validator = new Validator;

    $validator = $validator->validate($input, [
        'car' => 'required|numeric',
        'task' => 'required',
    ]);

    //if the input is valid
    if(!$validator->fails()){
        //create a task
        $taskId = Task::createTask((int)$input['car'], $input['task'], 0);

        //if task was successfully made redirect with success status
        if($taskId > 0){
            header('Location: /index.php?page=overview&action_status=create_success');
        } else {
            header('Location: /index.php?page=add-task&action_status=create_failed');
        }
    } else {
        //invalid input redirect validation failed status
        header('Location: /index.php?page=add-task&action_status=validation_failed');
    }

}

