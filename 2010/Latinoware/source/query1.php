<?php
// MySQL
"SELECT news.*, user.name FROM news
INNER JOIN user ON user.id = news.author_id  WHERE id = 1"

"SELECT category.category FROM category_has_news
INNER JOIN category ON category WHERE news_id = 1"

"SELECT * FROM comments 
INNER JOIN user ON user.id = comments.user_id
WHERE news_id = 1"

// In MongoDB
$mongo = new MongoDB;
$db = $mongo->database;

$news = $db->news->find(array('_id' => 1));
