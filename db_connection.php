<?php
$dbConn = 'gcp-sandbox-441117:europe-west9:mysql-test-gcp';
$dbIPpublic = '34.163.85.47';
$dbIPprivate = '';
$dbName = 'ecsoldb';
$dbUser =  $_ENV["CLOUDSQLSTANUSER"]; 
$dbPass =  $_ENV["CLOUDSQLSTANPASS"];
$dsn = "mysql:unix_socket=/cloudsql/{$dbConn};dbname={$dbName}";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
