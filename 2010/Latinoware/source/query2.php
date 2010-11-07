<?php
// MySQL
"Too bored to think in SQL"

// Get 10-most commented news
$db->news->find(array())->sort(array('totalComments' => -1))->limit(5);
