<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Doctor</title>
    <?php include("include/header.php"); ?>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        #video-background {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
        }

        .header-container {
            text-align: center;
            color: #ffffff; /* Change the color as needed */
            margin-top: 20px;
        }

        .description-container {
            text-align: center;
            color: #ffffff; /* Change the color as needed */
            margin-bottom: 20px;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            margin-top: 20px;
        }

        .border-container {
            border: 1px solid #ced4da;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
            padding: 20px;
        }

        .button-container {
            margin-top: 20px;
        }

        /* Adjusted button box size */
        .border-container {
            height: 100%;
        }
    </style>
</head>
<body>

<video autoplay muted loop id="video-background">
    <source src="http://localhost/dv/bvideo.mp4" type="video/mp4">
    <source src="http://localhost/dv/bvideo.webm" type="video/webm">
    Your browser does not support the video tag.
</video>

<div style="margin-top:70px;"></div>

<div class="header-container">
    <h1 style="color: black;">Find Your Doctor</h1>
</div>

<div class="description-container">
    <p style="color: dimgray;"><em>We never lose touch with your well-being</em></p>
</div>

<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-10 mb-4">
            <div class="border-container border shadow">
                <h5>Find Your Doctor Here</h5>
                <p>Discover and connect with your healthcare provider.</p>
                <div class="button-container">
                    <a href="http://localhost/dv/map.php" class="btn btn-success my-3">Click Here</a>
                </div>
            </div>
        </div>

        <div class="col-md-10 mb-4">
            <div class="border-container border shadow">
                <h5>Explore Health Services</h5>
                <p>Learn about our wide range of health services.</p>
                <div class="button-container">
                    <a href="#" class="btn btn-success my-3">Click Here</a>
                </div>
            </div>
        </div>

        <!--<div class="col-md-4 mb-4">
            <div class="border-container border shadow">
                <h5>Join Our Medical Team</h5>
                <p>Explore career opportunities with us.</p>
                <div class="button-container">
                    <a href="#" class="btn btn-success my-3">More</a>
                <div>-->
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
