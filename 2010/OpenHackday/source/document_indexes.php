<?php

$blog_col->ensureIndex(array("url" => 1));

$post_col->ensureIndex(array("blog" => 1, "date" => 1));
$post_col->ensureIndex(array("blog" => 1, "uri" => 1), array("unique" => 1));

$comment_col->ensureIndex(array("post" => 1, "date" => -1));

$user_col->ensureIndex(array("user" => 1), array("unique" => 1));
$user_col->ensureIndex(array("email" => 1), array("unique" => 1));
