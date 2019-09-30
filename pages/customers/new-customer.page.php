<div class="card">
    <h5 class="card-header">Klant toevoegen</h5>
    <div class="card-body">
        <form action="/pages/customers/customers.actions.php?action=new" method="post">
            <h4>Persoon</h4>
            <div class="form-group">
                <label for="first_name">Voornaam</label>
                <input type="text" class="form-control" name="first_name" placeholder="Voornaam">
            </div>
            <div class="form-group">
                <label for="last_name">Achternaam</label>
                <input type="text" class="form-control" name="last_name" placeholder="Achternaam">
            </div>
            <div class="form-group">
                <label for="last_name">Achternaam</label>
                <input type="number" class="form-control" name="leeftijd" placeholder="Leeftijd">
            </div>

            <h4>Auto</h4>
            <div class="form-group">
                <label for="brand">Merk</label>
                <input type="text" class="form-control" name="brand" placeholder="Merk">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" placeholder="Type">
            </div>

            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>