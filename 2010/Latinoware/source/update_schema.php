<?php
// MySQL
"ALTER TABLE news ADD COLUMN url VARCHAR(250) NOT NULL"

// MongoDB (simple version -- one node)
foreach ($db->news->find() as $news) {
    $query = array('_id' => $news['_id']);
    $update = array('$set' => 
        array('url' => get_url_from_title($news['title']))
    );
    $db->news->update($query, $update);
}
