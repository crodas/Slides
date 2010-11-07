<?php
$query = array('_id' => $_POST['news_id']);
$properties = array('totalComments' => true);
$news = $db->news->findOne($query, $properties);

if (empty($news)) throw new Exception("not valid news");

$new_comment = array(
    'name' => $_SESSION['user']['name'],
    'website' => $_SESSION['user']['website'],
    'text' => $_POST['text'], 'news' => $_POST['news_id'],
);
$db->comment->save($new_comment);

$update = array('$inc' => array('totalComments' => 1));
if ($news['totalComments'] < 10)
    $update['$push'] = array('comments' => $new_comment);
$db->news->update($news, $update);
