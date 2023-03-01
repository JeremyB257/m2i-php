<?php

function truncate($text, $limit = 15) {
    if (mb_strlen($text) > $limit) {
        return substr($text, 0, $limit) . '...';
    }
    return $text;
}

function format_date($date, $format = 'd/m/Y') {
    return date($format, strtotime($date));
}


function format_duration($duration) {
    return floor($duration / 60) . 'h' . (($duration % 60) < 10 ? ('0' . $duration % 60) : ($duration % 60));
}


function select($sql, $exec = []) {
    $query = db()->prepare($sql);
    $query->execute($exec);
    return $query->fetch();
}

function selectAll($sql, $exec = []) {
    $query = db()->prepare($sql);
    $query->execute($exec);
    return $query->fetchAll();
}

function sanitize($value) {
    return trim(htmlspecialchars(($value ?? '')));
}
