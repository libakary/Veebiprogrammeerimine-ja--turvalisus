<?php
// Loo leht raamatu lisamiseks: nimi, autor, laenu pikkus???
require("../dbConfig.php");
global $yhendus;

if(!empty($_REQUEST["uusraamat"])){
    $kask=$yhendus->prepare(
        "INSERT INTO raamatukogu(nimi, autor, laenutuspikkus ,saadavus) VALUES(?,?,?,1)");
    $kask->bind_param("ssi", $_REQUEST["uusraamat"],$_REQUEST["uusautor"], $_REQUEST["laenutuspikkus"]);
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
    <title>Raamatu lisamine</title>
</head>
<body>
<header>
    <h1>Raamatukogu</h1>
    <nav>
        <?php
        include("navigatsioon.php");
        ?>
    </nav>
</header>

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
    <label>Laenutuspikkus:<br>
        <input type="text" name="laenutuspikkus" />
    </label>
    <br>
    <input class="button4" type="submit" value="Lisa raamat" />
</form>

<?php
include ("footer.php")
?>
