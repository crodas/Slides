<?php
/* SELECT count(*) FROM table */
$collection->count();

/* SELECT count(*) FROM table WHERE foo = 1 */
$collection->find(array("foo" => 1))->count();
