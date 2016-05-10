<?php
$arr = array(
    array(
        3,
        4
        
    ),
    array(
        4,
        6,
        array(
          
            7,
            9,
            10
        )
    )
);
class TestArray
{
    public static $max = 0;
    public static function findMax($arr) {
      # echo 'start'."    max = ".TestArray::$max."\n";
        
        if(is_array($arr)){
            foreach($arr as $key => $value){
             #  echo 'foreach'."key = $key " ." max = ".TestArray::$max."\n";
                if(!(is_array($value))){
                    if($value > TestArray::$max){
                        TestArray::$max = $value;
                    }
                    continue;
                } else {
                    TestArray::findMax($value);
                }
            }
            
        } else {
            return -1;
        }
        
    }
}
TestArray::findMax($arr);
echo TestArray::$max;
?>