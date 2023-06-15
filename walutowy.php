<?php

$amount = $_POST['amount'];
$from_currency = $_POST['from_currency'];
$to_currency = $_POST['to_currency'];

if ($from_currency == $to_currency)
{
    echo '<div class="result">';
    echo 'Przeliczona kwota: ' . $amount . ' ' . $from_currency . ' = ' . $amount . ' ' . $to_currency;
    echo '</div>';

    return;
}

// Przeliczanie waluty
$conversion_rates = [
    'PLN-USD' => kurstPlnWaluta('USD'), // Kurs waluty PLN do USD
    'USD-PLN' => kurstWalutaPln('USD'), // Kurs waluty USD do PLN
    'PLN-EUR' => kurstPlnWaluta('EUR'), // Kurs waluty PLN do EUR
    'EUR-PLN' => kurstWalutaPln('EUR')  // Kurs waluty EUR do PLN
];

$currency_pair = $from_currency . '-' . $to_currency;
$converted_amount = $amount * $conversion_rates[$currency_pair];

echo '<div class="result">';
echo 'Przeliczona kwota: ' . $amount . ' ' . $from_currency . ' = ' . $converted_amount . ' ' . $to_currency;
echo '</div>';
