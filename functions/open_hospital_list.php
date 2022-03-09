<?php

    require_once '../db_connect.php';

    $database->query("CALL openHospitalList(".$_POST['ID_visit'].")");
    header("Location: ../medical_lists.php");
