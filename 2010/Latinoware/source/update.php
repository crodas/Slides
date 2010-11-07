<?php
// Catch the update event somewhere in your app and run this:

// update comments
$update = array(
    '$set' => array('name' => $new_name)
);
$db->comments->update(array('news' => 1), $update, array('multiple' => true));

// update news (and embed comments)
$update = array(
    '$set' => array(
        'comments' => $list_of_first_10_comments,
        'authorName' => $new_name,
    )
);
$db->news->update(array('_id' => 1), $update, array('multiple' => true));

