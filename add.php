<?php 
require_once 'inc/headers.php';
require_once 'inc/functions.php';
$input = json_decode(file_get_contents('php://input'));
$description = filter_var($input->description,FILTER_SANITIZE_STRING);
$amount = filter_var($input->amount);

try {

    $db = openDb();
    
    $query = $db->prepare('insert into item(amount,description) values(:amount,:description)');

    $query->bindValue(':amount',$amount,PDO::PARAM_INT);
    $query->bindValue(':description',$description,PDO::PARAM_STR);
    $query->execute();



    header('HTTP/1.1 200 OK');
    $data = array('id' => $db->lastInsertId(), 'amount' => $amount, 'description' => $description);
    print json_encode($data);

} 
catch (PDOException $pdoexception) {

    header('HTTP/1.1 500 Internal Server Error');

    print json_encode($pdoexception->getMessage());
}
?>