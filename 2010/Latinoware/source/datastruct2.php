<?php
$news = array(
    'title' => 'My Talk about MongoDB',
    'content' => 'MongoDB rules, bla, bla!'
    'author' => $user['_id'],
    // duplicated items
    'authorName' => $user['user'],
    'categories' => array(
        // copy all categories (incuding _id and name)
        array('id' => $category[0]['_id'], 'name' => $category[0]['name']),
    ),
    'comments' => array(
        // copy 10 comments (we show 10 comments and pagination buttons)
        $comment[0],
        $comment[1],
    ),
    // total comments for this news, to made easier pagination
    'totalComments' => count($comment),
);
