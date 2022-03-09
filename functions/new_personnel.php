<?php

    require_once '../db_connect.php';
    require_once 'generate_password.php';

    $sql = "INSERT INTO `personnel` (`fio`, `date_birth`, `address`, `phone`, `gender`, `passport_data`, `login`, `password`, `ID_position`, `ID_specialization`) 
    VALUES ('".$_POST['fio']."', '".$_POST['date_birth']."', '".$_POST['address']."', '".$_POST['phone']."', '".$_POST['gender']."', '".$_POST['passport_data']."', '".$_POST['login']."', '".gen_password()."',".$_POST['ID_position'].", ".$_POST['ID_specialization'].")";
    $query = $database->query($sql);
    header("Location: ../personnel.php");