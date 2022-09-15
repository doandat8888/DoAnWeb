<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./404.css">    
    <title>404 pages</title>
</head>
<body>
    <div class="container-fliud page">
        <img src="./404.png" alt="404 image" class="img">
        <div class="leftsrc">
            <h1>Oh no! Error 404</h1>
            <h6> Maybe Bigfoot has broken this page. <br> Come back to the homepage</h6>
            <button type="button" class="btn btn-primary"><a href="<?php include_once "./index.php";?>">Back to Homepage</a></button>
        </div>
        <div class="bg"> </div>
    </div>
</body>
</html>