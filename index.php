<?php

//start session and check if a user is logged in.
require_once(__DIR__ . '/services/AuthenticationCheck.php');

header("Location: overview.php");