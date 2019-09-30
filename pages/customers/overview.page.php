<?php

require_once(__DIR__ . '/../../services/Database.php');
require(__DIR__ . '/../../classes/Customer.php');

$db = new Database;
$customers = $db->getAllRows('SELECT * FROM customer ORDER BY last_name, first_name DESC');

?>
<div class="tab-pane fade show active" id="klanten" role="tabpanel">
    <table class="table">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Aantal autos</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $customer = new Customer();
        foreach ($customers as $customer_id):
            $customer->loadCustomer($customer_id['id']);
            ?>
            <tr>
                <td><?= $customer->getFirstName() . ' ' . $customer->getLastName() ?></td>
                <td><?= $customer->getCarsCount() ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>