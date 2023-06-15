<?php

$investment_amount = $_POST['investment_amount'];
$interest_rate = $_POST['interest_rate'] / 100;
$compounding_period = $_POST['compounding_period'];
$investment_period = $_POST['investment_period'];

$num_compoundings = $investment_period * 12 / $compounding_period;
$compound_interest = $investment_amount * pow(1 + ($interest_rate / $compounding_period), $num_compoundings);
$total_value = round($compound_interest, 2);

echo '<div class="result">';
echo 'Przyszła wartość inwestycji: ' . number_format($total_value, 2) . ' PLN';
echo '</div>';