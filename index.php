<?php

require "functions.php";
require "classes.php";

session_start();
setLanguageCookie();
isLanguageDatabaseActive();
isCurrencyDatabaseActive();



?>

<!DOCTYPE html>
<html lang="">
<head>
    <link href="visual/index.css" rel="stylesheet" type="text/css">
    <link href="visual/language.css" rel="stylesheet" type="text/css">
    <title><?php getTextInLanguage("Title", getLanguageCookie(), "Kalkulator finansowy");?></title>
    <style>



    </style>
</head>
<body background="visual/background.png">

    <h1 style="height: 14px"><?php getTextInLanguage("Title", getLanguageCookie(), "Kalkulator finansowy");?></h1>

    <div class="image"></div>
    <div class="box-lang-github">
        <div class="dropdown">
            <button class="dropbtn" style="background-image: url( <?php if (getLanguageCookie() == "polish") {echo "visual/united-states.png";} else {echo "visual/poland.png";} ?>)"></button>
            <div class="dropdown-content" st>
                <a href="language.php" style="background-image: url( <?php if (getLanguageCookie() != "polish") {echo "visual/united-states.png";} else {echo "visual/poland.png";} ?>)"></a>
            </div>
        </div>
        <a href="https://github.com/JuliaWasilewska" class="github">
            <div class="github" style="background-image: url(visual/github-mark-white.png)"></div>
        </a>
    </div>


    <div class="container">
        <div class="calculator">
            <h2 style="height: 12px"><?php getTextInLanguage("Calculator_loan", getLanguageCookie(), "Kalkulator kredytowy");?></h2>
            <form method="post" action="">
                <label for="amount"><?php getTextInLanguage("Loan_amount", getLanguageCookie(), "Kwota kredytu");?>:</label>
                <input type="number" name="amount" id="amount" required>

                <label for="interest_rate"><?php getTextInLanguage("Interest_rate", getLanguageCookie(), "Oprocentowanie nominalne");?> (%):</label>
                <input type="number" name="interest_rate" id="interest_rate" required>

                <label for="loan_period"><?php getTextInLanguage("Okres_kredytowania", getLanguageCookie(), "Okres kredytowania (w latach)");?>:</label>
                <input type="number" name="loan_period" id="loan_period" required>

                <label for="payment_method"><?php getTextInLanguage("Repayment_method", getLanguageCookie(), "Sposób spłaty rat");?>:</label>
                <select name="payment_method" id="payment_method" required>
                    <option value="equal_installments"><?php getTextInLanguage("Equal_installments", getLanguageCookie(), "Równe raty");?></option>
                    <option value="decreasing_installments"><?php getTextInLanguage("Decreasing_installments", getLanguageCookie(), "Malejące raty");?></option>
                </select>

                <input type="submit" name="calculate_loan" value="<?php getTextInLanguage("Calculate", getLanguageCookie(), "Calculate");?>" id="calculate_loan">
            </form>

            <?php
            if (isset($_SESSION['calculator']) && get_class($_SESSION['calculator']) == "calculator_loan" && isset($_SESSION['button']) && $_SESSION['button'] == "calculate_loan")
            {
                $_SESSION['calculator']->setVar();
                $_SESSION['calculator']->calculate();
            }
            else if (isset($_POST['calculate_loan']))
            {
                $_SESSION['button'] = "calculate_loan";
                $_SESSION['calculator'] = new calculator_loan();
                $_SESSION['calculator']->calculate();
                header( "Location: index.php" );
            }
            ?>

        </div>
        <div class="calculator">
            <h2 style="height: 14px"><?php getTextInLanguage("Calculator_investment", getLanguageCookie(), "Kalkulator lokat");?></h2>
            <form method="post" action="">
                <label for="investment_amount"><?php getTextInLanguage("Investment_amount", getLanguageCookie(), "Kwota inwestycji");?>:</label>
                <input type="number" name="investment_amount" id="investment_amount" required>

                <label for="interest_rate"><?php getTextInLanguage("Interest_rate", getLanguageCookie(), "Oprocentowanie nominalne");?> (%):</label>
                <input type="number" name="interest_rate" id="interest_rate" required>

                <label for="compounding_period"><?php getTextInLanguage("Compounding_period", getLanguageCookie(), "Okres kapitalizacji (w miesiącach)");?>:</label>
                <input type="number" name="compounding_period" id="compounding_period" required>

                <label for="investment_period"><?php getTextInLanguage("Investment_period", getLanguageCookie(), "Okres inwestycji (w latach)");?>:</label>
                <input type="number" name="investment_period" id="investment_period" required>

                <input type="submit" name="calculate_investment" value="<?php getTextInLanguage("Calculate", getLanguageCookie(), "Calculate");?>" id="calculate_investment">
            </form>

            <?php
            if (isset($_SESSION['calculator']) && get_class($_SESSION['calculator']) == "calculator_investment" && isset($_SESSION['button']) && $_SESSION['button'] == "calculate_investment")
            {
                $_SESSION['calculator']->setVar();
                $_SESSION['calculator']->calculate();
            }
            else if (isset($_POST['calculate_investment']))
            {
                $_SESSION['button'] = "calculate_investment";
                $_SESSION['calculator'] = new calculator_investment();
                $_SESSION['calculator']->calculate();
                header( "Location: index.php" );
            }
            ?>
        </div>
    </div>

    <div class="container">
        <div class="calculator">
            <h2 style="height: 14px"><?php getTextInLanguage("Calculator_currency", getLanguageCookie(), "Kalkulator walutowy");?></h2>
            <form method="post" action="">
                <label for="amount"><?php getTextInLanguage("Amount", getLanguageCookie(), "Kwota");?>:</label>
                <input type="number" name="currency_amount" id="currency_amount" required>

                <label for="from_currency"><?php getTextInLanguage("Currency_from", getLanguageCookie(), "Waluta z");?>:</label>
                <select name="from_currency" id="from_currency" required>
                    <option value="PLN">PLN</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <
                </select>

                <label for="to_currency"><?php getTextInLanguage("Currency_to", getLanguageCookie(), "Waluta na");?>:</label>
                <select name="to_currency" id="to_currency" required>
                    <option value="PLN">PLN</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>

                </select>

                <input type="submit" name="calculate_currency" value="<?php getTextInLanguage("Calculate", getLanguageCookie(), "Calculate");?>" id="calculate_currency">
            </form>

            <?php
            if (isset($_SESSION['calculator']) && get_class($_SESSION['calculator']) == "calculator_currency" && isset($_SESSION['button']) && $_SESSION['button'] == "calculate_currency")
            {
                $_SESSION['calculator']->setVar();
                $_SESSION['calculator']->calculate();
            }
            else if (isset($_POST['calculate_currency']))
            {
                $_SESSION['button'] = "calculate_currency";
                $_SESSION['calculator'] = new calculator_currency();
                $_SESSION['calculator']->calculate();
                header( "Location: index.php" );
            }
            ?>
        </div>
    </div>


</body>
</html>