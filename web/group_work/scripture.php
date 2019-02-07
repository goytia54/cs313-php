<?php
    include '..\myriad_parking\dbconect.php';

    try {
        $db = getDBConnection();
    }
    catch(Exception $exception){
        echo $exception->getMessage();
    }

    foreach ($db->query('select * from public.SCRIPTURES') as $row){
        $book = $row['book'];
        $chapter = $row['chapter'];
        $verse = $row['verse'];
        $content = $row['content'];

        echo '<b>'. $book. $chapter.':'. $verse. '</b>-' . $content;
    };
?>