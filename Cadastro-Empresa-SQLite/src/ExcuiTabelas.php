<?php
include "./init.php";

$db->exec('DROP TABLE IF EXISTS veiculos');
$db->exec("DROP TABLE IF EXISTS drivers");