<?php
// Loo leht raamatu lisamiseks: nimi, autor, laenu pikkus???
require("../dbConfig.php");
global $yhendus;

if(!empty($_REQUEST["uusraamat"])){
    $kask=$yhendus->prepare(
        "INSERT INTO raamatukogu(nimi, autor, saadavus) VALUES(?,?,1)");
    $kask->bind_param("ss", $_REQUEST["uusraamat"],$_REQUEST["uusautor"]);
    $kask->execute();
    echo $yhendus->error;
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();
    exit();
}
include("header.php");
?>
    <style>
        body {

        }
        img {
            background-size: cover;
            display: inline-block;
            height: auto;
            width: 35%;
            float: right;
        }
        label {
            font-size: 17px;
        }

    </style>
    <img alt="bookcase with lights" src="images/leht.png">
    <?php
    include("navigatsioon.php");
    ?>
    <title>Raamatu lisamine</title>
</head>
<body>

<h2>Lisa uus raamat</h2>
<form action="?">
    <!-- saab uue raamatu lisada -->
    <label>Raamatu pealkiri:<br>
        <input type="text" name="uusraamat" />
    </label>
    <br>
    <label>Autori nimi:<br>
        <input type="text" name="uusautor" />
    </label>
    <br>
    <input class="button4" type="submit" value="Lisa raamat" />
</form>

<?php
include ("footer.php")
?>
