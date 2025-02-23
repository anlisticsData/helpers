<?php

namespace  EdilsonCSilva\Helpers;

class HttpRequests
{
    private function __clone() {}
    private function __construct() {}

    public static  function Init()
    {
        header('Content-Type: application/json; charset=utf-8');
        $buffer = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $json = file_get_contents('php://input');
            $httpData = json_decode($json, true);
            if (is_array($httpData)) {
                foreach ($httpData as $key => $p) {
                    $buffer[$key] = $p;
                }
            }
        }
        foreach ($_POST as $key => $p) {
            $buffer[$key] = $p;
        }
        foreach ($_GET as $key => $p) {
            $buffer[$key] = $p;
        }
        foreach ($_FILES as $key => $p) {
            $buffer[$key] = $p;
        }
        foreach ($_SERVER as $key => $p) {
            $buffer[$key] = $p;
        }
        foreach (getallheaders() as $header => $value) {
            $buffer[$header] = trim($value);
        }
        return $buffer;
    }
}
