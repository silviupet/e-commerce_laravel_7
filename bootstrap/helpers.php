<?php

if(! function_exists('parse_money_to_numbers')) {
    function parse_money_to_numbers(string $money)
    {
        return doubleval(preg_replace("/[^0-9.]/", '', $money));
    }
}

if(! function_exists('format_money')) {
    function format_money(string $money)
    {
        return '$' . number_format($money, 2);
    }
}