<?php
/**
 * @author Axoford12
 * @author PhoenixFairy
 * @version 2016-5-11-2
 */
class MyMet{
    /**
     *  this class includes some functions
     */
    public static function addKey(){
        @ $conn = new mysqli('localhost','tes','te','test1th'); //Conn to database
        $query = "insert into ke values (NULL,sha1(".rand()."))";
        $result = $conn->query($query);
        $conn->close();//close database conn
        return $result->affect_rows;
    }
    public static function verifyKey($key){
        @ $conn = new mysqli('localhost','tes','te','test1th'); //Conn to database
        $query = "select * from ke where ke='".$key."'";
        $result = $conn->query($query);
        if($result->num_rows){
            $conn->query("delete from ke where ke='".$key."'");
            return true;
        } else {
            return false;
        }
        $conn->close();
    }
}
@ $conn = new mysqli('localhost','tes','te','test1th'); //Conn to database
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
    

    # Test Verify Key Function.
    # $key = 'f0fe6f5cdb3f0e58a4fd8f8030b2eb9620b2fbfc';
    # if(MyMet::verifyKey($key)){
    #     echo 'Verify!';
    # } else {
    #     echo 'Faild!';
    # }
    
    # Success!;
?>