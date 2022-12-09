<?php
require_once('connect.php');
extract($_POST);
$query = pg_query($conn, "SELECT * FROM authors where id = '{$id}'");

if($query){
    $resp['status'] = 'success';
    $resp['data'] = pg_fetch_array($query);
}else{
    $resp['status'] = 'success';
    $resp['error'] = 'An error occured while fetching the data. Error: '.$conn->error;
}
echo json_encode($resp);
