<?php
defined('BASEPATH') or exit('No direct script access allowed');

function highlight_keywords($text, $kw)
{
    $change = array();
    for($i=0; $i<count($kw); $i++){
        $kw[$i] = ' '.$kw[$i].' ';
        $val = '<strong>'.$kw[$i].'</strong>';
        array_push($change, $val);
    }
    return str_ireplace($kw, $change, $text);
}

function array_to_string($kw)
{
    $ret = '';
    $last_index = count($kw);
    $i = 0;
    foreach($kw as $item) {
        $i++;
        $ret .= $item;
        if($i != $last_index) {
            $ret .= ',';
        }
    }
    return $ret;
}

function extract_from_array($array, $index) {
    $ret = array();
    for($i=0; $i<count($array); $i++) {
        array_push($ret, $array[$i][$index]);
    }
    return json_encode($ret);
}