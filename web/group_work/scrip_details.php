<?php
    $id = $_GET['id'];

    include "../dbconect.php";

    $db = getDBConnection();
    foreach ($db->query("select content from public.scriptures where id=$id")as $row){
        $content = $row['content'];
        echo $content;
    };
?>
