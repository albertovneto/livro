<?php

namespace App;

function implode_column_from_array($array, $column) {
    return $array ? implode(',', array_column($array, $column)) : null;
}

function return_selected_from_array($selected, $array, $column) {
    if ($array) {
        return in_array($selected, array_column($array, $column)) ? 'selected' : "";
    }

    return "";
}
