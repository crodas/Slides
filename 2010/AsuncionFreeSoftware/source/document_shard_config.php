<?php

/*  Asumiendo que tienes MongoDB ejecutandose
 *  en un entorno distribuido (sharded), esto
 *  se hace una sola vez.
 *
 *  $admin es una coneccion a la DB "admin"
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
