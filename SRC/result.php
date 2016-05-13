<?php
class result{
    private $result;
    private $error_reason;
    public static function __construct($result,$error_reason) {
        $this->result = $result;
        $this->error_reason = $error_reason;
    }
}