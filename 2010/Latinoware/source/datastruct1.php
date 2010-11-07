<?php
$user = array(
    'name' => 'crodas',
    'email' => 'crodas@ferpectos.com',
    'website' => 'http://cesarodas.com',
);

$category = array(
    array('name' => 'Sport'),
    array('name' => 'Politcs')
);

$comment = array(
    'news' => $news['_id'],
    'text' => 'I like MongoDB',
    // these are duplicated!
    'name' => $user['name'], /* 'crodas' */
    'website' => $user['website'], /*'http://cesarodas.com',*/ 
);
