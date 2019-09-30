<?php


//start session and check if a user is logged in.
require_once(__DIR__ . '/services/AuthenticationCheck.php');

require(__DIR__.'/services/Database.php');
$db = new Database;
$type = $_POST['save_type'];


// TODO: Splits deze file op naar meerdere losse scripts. Eentje voor customer, eentje voor auto, eentje voor klussen.

switch ($type) {
    case 'klant':
        $db->execQuery("INSERT INTO `customer`(`first_name`, `last_name`, `age`) VALUES ('" . $_POST['first_name'] . "', '" . $_POST['last_name'] . "', " . $_POST['leeftijd'] . ")");

        $maxId = (int)$db->getAllRows('SELECT max(ID) as id From customer')[0]['id'];

        $db->execQuery("INSERT INTO `car`(`customer_id`, `brand`, `type`)  VALUES (" . $maxId . ", '" . $_POST['brand'] . "', '" . $_POST['type'] . "')");

        break;

    case 'task':

        try {
            $db->execQuery(" INSERT INTO `task`(`car_id`, `task`, `status`) VALUES (" . (int)$_POST['car'] . ", '" . $_POST['task'] . "', 0)");

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        break;
}
header('Location: overview.php');
