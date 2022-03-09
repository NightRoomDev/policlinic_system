<?php

    require_once '../db_connect.php';

    $database->query("DELETE FROM `specialization` WHERE `ID_specialization` = ".$_GET['id']."");
    header("Location: ../specialization.php");