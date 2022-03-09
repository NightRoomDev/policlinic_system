<?php

    require_once '../db_connect.php';

    // $database->query("CALL closeHospitalList(".$_GET['ID_hospital_list'].")");
    $database->query("UPDATE `hospital_list` SET `hospital_list`.`date_close` = '".date('Y-m-d')."' WHERE `hospital_list`.`ID_hospital_list` = ".$_GET['ID_hospital_list']."");
    header("Location: ../medical_lists.php");
