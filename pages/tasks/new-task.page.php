<?php
    require(__DIR__.'/../../services/Database.php');
    $db = new Database;

    $cars = $db->getAllRows('SELECT car.*, customer.first_name, customer.last_name from car JOIN customer on customer.id = car.customer_id;')

?>
<div class="card">
    <h5 class="card-header">Taak toevoegen</h5>
    <div class="card-body">
        <form action="/pages/tasks/tasks.actions.php?action=new" method="post">
            <h4>Auto</h4>
            <div class="form-group">
                <label for="first_name">Voornaam</label>
                <select name="car" class="form-control">
                    <?php foreach ($cars as $car): ?>
                        <option value="<?= $car['id'] ?>"><?= $car['first_name'] . ' ' . $car['last_name'] . '\'s ' . $car['brand'] . ' ' . $car['type'] ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="first_name">Klus</label>
                <input type="text" class="form-control" name="task" placeholder="Klus">
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>