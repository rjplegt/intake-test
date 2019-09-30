<?php

require_once(__DIR__ . '/../../services/Database.php');
require(__DIR__ . '/../../classes/Car.php');

$db = new Database;
$cars = $db->getAllRows('SELECT car.id FROM car');

?>
<div class="tab-pane fade" id="autos" role="tabpanel">
    <table class="table">
        <thead>
        <tr>
            <th>Klant</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Klussen</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $car = new Car();
        foreach ($cars as $car_id):
            $car->loadCar($car_id['id']);
            $owner = $car->getCustomerOfCar();
            ?>
            <tr>
                <td><?= $owner->getFirstName() . ' ' . $owner->getLastName() ?></td>
                <td><?= $car->getBrand() ?></td>
                <td><?= $car->getType() ?></td>
                <td><?= $car->getNumberOfTasksOfCar() ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>