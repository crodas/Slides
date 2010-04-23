<?php

/* connects to localhost:27017 */
$connection = new Mongo(); 

/* connect to a remote host (default port) */
$connection = new Mongo( "example.com" ); 

/* connect to a remote host at a given port */
$connection = new Mongo( "example.com:65432" ); 

/* select some DB (and create if it doesn't exits yet) */
$db = $connection->selectDB("db_name");

/* select a "table" (collection) */
$table = $db->getCollection("table");
