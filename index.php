<?php

//start session and check if a user is logged in.
require_once(__DIR__ . '/services/AuthenticationCheck.php');

//TODO: Format according to PSR-2

//TODO: Get all customers

//TODO: Validate if this data is correct
?>
<!DOCTYPE html>
<html>
<?php
    include('partials/html-head.php');
?>
<body>
    <?php
        include('partials/nav.php');
    ?>
    <div class="container">
        <?php
            $pages = [
                "overview" => "overview/overview.page.php",
                "add-customer" => "customers/new-customer.page.php",
                "add-task" => "tasks/new-task.page.php"
            ];

            $default_page = __DIR__ . '/pages/' . $pages['overview'];



            if(isset($_GET['page'])){
                $page = $_GET['page'];

                if(strlen($page) > 0 && array_key_exists($page, $pages)){
                    include(__DIR__ . '/pages/' . $pages[$page]);
                } else {
                    include($default_page);
                }
            } else {
                include($default_page);
            }
        ?>
    </div>
</body>
</html>