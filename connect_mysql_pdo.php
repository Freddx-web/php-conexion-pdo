<?php
/*
Credentials exlained
First of all we are defining variables that contain connection credentials. This set is familiar to anyone who were using the old mysql_connect() function, save for $charset may be, which was rarely used (although it should have been).

$host stands for the database host. In case of the local development, it is most likely be 127.0.0.1 or localhost. In case of the live site, the actual hostname should be provided by the site admin / hosting provider. Note that connecting through IP address could save you a headache or two, so if you have a trouble with "localhost", try to use 127.0.0.1 instead.
$db is the name of the database in MySQL (the value that you were passing into mysql_select_db()). On your local server it could be anything, while on a live site again it should be given to you by the admin / provider.
$user - a database user
$pass - a database password
$charset is a very important option. It is telling the database in which encoding you are sending the data in and would like to get the data back. Note that due to initially limited support of unicode in the utf8 MySQL charset, it is now recommended to use utf8mb4 instead.
Note it's a good idea to store connection variables ($host, $db etc.) in a separate file. This way you'll be able to have two versions of your code, one for the local server and one for the remote.
*/


$host = '127.0.0.1';  //localhost
$db   = 'test';       //database
$user = 'root';       //root
$pass = '';           //password
$port = "3306";       //Port
$charset = 'utf8mb4'; //charset

$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
try {
     $pdo = new \PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
?>
