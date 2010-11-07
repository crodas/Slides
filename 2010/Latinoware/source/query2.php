<?php
// Get 10-most commented news
$db->news->find(array())->sort(array('totalComments' => -1))->limit(5);

// MySQL
// I'm bored to think in SQL

