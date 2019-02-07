<?php
    $id = $_GET['id'];

    $db = getDBConnection();
    foreach ($db->query("select content from public.scriptures where id=$id")as $row){
        $content = $row[$content];
        echo $content;
    };
?>
