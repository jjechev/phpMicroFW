<?php

class Router
{

    public static $URN;
    public static $URNParts;
    private static $_controller;
    private static $_method;

    public function init()
    {
        self::getURN();
        self::getControllerAndMethod();
        self::dispatcher();
    }

    private static function getURN()
    {
        self::$URN = $_SERVER['REQUEST_URI'];
        self::$URN = substr(self::$URN, 1);

        if (substr(self::$URN, -1, 1) == "/") {
            self::$URN = substr(self::$URN, 0, -1);
        }
        self::$URNParts = explode('/', self::$URN);
    }

    private static function getControllerAndMethod()
    {
        if (isset(self::$URNParts[0]) && self::$URNParts[0] != '') {
            self::$_controller = self::$URNParts[0];
        } else {
            self::$_controller = "homepage";
        }


        if (isset(self::$URNParts[1])) {
            self::$_method = self::$URNParts[1];
        } else {
            self::$_method = "index";
        }

        unset(self::$URNParts[0]);
        unset(self::$URNParts[1]);
    }

    private static function dispatcher()
    {
        $controlerName = "PageController_" . self::$_controller;
        $method = self::$_method;
        $controlerName::$method();
    }

}
