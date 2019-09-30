<?php

require_once(__DIR__ . '/../../services/Database.php');
require(__DIR__ . '/../../classes/Task.php');

$db = new Database;
$jobs = $db->getAllRows('SELECT * FROM task');

?>
<div class="tab-pane fade" id="klussen" role="tabpanel">
    <table class="table">
        <thead>
        <tr>
            <th>Klant</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Taak</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $task = new Task();
        foreach ($jobs as $job):
            $task->loadTask($job['id']);
            $car = $task->getCar();
            $customer = $task->getCustomer($car);
            ?>
            <tr>
                <td><?= $customer->getFirstName() . ' ' . $customer->getLastName() ?></td>
                <td><?= $car->getBrand() ?></td>
                <td><?= $car->getType() ?></td>
                <td><?= $task->getTask() ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>