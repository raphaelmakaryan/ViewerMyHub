<?php

//Call the debug function
require_once __DIR__ . '/debug.php';

// Call the callGitHubAPI function
require_once __DIR__ . '/callGitHubAPI.php';

// Retrieving the .env file
require_once __DIR__ . '/loadEnv.php';
loadEnv(__DIR__ . '/../.env');

// Call the API to retrieve the issues
$forIssues = callGitHubAPI("https://api.github.com/search/issues?q=type:pr+author:" . getenv('GITHUB_USERNAME') ."&per_page=" . getenv('PER_PAGE') . "&page=" . getenv('PAGE') . "", getenv('GITHUB_TOKEN') );

// Call the debug function for all raw issues, set the value to true to display it on the page.
debug($forIssues, $debug = false);

// Filtering issues to keep only those that are not closed or have been merged
$issues = array_filter($forIssues['items'], function ($pr) {
    return !($pr['state'] === 'closed' && empty($pr['pull_request']['merged_at']));
});

// Debug filtered issues
debug($issues, $debug = false);
?>