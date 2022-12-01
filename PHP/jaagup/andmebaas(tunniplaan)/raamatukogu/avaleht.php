<?php
require("../dbConfig.php");
global $yhendus;

include("header.php");
?>

    <style>
        body {
            background-image: url("images/avaleht.png");
            background-position-y: 100px;
            background-repeat: no-repeat;
            image-resolution: from-image;
            background-size: cover;
            display: inline-block;
            height: auto;
            width: 97%;

        }
        nav {
            padding-top: 40px;
        }
        .button1 {
            border-radius: 12px;
            margin-bottom: 10px;
            padding: 15px 25px;
            text-align: center;
            font-size: 20px;

        }
        .button2 {
            border-radius: 12px;
            margin-bottom: 10px;
            padding: 15px 25px;
            text-align: center;
            font-size: 20px;
        }
        .button3 {
            border-radius: 12px;
            padding: 15px 25px;
            text-align: center;
            font-size: 20px;
        }
    </style>


    <title>Avaleht</title>

</head>
<body>
<header>
    <h1>Raamatukogu</h1>
</header>

<?php
include("navigatsioon.php");
?>

