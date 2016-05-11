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
class ServerFunctions_1
{
    // TODO To create a minecraft server
    public static function createServer($servername,$port) {
        $api =  new MulticraftAPI("http://my.mcdscz.cn/api.php", 'admin', 'a3zLah8p$+fa8t');
        // Conn to Multicraft API
        // User = Admin
        // Do not use it
        $result = $api->createServer($servername,$port);

        $serverid = $result[ 'id'];
       
        # Now implement database
        
        @ $conn = new mysqli('localhost','tes','te','test1th'); //Conn to database
        $query = "insert into servers values (28000,$serverid)";
        $result = $conn->query($query);
        $conn->close();
    }
    // TODO To create a minecraft server administrator
    public static function createUser($username,$passwd) {
        
        $email = time()-rand(0,10000).'@autoIncrement.d';//create rand mail address.
        $api =  new MulticraftAPI("http://my.mcdscz.cn/api.php", 'admin', 'a3zLah8p$+fa8t');
        // Conn to Multicraft API 
        // User = Admin
        // Do not use it.
        $result = $api->createUser($username,$passwd);
        return $result[ 'id'];
        

    }
    // TODO Set server owner
    public static function setServerOwner($userid,$serverid){
        $api =  new MulticraftAPI("http://my.mcdscz.cn/api.php", 'admin', 'a3zLah8p$+fa8t');
        // Conn to Multicraft API
        // User = Admin
        // Do not use it
        
        $result = $api->setServerOwner($serverid,$userid);
        return true;
    }
    // TODO Set server mem
    public static function setServerMem($mem,$serverid){
        $api =  new MulticraftAPI("http://my.mcdscz.cn/api.php", 'admin', 'a3zLah8p$+fa8t');
        // Conn to Multicraft API
        // User = Admin
        // Do not use it
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
        $api =  new MulticraftAPI("http://my.mcdscz.cn/api.php", 'admin', 'a3zLah8p$+fa8t');
        // Conn to multicraft pane
        $api->suspendServer($serverid);
    }
    
}

?>