<?php

function isLanguageDatabaseActive()
{
    try {
        $con = mysqli_connect('localhost', 'root', '', 'language_db');
        $_SESSION['language_db'] = true;
        return;
    }
    catch(Exception $e) {
        $_SESSION['language_db'] = false;
        return;
    }
}

function isCurrencyDatabaseActive()
{
    try {
        $con = mysqli_connect('localhost', 'root', '', 'currency_db');
        $_SESSION['currency_db'] = true;
        return;
    }
    catch(Exception $e) {
        $_SESSION['currency_db'] = false;
        return;
    }
}


if (!isset($_SESSION['calculator']))
{
    $_SESSION['calculator'] = null;
}

if (!isset($_SESSION['button']))
{
    $_SESSION['button'] = null;
}
function setLanguageCookie()
{
    if (isset($_COOKIE["language"]) != null)
    {
        return;
    }
    setcookie("language", "polish");
}

function switchLanguageCookie()
{
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    if (!isset($_COOKIE["language"]))
    {
        return;
    }
    var_dump(getLanguageCookie());
    if (getLanguageCookie() == "polish")
    {
        setcookie("language", "english");
    }
    else
    {
        setcookie("language", "polish");
    }

    var_dump($_COOKIE["language"]);
}
function getLanguageCookie()
{
    return $_COOKIE["language"];
}

function getTextInLanguage($name, $lang, $original)
{
    if (!$_SESSION['language_db'])
    {
        echo $original;
        return;
    }

    $con = mysqli_connect('localhost', 'root', '', 'language_db');

    try {
        $sql = 'SELECT field FROM languages WHERE field = '."\"$name\"";
        $result = mysqli_query($con, $sql);
        if (!isset(mysqli_fetch_all($result)[0]))
        {
            throw new Exception();
        }
    }
    catch(Exception $e) {
        echo $original;
        $_COOKIE["language"] = "polish";
        return;
    }


    if ($lang == "polish")
    {
        $sql = 'SELECT polish FROM languages WHERE field = '."\"$name\"";
        $result = mysqli_query($con, $sql);
        echo implode(mysqli_fetch_all($result)[0]);
    }
    else if ($lang == "english")
    {
        $sql = 'SELECT english FROM languages WHERE field = '."\"$name\"";
        $result = mysqli_query($con, $sql);
        echo implode(mysqli_fetch_all($result)[0]);
    }
}