<?php
$opt=[
PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
];
$dbh=new PDO("mysql:host=localhost;dbname=test","root","",$opt);
?>
