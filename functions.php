<?php

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

function kurstWalutaPln($waluta)
{
    $con = mysqli_connect('localhost', 'root', '', 'bank_db');
    $sql = 'SELECT kurs FROM currencies WHERE waluta = '."\"$waluta\"";
    $result = mysqli_query($con, $sql);

    return floatval(implode(mysqli_fetch_all($result)[0]));
}

function kurstPlnWaluta($waluta)
{
    $con = mysqli_connect('localhost', 'root', '', 'bank_db');
    $sql = 'SELECT kurs FROM currencies WHERE waluta = '."\"$waluta\"";
    $result = mysqli_query($con, $sql);

    return round(1/floatval(implode(mysqli_fetch_all($result)[0]))*100)/100;
}