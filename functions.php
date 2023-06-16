<?php

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
    $connect = @mysqli_connect('localhost', 'root', '', 'language_db');
    if (!$connect)
    {
        echo $original;
        return;
    }

    $con = mysqli_connect('localhost', 'root', '', 'language_db');
    if (!$con)
    {
        echo $original;
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
    else
    {
        echo $original;
    }
}