<?php
require_once 'inc/headers.php';
$input = json_decode(file_get_contents('php://input'));
$id = filter_var($input->id,FILTER_SANITIZE_STRING);
try {

    $db = openDb();
    $query = $db->prepare('delete from item where id=(:id)');
    $query->bindValue(':id', $id,PDO::PARAM_INT);
    $query->execute();
    header('HTTP/1.1 200 OK');
    $data = array('id' => $id);
} 
catch (\PDOException $pdoexception) {

    header('HTTP/1.1 500 Internal Server Error');
    print json_encode($pdoexception->getMessage());

}
?>