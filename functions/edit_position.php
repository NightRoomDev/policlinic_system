<?php

    require_once '../db_connect.php';

    $database->query("UPDATE `position` SET `name_position` = '".$_POST['name_position']."' WHERE `ID_position` = ".$_POST['ID_position']."");
    header("Location: ../position.php");