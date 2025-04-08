<?php
/**
 * Call the GitHub API with a given URL and token.
 *
 * @param string $url The API endpoint URL.
 * @param string $token The GitHub personal access token.
 * @return array The decoded JSON response from the API.
 */
function callGitHubAPI($url, $token)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: token ' . $token,
        'User-Agent: My-GitHub-App',
        'Accept: application/vnd.github+json'
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}
?>