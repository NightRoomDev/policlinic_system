<?php

    require_once '../db_connect.php';

    $database->query("UPDATE `specialization` SET `name_specialization` = '".$_POST['name_specialization']."' WHERE `ID_specialization` = ".$_POST['ID_specialization']."");
    header("Location: ../specialization.php");