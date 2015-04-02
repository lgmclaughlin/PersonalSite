<?php
    $errors = array(
            400 => 'your browser accessed the page incorrectly.',
            401 => 'you\'re unauthorized to access this location.',
            403 => 'you\'re forbidden access to this location.',
            404 => 'it wasn\'t found.',
            500 => 'the server failed.'
    );

    // Check if $err is known and in the array
    if (array_key_exists($err, $errors)) {
        echo '<div class=container><h1 class=error-title>Oops...</h1><p class="content-p error-p">The page you are looking for returned a status of ' . $err . '.<br />In other words, ' . $errors[$err] . ' Sorry about that!</p></div>';
    } else {
        // Fires if error is unknown or was not set by index for some reason
        echo '<div class=container><h1 class=error-title>Oops...</h1><p class="content-p error-p">The page you are looking for returned an unknown error.<br />Sorry about that!</p></div>';
    }
?>
