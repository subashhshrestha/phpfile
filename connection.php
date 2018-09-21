<?php
define('hostname', 'sampleserversrl.mysql.database.azure.com');
define('user', 'mysqladmin@sampleserversrl');
define('password', 'P@ssw0rd');
define('databaseName', 'tripsahayatri');
$connect = mysqli_connect(hostname, user, password, databaseName);
?>