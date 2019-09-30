<?php

//start session and check if a user is logged in.
require_once(__DIR__ . '/services/AuthenticationCheck.php');

$type = $_GET['type'];


// TODO: Splits deze file op naar meerdere losse scripts. Eentje voor customer, eentje voor auto, eentje voor klussen.

// TODO: Maak het mogelijk om een auto aan een bestaande klant toe te voegen

// TODO: Maak het mogelijk om autos, klanten en klussen te verwijderen


?>
<form action="opslaan.php" method="POST">
    <?php
    switch ($type){
    case 'klant':
        ?>

        <h3>Persoon</h3>
        <table>
            <tr>
                <td>Voornaam:</td>
                <td><input name="first_name"></td>
            </tr>
            <tr>
                <td>Achternaam:</td>
                <td><input name="last_name"></td>
            </tr>
            <tr>
                <td>Leeftijd:</td>
                <td><input name="leeftijd"></td>
            </tr>
        </table>
        <h3> Auto</h3>
        <table>
            <tr>
                <td>Merk:</td>
                <td><input name="brand"></td>
            </tr>
            <tr>
                <td>Type:</td>
                <td><input name="type"></td>
            </tr>
        </table>

        <?php break;
    case 'task':
    require(__DIR__.'/services/Database.php');
    $db = new Database;

    $cars = $db->getAllRows('SELECT car.*, customer.first_name, customer.last_name from car JOIN customer on customer.id = car.customer_id;')

    ?>
    <form action="opslaan.php">

        <h3> Auto</h3>
        <select name="car">
            <?php foreach ($cars

            as $car): ?>
            <option value="<?= $car['id'] ?>"><?= $car['first_name'] . ' ' . $car['last_name'] . '\'s ' . $car['brand'] . ' ' . $car['type'] ?>

                <?php endforeach; ?>

        </select>
        <table>
            <tr>
                <td>Klus:</td>
                <td><input name="task"></td>
            </tr>
        </table>
        <?php
        } ?>

        <input type="hidden" name="save_type" value="<?= $_GET['type'] ?>">
        <input type="submit" value="Invoeren"/>
    </form>
