<?php

function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}
function getSortLink($field, $currentDirection) {
    //$direction = 'ASC' === $currentDirection ? 'desc' : 'asc';
    return sprintf('ORDER BY %s %s', $field, $currentDirection);
}
