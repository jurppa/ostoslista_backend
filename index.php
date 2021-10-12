<?php

require_once 'inc/functions.php';
require_once 'inc/headers.php';

try {

    $db = openDb();

    $sql = "select * from item";
    
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    header('HTTP/1.1 200 OK');
    print json_encode($results);

} 
catch (PDOException $pdoexception) {

    header('HTTP/1.1 500 Internal Server Error');
    print json_encode($pdoexception->getMessage());
}
?>