

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keyword Ranker</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <style>
        *{font-family:Inter,sans-serif;margin:0}.light-header{font-weight:300;font-size:1.5rem;margin-bottom:1rem}.search-box{padding:2.5rem;border-radius:.5rem;box-shadow:0 0 .5rem rgba(0,0,0,.1);background-color:#fff;display:flex;gap:1rem;width:fit-content}.input-container{display:flex;flex-direction:column;gap:.5rem}.input-container small{font-size:.8rem;color:#929292}.search-button-container{display:flex;flex-direction:column;justify-content:center}button{border:none;border-radius:.3rem;padding:.5rem 1rem;background-color:#000;color:#fff;cursor:pointer}input{border:1px solid #929292;border-radius:.2rem;padding:.5rem}label{font-size:.9rem;font-weight:600}.result-preview{display:flex;flex-direction:column;gap:.25rem;position:relative}.result-preview .title{font-size:1.3rem;font-weight:600;color:#414cb6}.result-preview a{color:#2f9133}.result-preview span{position:absolute;top:0;left:-1.5rem}.summary-text{font-size:1.5rem;line-height:2rem;color:#000;margin:2rem 0}.app-wrapper{display:flex;height:100vh;width:100%;overflow:hidden}.app-wrapper .app{width:100%;padding:3rem;overflow-y:auto}.app-wrapper img{flex-basis:1;height:100%;object-fit:cover}:focus{outline:#757575 solid 1px}ul{padding-left:0}#errormessage1,#errormessage2,#errormessage3,#loading-indicator{display:none}.info-text{font-size:1.3rem;margin-top:1rem;margin-bottom:1rem}.loading-spinner{justify-content:center;align-items:center;display:inline;height:1rem;width:1rem;animation:1.2s cubic-bezier(.445,.05,.55,.95) infinite spin}@keyframes spin{100%{transform:rotate(360deg)}}*,::after,::before{box-sizing:border-box}body{line-height:1.5;-webkit-font-smoothing:antialiased}canvas,img,picture,svg,video{display:block;max-width:100%}button,input,select,textarea{font:inherit}h1,h2,h3,h4,h5,h6,p{overflow-wrap:break-word}#__next,#root{isolation:isolate}
    </style>
</head>
<body>

    <div class="app-wrapper">
        <div class="app">
            <h1 class="light-header">Google Keyword Rank Checker</h1>
    
            <!-- Search Input -->
            <div class="search-box">
                <div class="input-container">
                    <label for="keyword">Keyword</label>
                    <input type="search" name="keyword" id="keyword" placeholder="baked goods in toronto">
                    <small>the keyword you'd like to analyze</small>
                </div>
                <div class="input-container">
                    <label for="website">Website</label>
                    <input type="search" name="website" id="website" placeholder="yongestreetbakery.com">
                    <small>the website you'd like to check</small>
                </div>
                <div class="search-button-container">
                    <button onclick="getSearchResults()">Submit</button>
                </div>
            </div>
    
            <!-- Errors -->
            <div id="loading-indicator" class="info-text">Loading... <svg class="loading-spinner" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M222.7 32.1c5 16.9-4.6 34.8-21.5 39.8C121.8 95.6 64 169.1 64 256c0 106 86 192 192 192s192-86 192-192c0-86.9-57.8-160.4-137.1-184.1c-16.9-5-26.6-22.9-21.5-39.8s22.9-26.6 39.8-21.5C434.9 42.1 512 140 512 256c0 141.4-114.6 256-256 256S0 397.4 0 256C0 140 77.1 42.1 182.9 10.6c16.9-5 34.8 4.6 39.8 21.5z"/></svg></div>
            <p id="errormessage1" class="info-text">
                Please provide a keyword
            </p>
            <p id="errormessage2" class="info-text">
                Please provide a website url
            </p>
            <p id="errormessage3" class="info-text">
                Website url is invalid
            </p>   
            
            <!-- Results -->
            <div id="result-container">
                <div id="results">
                    <!-- Results will be inserted here -->
                    <!-- Example results -->
                    <div id="example-results">
                        
                        <p style="opacity: 0.5; margin-top: 2rem;">Example</p>
                        <p class="summary-text" style="margin-top: 0;"><strong>yongestreetbakery.com</strong> is ranked <strong>#1</strong> for the keyword <strong>baked goods in toronto</strong></p>

    
                        <ul style="opacity: 0.4; pointer-events: none; user-select: none;">
                            <li class="result-preview">
                                <p class="title">Yonge Street Bakery</p>
                                <a href="https://yongestreetbakery.com/">https://yongestreetbakery.com/</a>
                                <p class="snippet">Yonge Street Bakery is a family owned and operated bakery located in the heart of downtown Toronto. We specialize in custom cakes, cupcakes, cookies, and other baked goods.</p>
                            </li>
                            <li class="result-preview">
                                <p class="title">Bakeries in Toronto - Yelp</p>
                                <a href="https://www.yelp.ca/c/toronto/bakeries">https://www.yelp.ca/c/toronto/bakeries</a>
                                <p class="snippet">Find the best Bakeries on Yelp: search reviews of 1000 Toronto businesses by price, type, or location.</p>
                            </li>
                            <li class="result-preview">
                                <p class="title">The Rolling Pin Bakery</p>
                                <a href="https://www.therollingpin.ca/">https://www.therollingpin.ca/</a>
                                <p class="snippet">The Rolling Pin Bakery offers a wide range of delicious pastries, cakes, and bread. Visit us for a delightful bakery experience.</p>
                            </li>
                            <li class="result-preview">
                                <p class="title">Sweet Flour Bake Shop</p>
                                <a href="https://www.sweetflour.ca/">https://www.sweetflour.ca/</a>
                                <p class="snippet">Sweet Flour Bake Shop is known for its gourmet cookies, cupcakes, and custom cakes. Order online or visit our bakery in Toronto.</p>
                            </li>
                            <li class="result-preview">
                                <p class="title">Mabel's Bakery</p>
                                <a href="https://www.mabelsbakery.ca/">https://www.mabelsbakery.ca/</a>
                                <p class="snippet">Mabel's Bakery offers a variety of freshly baked goods, including bread, pastries, and sandwiches. Come and enjoy our delicious treats.</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <img src="images/banner.png" alt="" class="right-banner-image">
    </div>

    <script>
        function getSearchResults() {

            // Validate the inputs
            if (validateInputs() === false) {
                return;
            }

            // testing endpoint
            // var apiEndpoint = 'fetch_keyword_ranking.php?keyword=' + $('#keyword').val() + '&website=' + $('#website').val();

            // production endpoint
            var apiEndpoint = 'fetch_keyword_ranking?keyword=' + $('#keyword').val() + '&website=' + $('#website').val();

            // Display loading indicator
            $('#loading-indicator').show();
            $('#result-container').hide();
            $('#example-results').hide();

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

        function validateInputs() {
            // Hide all error messages
            $('#errormessage1').hide();
            $('#errormessage2').hide();
            $('#errormessage3').hide();

            // Validate the keyword
            if ($('#keyword').val() === '') {
                $('#errormessage1').show();
                return false;
            }

            // Validate the website is not empty
            if ($('#website').val() === '') {
                $('#errormessage2').show();
                return false;
            }

            // Validate the website
            if ($('#website').val().includes('.') === false) {
                $('#errormessage3').show();
                return false;
            }

            return true;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>