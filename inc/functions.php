<?php
// Open connection to database
function openDb() {
$db = new PDO('mysql:host=localhost;dbname=shoppinglist;charset=utf8', 'root', 'root');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

return $db;

}
?>