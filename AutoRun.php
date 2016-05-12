<?php
/**
 *  @author Axoford12
 *  @author Phoenix
 *  @version 2016-5-12-0
 *  @todo Set Server Suspend
 */
require_once 'Defined/Defined.php';
include 'ServerFunctions_1.php';
@ $conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE_NAME);
// Conn to database
$query = "select * from servers where stopv=1";
$result = $conn->query($query);
$result_rows = $result->num_rows;
for ($i = 0; $i < $result_rows; $i++) {
    $row = $result->fetch_assoc();
    $serverid = $row[ 'serverid'];
    ServerFunctions_1::stopServer($serverid);
}
$conn->close();
?>