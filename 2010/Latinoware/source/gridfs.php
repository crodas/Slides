<?php
$grid = $db->getGridFS();

$metadata = array(
    "whatever" => "metadata", 
    "path" => "/foo", 
    "download" => 0
);

$grid->storeFile($filename, $metadata);

// or 

$grid->storeBytes($bytes, $metadata);

// Or (save $_FILE['foo'])

$grid->storeUpload('foo', $metadata);
