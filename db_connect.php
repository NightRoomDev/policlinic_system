<?php 

    require_once 'db_config.php';

    $database = new mysqli($db_config['host'], $db_config['user_name'], $db_config['password'], $db_config['db_name']);