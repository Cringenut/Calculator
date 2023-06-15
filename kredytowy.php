<?php

$amount = $_POST['amount'];
$interest_rate = $_POST['interest_rate'] / 100;
$loan_period = $_POST['loan_period'];
$payment_method = $_POST['payment_method'];

if ($payment_method === 'equal_installments') {
    // Obliczanie równych rat
    $monthly_interest_rate = $interest_rate / 12;
    $num_payments = $loan_period * 12;
    $monthly_payment = ($amount * $monthly_interest_rate) / (1 - pow(1 + $monthly_interest_rate, -$num_payments));
    $total_payment = $monthly_payment * $num_payments;

    echo '<div class="result">';
    echo 'Miesięczna rata: ' . number_format($monthly_payment, 2) . ' PLN<br>';
    echo 'Całkowita kwota do spłaty: ' . number_format($total_payment, 2) . ' PLN';
    echo '</div>';
} elseif ($payment_method === 'decreasing_installments') {
    // Obliczanie malejących rat
    $monthly_interest_rate = $interest_rate / 12;
    $num_payments = $loan_period * 12;
    $principal_payment = $amount / $num_payments;
    $total_payment = 0;

    echo '<div class="result">';
    echo 'Raty malejące:<br>';

    for ($i = 1; $i <= $num_payments; $i++) {
        $interest_payment = $amount * $monthly_interest_rate;
        $monthly_payment = $principal_payment + $interest_payment;
        $amount -= $principal_payment;
        $total_payment += $monthly_payment;

        echo 'Rata ' . $i . ': ' . number_format($monthly_payment, 2) . ' PLN<br>';
    }

    echo 'Całkowita kwota do spłaty: ' . number_format($total_payment, 2) . ' PLN';
    echo '</div>';
}