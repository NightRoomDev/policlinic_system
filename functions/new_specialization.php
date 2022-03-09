<?php

    require_once '../db_connect.php';

    $database->query("INSERT INTO `specialization` (`name_specialization`) VALUES ('".$_POST['name_specialization']."')");
    header("Location: ../specialization.php");