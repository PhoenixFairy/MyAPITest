<?php
include_once 'result.php';
include_once '../api.php';
include_once '../ServerFunctions_1.php';
require_once '../Defined/resultConsts.php';
if(!(isset($_POST[ 'username'])) or !(isset($_POST[ 'password'])) or !(isset($_POST[ 'key']))){
    $result = new result(RESULT_ERROR, RESULT_ERROR_NO_PARAM);
    $result_str = json_encode($result);
    echo $result_str;
    exit();
}
$username = $_POST[ 'username'];
$password = $_POST[ 'password'];
$key = $_POST[ 'key'];
if (MyMet::verifyKey($key)) {
    $serverid = ServerFunctions_1::createServer($username, $password);
    # If Key Verified , Create Server.
    # Delete Key in database.
    $userid = ServerFunctions_1::createUser($username, $password);
    # Create User.
    ServerFunctions_1::setServerOwner($userid, $serverid);
    ServerFunctions_1::setServerMem(SERVER_MEM, $serverid);
    # Print Result
    $result = new result(RESULT_SUCCESS, RESULT_SUCCESS_RETURN_ERROR_VALUE);
    # Object
    $result_str = json_encode($result);
    echo $result_str;
    # Print Json Str to Explorer.
    
}


    