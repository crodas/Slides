<?php

/*  Assuming you have already MongoDB running
 *  on a sharded env., you should do this once.
 *
 *  $admin is a connection to the "admin" DB.
 */
$admin->command(array(
    "shardcollection" => "blog",
    "key" => array("uri" => 1),
));

$admin->command(array(
    "shardcollection" => "user",
    "key" => array("user" => 1),
    "unique" => true,
));
