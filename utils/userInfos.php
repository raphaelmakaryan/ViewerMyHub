<?php
//Call the debug function
require_once __DIR__ . '/debug.php';

// Call the callGitHubAPI function
require_once __DIR__ . '/callGitHubAPI.php';

// Retrieving the .env file
require_once __DIR__ . '/loadEnv.php';
loadEnv(__DIR__ . '/../.env');

// Retrieving user information
$userInfo = callGitHubAPI("https://api.github.com/users/" . getenv('GITHUB_USERNAME'), getenv('GITHUB_TOKEN'));

// Call the debug function, set the value to true to display on the page.
debug($userInfo, $debug = false);
?>