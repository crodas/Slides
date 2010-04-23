<?php
/*
 * SELECT * FROM table WHERE field IN (5,6,7) and enable=1
 * and worth < 5
 * ORDER BY timestamp DESC
 */

$collection->ensureIndex(
    array('field'=>1, 'enable'=>1, 'worth'=>1, 'timestamp'=>-1)
);

$filter  = array(
        'field' => array('$in' => array(5,6,7)), 
        'enable' => 1, 
        'worth' => array('$lt' => 5)
    );
$results = $collection->find($filter)->sort(array('timestamp' => -1)); 
