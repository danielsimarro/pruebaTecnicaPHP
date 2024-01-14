<?php

// Import fetchApiData
include 'fetchApiData.php';

// Store the array in a variable
// performing a try in case an exception occurs
try {
    $url = "https://api.chucknorris.io/jokes/categories";
    $categories = fetchApiData($url);
} catch (Exception $e) {
    $categories = [];
}

// We declare the variable jokes to null
$randomJoke = null;

// Every time we submit the form to get jokes, it will execute this code
if ($_SERVER['REQUEST_METHOD'] == "GET") {

    // Get the category
    $selectedCategory = $_GET["categories"];

    // We clean the variable to pass it through the url
    $randomJoke = fetchApiData("https://api.chucknorris.io/jokes/random?category=" . urlencode($selectedCategory));
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
        if($randomJoke !== null){
            echo "<p>".$randomJoke["value"]."</p>";
        }
    ?>
    
</body>

</html>