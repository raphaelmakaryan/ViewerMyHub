<?php
/**
 * Debug function to print variables in a readable format.
 *
 * @param mixed $message The variable to debug.
 * @param bool $debug Flag to enable or disable debugging output.
 * @return void
 */
function debug($message, $debug = false)
{
    if ($debug) {
        echo "<pre>";
        print_r($message);
        echo "</pre>";
    }
}

// Call the debug function
// require_once __DIR__ . '/debug.php';
?>