<?php

// Import fetchApiData
include 'fetchApiData.php';

// We start the user's session
session_start();

// We check that the session exists, if it does not exist, we create it.
if(!isset($_SESSION['jokes'])){
    $_SESSION['jokes'] = [];
}

// We send the url to the function
$url = "https://api.chucknorris.io/jokes/categories";
$categories = fetchApiData($url);

// We declare the variable jokes to null
$randomJoke = null;

// Every time we submit the form to get jokes, it will execute this code
// we check that there is an answer get and that it contains a category
if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET["categories"])) {

    // Get the category
    $selectedCategory = $_GET["categories"];

    // We clean the variable to pass it through the url
    $randomJoke = fetchApiData("https://api.chucknorris.io/jokes/random?category=" . urlencode($selectedCategory));

    //We add the value to the session
    $_SESSION['jokes'][] = $randomJoke["value"];
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UFT-8">
    <title>Prueba Técnica</title>
    <script>
    </script>
</head>

<body>
    <h1>Welcome to ChuckNorris</h1>

    <form action="index.php" method="get">
        <select name="categories">
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category ?>"><?= $category ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Get Joke</button>
    </form>

    <?php
    foreach ($_SESSION['jokes'] as $joke) {
        echo "<p>". $joke ."</p>";
    } 
    ?>

</body>

</html>