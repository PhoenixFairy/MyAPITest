<?php
/**
 * @author Axoford12
 * @author PhoenixFairy
 * @version 2016-5-11
 */
class MyMet{
    /**
     *  this class includes some functions
     */
    public static function addKey(){
        @ $conn = new mysqli('localhost','tes','te','test1th'); //Conn to database
        $query = "insert into ke values (NULL,sha1(".rand()."))";
        $result = $conn->query($query);
        return $result->affect_rows;
    }
}

@ $conn = new mysqli('localhost','tes','te','test1th'); //Conn to database
$key = $_POST[ 'key'];//Get Key
$username = $_POST[ 'username'];//Get username
$passwd = $_POST[ 'passwd'];//Get Passwd

require 'MulticraftAPI.php';
$api =  new MulticraftAPI("http://my.mcdscz.cn/api.php", 'admin', 'a3zLah8p$+fa8t');//Conn to multicraft
    #   $query = "insert into ke values (NULL,sha1(1213))";
    #   $result = $conn->query($query);
    #   Test Add Key
    #   Success!

    # Test Add key Function.
    # for ($i = 0; $i < 10; $i++) {
    #     MyMet::addKey();
    # }
    
    # Success!
?>