<?php
$conn = pg_connect("host=192.168.1.80 port=5432  user=segma password=segma dbname=segma");
if(!$conn){
    echo "Database connection failed. Error:".$conn->error;
    exit;
}
?>
