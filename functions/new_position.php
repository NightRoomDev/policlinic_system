<?php

    require_once '../db_connect.php';

    $database->query("INSERT INTO `position` (`name_position`) VALUES ('".$_POST['name_position']."')");
    header("Location: ../position.php");