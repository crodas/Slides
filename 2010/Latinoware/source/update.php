<?php
// update comments
$update = array(
    'set' => array(
        'name' => $new_name
    )
);
$db->comments->update(array('news' => 1), $update, array('multiple' => true));

// update news (and embed)
$update = array(
    '$set' => array(
        'category' => $list_of_first_10_comments,
        'authorName' => $new_name,
    )
);
$db->news->update(array('_id' => 1), $update, array('multiple' => true));

