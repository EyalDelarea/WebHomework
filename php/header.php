<?php
include('arrays.php')
?>


<!doctype html>

<head xmlns="">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="myStyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <title>Tums Offical Store</title>
</head>
<body>

<div id="Home" class="container">
    <!-- Navigation -->
    <div class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="">
                    <span>Tums offical store</span>
                    <img class="logo"
                         src="https://images.ctfassets.net/wsgqtmtyqb4f/1eqGgYCKu6A4I8Wek8kkmC/b566d52a323983bd9bdcdab21d0a0e44/tums.png?w=362&h=320&q=50&fit=fill"
                         alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <?php
                        foreach ($navItems as $item) {
                            echo "<li class=\"nav-item active\">
                            <a class=\"nav-link\" href=\"{$item['scriptName']}\">
                       
                            {$item['title']}
                                <span class=\"sr-only\">(current)</span>
                            </a>
                        </li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>




