<?php
/**
 * 
 * @author Axoford12
 * @author Phoenix
 * 
 * @version 2015-5-11-3
 * @copyright Copyright  2016 by Axoford12
 */
require_once 'MulticraftAPI.php';
require_once 'Defined/Defined.php';
class ServerFunctions_1
{
    // TODO To create a minecraft server
    public static function createServer($servername,$port) {
        $api =  new MulticraftAPI(API_ADDRESS, API_USER, API_KEY);
        $result = $api->createServer($servername,$port);

        $serverid = $result[ 'id'];
       
        # Now implement database
        # Time : 2016-5-12-1
        @ $conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE_NAME); //Conn to database
        $query = "insert into servers values (28000,$serverid)";
        $result = $conn->query($query);
        $conn->close();
        # This Updatement
        return $serverid;
    }
    // TODO To create a minecraft server administrator
    public static function createUser($username,$passwd) {
        
        $email = time()-rand(0,10000).'@autoIncrement.d';//create rand mail address.
        $api =  new MulticraftAPI(API_ADDRESS, API_USER, API_KEY);
        $result = $api->createUser($username,$passwd);
        return $result[ 'id'];
        

    }
    // TODO Set server owner
    public static function setServerOwner($userid,$serverid){
        $api =  new MulticraftAPI(API_ADDRESS, API_USER, API_KEY);
        $result = $api->setServerOwner($serverid,$userid);
        return true;
    }
    // TODO Set server mem
    public static function setServerMem($mem,$serverid){
        $api =  new MulticraftAPI(API_ADDRESS, API_USER, API_KEY);
        $result = $api->updateServer($serverid,array(
            'Mem'
        ),
            array(
                $mem
            ));
        return true;
    }
    // TODO SetServerStop
    public static function stopServer($serverid){
        $api =  new MulticraftAPI(API_ADDRESS, API_USER, API_KEY);
        // Conn to multicraft pane
        $api->suspendServer($serverid);
    }
    // TODO does Server exit.
    public static function doesServerExits($username){
       
        $result = false;
        $api = new MulticraftAPI(API_ADDRESS, API_USER, API_KEY);
        // Conn to multicraft panel
        $servers = $api->listServers();// get Array servers
        $server = $servers[ 'Servers'];
        foreach ($server as $key => $value) {
            if($value == $username){
                $result = true;
                break;
            }
        }// Server exits
        return $result;
    }
    // TODO Add Server restion day in database
    public static function addServerDay($server,$days) {
      @ $conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD,MYSQL_DATABASE_NAME);
      $query = "update servers set resttime = resttine+$days";
      $conn->query($query);
    }
    
}

?>