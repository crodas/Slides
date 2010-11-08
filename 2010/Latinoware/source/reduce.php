<?php

// we get (category.name, [1, 1, 1, 1]) and we 
// return the sum to get {_id: category.name, value: 4}
var $reduce = function($key, $values) {
    var $count = 0;
    for ($index in $values) {
        $count += $values[$index];
    }
    return $count;
}
