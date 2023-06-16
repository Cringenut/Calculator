<?php

require "functions.php";

switchLanguageCookie(); // wykorzystane do zmiany języka nie przez $_POST
header( "Location: index.php" );