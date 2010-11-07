<?php
// Catch the update event somewhere in your app and run this:

// update comments
$update = array(
    '$set' => array('name' => $new_name)
);
$opt = array('multiple' => true);
$db->comments->update(array('news' => 1), $update, $opt);

// update news (and embed comments)
$update = array( '$set' => array('comments.name' => $new_name );
$db->news->update(array('comments._id' => $user_id), $update, $opt);

$update = array( '$set' => array('authorName' => $new_name) );
$db->news->update(array('author' => $user_id), $update, $opt);

