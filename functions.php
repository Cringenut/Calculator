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