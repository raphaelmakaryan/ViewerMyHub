<?php

//Call the debug function
require_once __DIR__ . '/debug.php';

// Call the callGitHubAPI function
require_once __DIR__ . '/callGitHubAPI.php';

// Retrieving the .env file
require_once __DIR__ . '/loadEnv.php';
loadEnv(__DIR__ . '/../.env');

// Call the API to retrieve the repositories
$repos = callGitHubAPI("https://api.github.com/users/" . getenv('GITHUB_USERNAME') . "/repos", getenv('GITHUB_TOKEN'));

// Debug raw repositories
debug($repos, $debug = false);
?>
