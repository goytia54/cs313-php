<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MRG Home Page</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.22/dist/vue.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Bungee Shade' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Arapey' rel='stylesheet'>
</head>
<body>
<nav>
    <a href="assignments.php">Assingments</a>
</nav>

    <div id="header">
        <h1 class="headers">Software Engineer | Chemist | Sports Fanatic | Gamer </h1>
        <h2 class="headers">Welcome My Home Page</h2>
    </div>

<div id="photo-app">
    <div @click="showMyriad = !showMyriad" class="myriad">
        <img v-if="showMyriad"  src="photos/myriad.png" alt="myriad-photo">
        <p v-if="!showMyriad">I am currently a full-stack software engineer at Myriad Genetics. Before that I have worked at Motorola and 3M.
            <span>Before I went into software, I was pursuing a PhD in Physical/Theoretical Chemistry at the University of Utah</span>
        </p>
    </div>
    <div @click="showChamp = !showChamp" class="champion" >
        <img v-if="showChamp" class="champion" src="photos/champions.jpg" alt="champions">
        <p v-if="!showChamp">This is a picture of my friend Korea and I after winning a pickleball tournament.
        <span>I like to play lots of sports! I also like to watch sports and some of my favorite</span>
        <span> teams are the Sacramento Kings and Utah Utes. I also competed at the Div I level in track and field.</span>
        </p>
    </div>

    <div @click="showGamer = !showGamer" class="starcraft">
        <img v-if="showGamer" class="starcraft" src="photos/starcraft.jpg" alt="starcraft">
        <p v-if="!showGamer">This is a photo from one of my favorite video games franchises, StarCraft. Video games played a huge part
            <span>in my desire to go into programming. I like RTS as well as FPS games</span>
        </p>
    </div>

</div>
<div id ="instruction">
    <p>*Click on the photos to learn more about me!</p>
</div>


<?php

?>
</body>

<script>
    var app = new Vue({
        el: '#photo-app',
        data:{
            showMyriad: true,
            showChamp: true,
            showGamer: true,
        },
        methods: {
        },
    })
</script>

<style>

    #instruction {
        width: 200px;
        margin-left: auto;
        margin-right: auto;
        height: 100px;
        margin-top: 400px;

    }

    #header{
        width: 1200px;
        margin: auto;
        height: 100px;
    }

    .headers{
        margin: 5px auto;
        text-align: center;
        font-family: 'Bungee Shade';
    }

    a{
        font-family: 'Bungee Shade';
        text-decoration: none;
        color: dodgerblue;
    }
    #photo-app{
        width: 1000px;
        height: 100px;
        display: flex;
        margin: auto;
    }

    p {
        font-family: 'Arapey';
        text-align: center;
    }

    .myriad {
        height: 146px;
        width: 360px;
        margin-right: 30px;
        margin-left: -50px;
        border-radius: 20px;
        margin-top: 150px;
    }

    .starcraft{
        height: 216px;
        width: 384px;
        margin-left: 10px;
        border-radius: 20px;
        margin-top: 70px;
    }

    .champion {
        height: 405px;
        width: 324px;
        border-radius: 20px;
        margin-top: 30px;
    }
</style>
</html>
