<?php
header('Access-Control-Allow-Origin: *' );
header('Access-Control-Allow-Credentials:true');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

header('Access-Control-Max-Age:4000');
header('Content-Type: application/json');
if($_SERVER['REQUEST_METHOD'] === 'OPTIONS')
{
    return 0;
} 
?>