<?php

$grid = $db->getGridFS();

$file = $grid->findOne(array('path' => '/foo'));

// update download
$update = array('$inc' => array('download' => 1));
$id = array('_id' => $file->file['_id']);
$grid->update($id, $update);

// print it
echo $file->Bytes();

// or (a bit better)
$tmp = '/tmp/apache/' . $file->file['_id'];
if (!is_file($tmp)) $file->write($tmp);
virtual($tmp);
