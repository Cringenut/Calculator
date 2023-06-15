<?php

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