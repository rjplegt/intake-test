<div class="card">
    <h5 class="card-header">Klant toevoegen</h5>
    <div class="card-body">
        <form action="/pages/customers/customers.actions.php?action=new" method="post">
            <?php
                if(isset($_GET['validation_failed'])){
                    ?>
                    <div class="alert alert-success" role="alert">
                        Vul de velden correct in!
                    </div>
                    <?php
                }
            ?>
            <h4>Persoon</h4>
            <div class="form-group">
                <label for="first_name">Voornaam</label>
                <input type="text" class="form-control" name="first_name" placeholder="Voornaam" required>
            </div>
            <div class="form-group">
                <label for="last_name">Achternaam</label>
                <input type="text" class="form-control" name="last_name" placeholder="Achternaam" required>
            </div>
            <div class="form-group">
                <label for="last_name">Achternaam</label>
                <input type="number" class="form-control" name="leeftijd" placeholder="Leeftijd" required>
            </div>

            <h4>Auto</h4>
            <div class="form-group">
                <label for="brand">Merk</label>
                <input type="text" class="form-control" name="brand" placeholder="Merk" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" placeholder="Type" required>
            </div>

            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>