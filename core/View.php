<?php

class View
{

    public static function template($templateName, $data1215326 = array())
    {

        $file = '../views/' . $templateName . '.tpl.php';

        extract($data1215326);
        unset($data1215326);

        ob_start();
        include ($file);
        $out = ob_get_clean();

        return $out;
    }

}
