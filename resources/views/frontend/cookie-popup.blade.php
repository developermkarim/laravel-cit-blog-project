<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/cookie-popup.blade.php -->

    <div id="cookie-popup" class="cookie-popup">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <p>This website uses cookies to ensure you get the best experience on our website.</p>
                </div>
                <div class="col-md-4 text-center">
                    <button id="accept-cookies" class="btn btn-primary">Accept</button>
                </div>
            </div>
        </div>
    </div>
    

<script>
document.addEventListener("DOMContentLoaded", function() {
    var cookiePopup = document.getElementById("cookie-popup");
    var acceptCookiesBtn = document.getElementById("accept-cookies");

    acceptCookiesBtn.addEventListener("click", function() {
        // Set a cookie to remember user's choice
        document.cookie = "cookies_accepted=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/";

        // Hide the popup
        cookiePopup.style.display = "none";
    });

    // Show the popup if the user hasn't accepted cookies yet
    if (!document.cookie.includes("cookies_accepted=true")) {
        cookiePopup.style.display = "block";
    }
});
</script>

<style>
    .cookie-popup {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 9999;
    }
    
    .cookie-popup p {
        margin: 0;
    }
    
    .cookie-popup .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    
    .cookie-popup .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    </style>
    

</body>
</html>