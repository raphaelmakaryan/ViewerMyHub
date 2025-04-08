<?php
/**
 * Load environment variables from a .env file.
 *
 * @param string $path Path to the .env file.
 * @return void
 */
function loadEnv($path)
{
    if (!file_exists($path)) return;

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) continue;

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        // si non défini
        if (!getenv($name)) {
            putenv("$name=$value");
        }
    }
}
?>