<?php

require "functions.php";

setLanguageCookie();

?>

<!DOCTYPE html>
<html lang="">
<head>
    <link href="visual/index.css" rel="stylesheet" type="text/css">
    <link href="visual/language.css" rel="stylesheet" type="text/css">
    <title>Kalkulator finansowy</title>
    <style>



    </style>
</head>
<body>

<div class="bg">

    <h1>Kalkulator finansowy</h1>

    <form method="get">
        <div class="drop">
            <button class="btn"
                    style="background-image:
                            url(<?php if (getLanguageCookie() == "polish") { echo "visual/poland.png"; } else { echo "visual/united-states.png";}?>"></button>
            <div class="drop-content">
                <button class="btn-language-parent"  id="<?php rand() ?>" name="languge">
                    <a href="language.php" class="btn-language" style="background-color: red"></a>
                </button>
            </div>
        </div>
    </form>
    <div class="github">
        <a href="https://github.com/JuliaWasilewska" class="github-logo"></a>
    </div>



    <div class="container">
        <div class="calculator">
            <h2>Kalkulator kredytowy</h2>
            <form method="post" action="">
                <label for="amount">Kwota kredytu:</label>
                <input type="number" name="amount" id="amount" required>

                <label for="interest_rate">Oprocentowanie nominalne (%):</label>
                <input type="number" name="interest_rate" id="interest_rate" required>

                <label for="loan_period">Okres kredytowania (w latach):</label>
                <input type="number" name="loan_period" id="loan_period" required>

                <label for="payment_method">Sposób spłaty rat:</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="equal_installments">Równe raty</option>
                    <option value="decreasing_installments">Malejące raty</option>
                </select>

                <input type="submit" name="calculate_loan" value="Oblicz">
            </form>

            <?php
            if (isset($_POST['calculate_loan'])) {
                require "kredytowy.php";
            }
            ?>
        </div>
        <div class="calculator">
            <h2>Kalkulator lokat</h2>
            <form method="post" action="">
                <label for="investment_amount">Kwota inwestycji:</label>
                <input type="number" name="investment_amount" id="investment_amount" required>

                <label for="interest_rate">Oprocentowanie nominalne (%):</label>
                <input type="number" name="interest_rate" id="interest_rate" required>

                <label for="compounding_period">Okres kapitalizacji (w miesiącach):</label>
                <input type="number" name="compounding_period" id="compounding_period" required>

                <label for="investment_period">Okres inwestycji (w latach):</label>
                <input type="number" name="investment_period" id="investment_period" required>

                <input type="submit" name="calculate_investment" value="Oblicz">
            </form>

            <?php
            if (isset($_POST['calculate_investment'])) {
                require "lokat.php";
            }
            ?>
        </div>
    </div>

    <div class="container">
        <div class="calculator">
            <h2>Kalkulator walutowy</h2>
            <form method="post" action="">
                <label for="amount">Kwota:</label>
                <input type="number" name="amount" id="amount" required>

                <label for="from_currency">Waluta z:</label>
                <select name="from_currency" id="from_currency" required>
                    <option value="PLN">PLN</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <
                </select>

                <label for="to_currency">Waluta na:</label>
                <select name="to_currency" id="to_currency" required>
                    <option value="PLN">PLN</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>

                </select>

                <input type="submit" name="calculate_currency" value="Przelicz">
            </form>

            <?php

            if (isset($_POST['calculate_currency'])) {
                require "walutowy.php";
            }
            ?>
        </div>
    </div>
</div>


</body>
</html>