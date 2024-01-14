<?php

// Import fetchApiData
include 'fetchApiData.php';

// Store the array in a variable
// performing a try in case an exception occurs
try {
    $url = "https://api.chucknorris.io/jokes/categories";
    $categories = fetchApiData($url);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    $categories = [];
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
    <?php echo $categories[0] ?>
</body>

</html>