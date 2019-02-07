<?php
    include '..\myriad_parking\dbconect.php';

    $db = getDBConnection();

    foreach ($db->query('select * from public.scriptures') as $row){
        $book = $row['book'];
        $chapter = $row['chapter'];
        $verse = $row['verse'];
        $content = $row['content'];

        echo '<b>'. $book. $chapter.':'. $verse. '</b>-' . $content;
    };
