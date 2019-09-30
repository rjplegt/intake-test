<?php
    session_start();

    if(isset($_SESSION['logged_in'])){
        header('Location: index.php?page=overview');
    }
?>
<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
<link type="text/css" rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-grid.css">
<style>
    .vertical-center {
        min-height: 80%; /* Fallback for browsers do NOT support vh unit */
        min-height: 80vh; /* These two lines are counted as one :-)       */

        display: flex;
        align-items: center;
    }
</style>
</head>
<body>
<div class="container d-flex justify-content-center vertical-center">
    <div class="card w-50">
        <h5 class="card-header">Inloggen</h5>
        <div class="card-body">
            <form action="authenticate.php" method="POST">
                <?php

                if (isset($_GET['login_failed'])) {
                    ?>

                    <div style="color:red;">Kon niet inloggen: Login of wachtwoord incorrect</div>
                    <?php
                }

                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Naam</label>
                    <input type="text" class="form-control" name="login" placeholder="Naam">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input type="password" class="form-control" name="password" placeholder="Wachtwoord">
                </div>
                <button type="submit" class="btn btn-primary">Inloggen</button>
            </form>

        </div>
    </div>

</div>
</body>
</html>


