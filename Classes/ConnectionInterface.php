<?php 
namespace Classes\Connection;

interface ConnectionInterface
{
    public static function getInstance();
    public function getConnection();
}

?>