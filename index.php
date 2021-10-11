<?php
header('Access-Control-Allow-Origin:' . $_SERVER['SERVER_NAME']);
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

header('Access-Control-Max-Age:4000');
header('Content-Type: application/json');
try {
    $db = new PDO('mysql:host=localhost;dbname=shoppinglist;charset=utf8', 'root', 'root');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from item";
    
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    header('HTTP/1.1 200 OK');
    print json_encode($results);

} 
catch (PDOException $pdoexception) {

    print "<p>Tietokantayhteyden avaaminen epäonnistui. " . $pdoexception->getMessage();
}
?>