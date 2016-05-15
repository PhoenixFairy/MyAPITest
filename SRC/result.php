<?php
class result{
    public  $result;
    public $error_reason;
    public function __construct($result,$error_reason) {
        $this->result = $result;
        $this->error_reason = $error_reason;
    }
}