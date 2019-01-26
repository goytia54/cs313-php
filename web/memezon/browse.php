<?php
    session_start();
    if(!isset($_SESSION['quantities'])) {
        $_SESSION['quantities'] = array('river' => 0, 'snoop' => 0, 'thanos' => 0, 'office' => 0);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browse</title>
    <link rel="stylesheet" href="browse.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.22/dist/vue.js"></script>
</head>
<body>
<div id="browse-app">
    <form action="browse.php" method="POST">
        <h1>Welcome to Memezon!</h1>
        <input type="submit" value="Add Selected to Cart"><a href="cart.php">Cart</a>
        <div v-for="selection in selections">
            <input type="checkbox" :name="inputName" :value="selection.value"><img :id="selection.id" :src="selection.path" alt="">
            <span>{{ selection.description }}</span>
        </div>

    </form>
</div>

<?php
    $selected = $_POST['selected'];
    if (isset($selected)){
        foreach ($selected as $selection){
            $_SESSION['quantities'][$selection] += 1;
        }
    }
?>

</body>

<script>
    var app = new Vue({
        el: '#browse-app',
        data:{
            inputName: "selected[]",
            selections: [
                {
                    id: 'river-meme',
                    path: '../photos/rivermeme.jpg',
                    description: "Van Down By the River $10.99",
                    value: 'river'
                },
                {
                    id: 'snoopmeme',
                    path: '../photos/snoopmeme.jpg',
                    description: "Multiple Accounts $10.99",
                    value: 'snoop'
                },

                {
                    id: 'thanos-meme',
                    path: '../photos/thanos.jpg',
                    description: "Thanos $10.99",
                    value: 'thanos'
                },

                {
                    id: 'office-meme',
                    path: '../photos/michaelscottmeme.jpg',
                    description: "Michael's Tots $10.99",
                    value: 'office'
                },

            ]
        },
        methods: {
        },

    });
</script>

</html>
