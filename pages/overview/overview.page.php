<div class="tab-content" id="myTabContent">
    <ul class="nav nav-tabs">
        <li class="nav-item active">
            <a class="nav-link" data-toggle="tab" href="#klanten">Klanten</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#autos">Autos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#klussen">Klussen</a>
        </li>
    </ul>
    <?php
        include(__DIR__ . '/../customers/overview.page.php');
        include(__DIR__ . '/../cars/overview.page.php');
        include(__DIR__ . '/../tasks/overview.page.php');
    ?>
</div>