<?php

    function getDBConnection(){
        try
        {
            $dbUrl = getenv('DATABASE_URL');
            $dbOpts = parse_url($dbUrl);

            $dbHost = $dbOpts["host"];
            if($dbHost != '') {
                $dbHost = $dbOpts["host"];
                $dbPort = $dbOpts["port"];
                $dbUser = $dbOpts["user"];
                $dbPassword = $dbOpts["pass"];
                $dbName = ltrim($dbOpts["path"], '/');

                $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } else {

                $db = new PDO('pgsql:host=localhost;dbname=mydb', 'postgres', 'yud72heo');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            return $db;
        }
        catch (PDOException $ex)
        {
            echo 'Error!: ' . $ex->getMessage();


        }
    }

?>