<?php

abstract class calculator_abstract
{
    abstract public function calculate();
}

class calculator_loan extends calculator_abstract
{
    private $class_amount;
    private $class_interest_rate;
    private $class_loan_period;
    private $class_payment_method;

    public function __construct()
    {
        $this->class_amount = $_POST['amount'];
        $this->class_interest_rate = $_POST['interest_rate'] / 100;
        $this->class_loan_period = $_POST['loan_period'];
        $this->class_payment_method = $_POST['payment_method'];

        echo "construct";
    }

    function calculate()
    {
        $amount = $this->class_amount;
        $interest_rate = $this->class_interest_rate;
        $loan_period = $this->class_loan_period;
        $payment_method = $this->class_payment_method;

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

            echo '<div class="scroll">';
            for ($i = 1; $i <= $num_payments; $i++) {
                $interest_payment = $amount * $monthly_interest_rate;
                $monthly_payment = $principal_payment + $interest_payment;
                $amount -= $principal_payment;
                $total_payment += $monthly_payment;

                echo 'Rata ' . $i . ': ' . number_format($monthly_payment, 2) . ' PLN<br>';
            }
            echo '</div>';
            echo 'Całkowita kwota do spłaty: ' . number_format($total_payment, 2) . ' PLN';
            echo '</div>';
        }
    }
}

class calculator_currency extends calculator_abstract
{
    private $class_amount;
    private $class_from_currency;
    private $class_to_currency;

    public function __construct()
    {
        $this->class_amount = $_POST['amount'];
        $this->class_from_currency = $_POST['from_currency'];
        $this->class_to_currency = $_POST['to_currency'];
    }
    function calculate()
    {
        $amount = $this->class_amount;
        $from_currency = $this->class_from_currency;
        $to_currency = $this->class_to_currency;

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
    }
}

class calculator_investment extends calculator_abstract
{
    private $class_investment_amount;
    private $class_interest_rate;
    private $class_compounding_period;
    private $class_investment_period;
    public function __construct()
    {
        $this->class_investment_amount = $_POST['amount'];
        $this->class_interest_rate = $_POST['investment_amount'];
        $this->class_compounding_period = $_POST['compounding_period'];
        $this->class_investment_period = $_POST['investment_period'];
    }
    function calculate()
    {
        $investment_amount = $this->class_investment_amount;
        $interest_rate = $this->class_interest_rate;
        $compounding_period = $this->class_compounding_period;
        $investment_period= $this->class_investment_period;

        $num_compoundings = $investment_period * 12 / $compounding_period;
        $compound_interest = $investment_amount * pow(1 + ($interest_rate / $compounding_period), $num_compoundings);
        $total_value = round($compound_interest, 2);

        echo '<div class="result">';
        echo 'Przyszła wartość inwestycji: ' . number_format($total_value, 2) . ' PLN';
        echo '</div>';
    }
}