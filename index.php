

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keyword Ranker</title>
    <style>
        #result-container {
            display: none;
        }
        #loading-indicator {
            display: none;
        }
    </style>
</head>
<body>
        <label for="keyword">Keyword</label>
        <input type="search" name="keyword" id="keyword">
        <label for="website">Website</label>
        <input type="search" name="website" id="website">
        <button onclick="getSearchResults()">Submit</button>

    <div id="loading-indicator">Loading...</div>
    <div id="result-container">
        <h2>API Response:</h2>
        <div id="results"></div>
    </div>

    <script>
        function getSearchResults() {
            var apiEndpoint = '/php-crash/fetch_keyword_ranking.php?keyword=' + $('#keyword').val() + '&website=' + $('#website').val();

            // Display loading indicator
            $('#loading-indicator').show();
            $('#result-container').hide();

            // Fetch data from the API
            $.get(apiEndpoint, function(data) {
                // Hide loading indicator and display the result
                $('#loading-indicator').hide();
                $('#result-container').show();

                // Insert the API response into the result container
                $('#results').html(data);
            }).fail(function() {
                // Handle the case where the API request fails
                $('#loading-indicator').hide();
                $('#result-container').show();
                $('#apiResponse').html('Failed to fetch data from the API.');
            });
        }
    </script>

</body>
</html>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>