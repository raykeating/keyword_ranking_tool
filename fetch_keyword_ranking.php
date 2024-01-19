<?php
// This function returns the rank of the website in the organic results, and the organic results as an array of objects
// It's powered by https://brightdata.com/
function fetch_keyword_ranking(string $keyword, string $website_url, $count = 50)
{
    $results = fetch_results($keyword, $count);
    $rank = check_rank($results, $website_url);
    return [$rank, $results];
}

// This function will return the organic results from the SERP, as an array of objects
function fetch_results(string $keyword)
{
    $proxy_url = getenv('PROXY_URL');
    $proxy_user = getenv('PROXY_USER');

    $sanitized_keyword = str_replace(' ', '+', $keyword);
    $url = "https://www.google.com/search?q=$sanitized_keyword&brd_json=1";

    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_PROXY, $proxy_url);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxy_user);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Use only for testing, remove in production

    // Execute cURL session
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Curl error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Output the response
    $response = json_decode($response, true);

    return $response['organic'];
}

// This function will look through the organic results and return the rank of the website, or null if it is not found
function check_rank($results, string $website_url)
{
    $rank = 0;
    foreach ($results as $result) {
        $rank++;
        // if the website url is found in the link, return the rank
        if (is_string_contained($website_url, $result['link'])) {
            return $rank;
        }
    }

    // If the website is not found in the organic results, return null
    return null;
}

// This function will check if a string is contained in another string
function is_string_contained(string $substring, string $string) {
    // Use stripos for a case-insensitive check
    return stripos($string, $substring) !== false;
}

// set up an endpoint to fetch the results
if (isset($_GET['keyword']) and isset($_GET['website'])) {
    $keyword = $_GET['keyword'];
    $website_url = $_GET['website'];
    [$rank, $results] = fetch_keyword_ranking($keyword, $website_url);

    // validate the keyword and website
    if (empty($keyword)) {
        echo "<p>Please provide a keyword</p>";
    } else if (empty($website_url)) {
        echo "<p>Please provide a website url</p>";
    } else if (str_contains($website_url, ".") === false) {
        echo "<p>Website url is invalid</p>";
    } else if (is_null($rank)) {
        echo "<p>Sorry, this website is not in the top 10 results for this keyword</p>";
        // Output the results
        echo "<p>Keyword: $keyword</p>";
        echo "<p>Website: $website_url</p>";
        echo "<p>Results:</p>";
        echo "<ul>";
        foreach ($results as $result) {
            echo "<li><a href='{$result['link']}'>{$result['title']}</a></li>";
        }
    } else {
        // Output the results
        echo "<p>Keyword: $keyword</p>";
        echo "<p>Website: $website_url</p>";
        echo "<p>Rank: $rank</p>";
        echo "<p>Results:</p>";
        echo "<ul>";
        foreach ($results as $result) {
            echo "<li><a href='{$result['link']}'>{$result['title']}</a></li>";
        }
        echo "</ul>";
    }
}