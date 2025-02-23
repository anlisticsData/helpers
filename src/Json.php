<?php


namespace EdilsonCSilva\Helpers;
class Json{
    function __construct($status=200,$data=[],$extras=[])
    {
        header("HTTP/1.1 ".$status);
        header('Content-Type: application/json');
        $error=!in_array($status,array(200,201));
        $response["state"]=$status;
        $response["data"]=$data;
        $response["extras"]=$extras;
        echo(json_encode($response));
        exit();
    }
}