<?php
// better approach (can run multiple instances safely)
while (true) {
    $news = $db->command(array(
        'findAndModify' => 'news',
        // where url doesn't exists (much better than $exists => false)
        'query' => array('url' => null),
        // set a new value for url, diff than null
        'update' => array('$set' => 'url' => ' '),
    ));
    if ($news['ok'] != 1)  break;
    $query = array('_id' => $news['value']['_id']):
    $update = array('$set' => array('url' => get_url_from_title($news['value']['title'])));
    $db->news->update($query, $update);
}
