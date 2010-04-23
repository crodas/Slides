<?php
/*
 * SELECT * FROM table WHERE field IN (5,6,7) and enable=1
 * and worth < 5
 * ORDER BY timestamp DESC LIMIT $offset, 20
 */
$filter  = array(
        'field' => array('$in' => array(5,6,7)), 
        'enable' => 1, 
        'worth' => array('$lt' => 5)
    );

$cursor = $collection->find($filter);
$cursor->sort(array('timestamp' => -1))->skip($offset)->limit(20);

foreach ($cursor as $result) {
    var_dump($result);
}
