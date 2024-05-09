<?php

use App\Models\Currency;

use function Webmozart\Assert\Tests\StaticAnalysis\float;

function setApplicationCurrency(Currency $currency)
{

    if (session('currency') == $currency->currency_name) {
        return;
    }

    session(['currency' => $currency->currency_name]);
}

function getApplicationCurrency()
{
    if (session('currency')) {
        $currency = Currency::where('currency_name', session('currency'))->first();
    }else{
        $currency = Currency::where('is_default',1)->first();
    }
    return $currency;
}
function format_price($price){
    if(!is_numeric($price)){
        return  $price;
    }
    $currency = getApplicationCurrency();
    if($currency){
        $price = (float)$currency->exchange_rate ? ((float)$currency->exchange_rate * $price) : $price;
        $numberAfterDot = $currency ? $currency->decimal_digit : 0;
        if($currency->thousands_separator == "point"){
            $t_s = '.';
        }else if($currency->thousands_separator == "comma"){
            $t_s = ',';
        }else{
            $t_s = ' ';
        }
        if($currency->decimal_separator == "point"){
            $d_s = '.';
        }else if($currency->decimal_separator == "comma"){
            $d_s = ',';
        }else{
            $d_s = ' ';
        }
        $price = number_format(
            (float)$price,
            (int)$numberAfterDot,
            $d_s,
            $t_s
        );
        if($currency->currency_position == "left"){
            return $currency->currency_icon . $price;
        }else{
            return $price. $currency->currency_icon;
        }
    }
    return $price;
}