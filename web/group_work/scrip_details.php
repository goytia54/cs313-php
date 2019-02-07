<?php
    $id = $_GET['id'];

    include "../dbconect.php";

    $db = getDBConnection();
    foreach ($db->query("select content from public.scriptures where id=$id")as $row){
        $content = $row['content'];
        $book = $row['book'];
        $chapter = $row['chapter'];
        $verse = $row['verse'];
        echo "<p>$content</p>";
        echo "<p>$book $chapter:$verse</p>";


    };
?>
