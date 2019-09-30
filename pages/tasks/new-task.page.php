<?php
    require(__DIR__.'/../../services/Database.php');
    $db = new Database;

    $cars = $db->getAllRows('SELECT car.*, customer.first_name, customer.last_name from car JOIN customer on customer.id = car.customer_id;')

?>
<form action="/pages/tasks/tasks.actions.php?action=new" method="post">

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
    <input type="submit" value="Invoeren"/>
</form>