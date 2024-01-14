<?php

/**
 * We access the API through the URL and return the data
 * @param String $url
 * @return list[String]
 */

function fetchApiData(String $url)
{

    // Initialize cURL, which is the function we will use
    // to make the PHP request to the API

    $ch = curl_init($url);

    // Verify if the cURL initialization was successful
    if ($ch === false) {
        throw new Exception('No se pudo inicializar cURL.');
    }

    // We configure the parameters
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL request
    $response = curl_exec($ch);

    // Once the response is obtained, close the session
    // to avoid consuming resources
    curl_close($ch);

    // Verify if the request was successful
    if ($response !== false) {

        // Decode the JSON response to a PHP array,
        // with true it becomes an associative array
        // Return the categories
        return json_decode($response, true);
    }
}
