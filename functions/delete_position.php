<?php

    require_once '../db_connect.php';

    $database->query("DELETE FROM `position` WHERE `ID_position` = ".$_GET['id']."");
    $sql = "";
    header("Location: ../position.php");