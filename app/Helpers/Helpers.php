<?php

function num_format($number)
{
    return number_format($number,2,'.',',');
}

function format_date($date){
    return date('d/m/Y',strtotime($date));
}

function format_datetime($date){
    return date('d/m/Y H:i',strtotime($date));
}

