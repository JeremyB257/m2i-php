<?php

function truncate($text, $limit = 10) {
    if (mb_strlen($text) > $limit) {
        return substr($text, 0, $limit) . '...';
    }
    return $text;
}

function format_date($date, $format = 'd/m/Y') {
    return date($format, strtotime($date));
}
