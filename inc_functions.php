<?php
/*

Written by: Steve Beeston
Date:       June 2012
Purpose:    Provide MySQL login and shared PHP functions for CMS

*/

function sanitiseString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $var;
}


?>