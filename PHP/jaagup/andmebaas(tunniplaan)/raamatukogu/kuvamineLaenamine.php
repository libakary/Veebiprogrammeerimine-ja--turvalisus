<?php
// Loo leht saadaval olevate raamatute kuvamiseks,
// samas saab valida raamatu laenamiseks -
// lisatakse laenutus kuup. ja muudetakse saadavust.

// ühendus
require("../dbConfig.php");
global $yhendus;

// laenutab raamatu, muudab saadavuse, lisab
if(isSet($_REQUEST["laenutus_id"])){
    $kask=$yhendus->prepare(
            "UPDATE raamatukogu SET saadavus=0 WHERE id=?");
    $kask->bind_param("i", $_REQUEST["laenutus_id"]);
    $kask->execute();

    $kask=$yhendus->prepare(
    "UPDATE raamatukogu SET laenutus_kuup= current_date, tagastus_kuup= date_add(current_date, INTERVAL 21 DAY) WHERE id=?");
    $kask->bind_param("i", $_REQUEST["laenutus_id"]);
    $kask->execute();
}

include("header.php");
?>
    <style>
        img {

            background-size: cover;
            display: inline-block;
            height: auto;
            width: 35%;
            float: right;
        }
    </style>
    <img alt="bookcase with lights" src="images/leht.png">
    <?php
    include("navigatsioon.php");
    ?>
    <title>Raamatute nimekiri</title>
</head>
<body>

    <h2>Raamatute laenamine</h2>
<table>
    <tr>
        <th>Pealkiri</th>
        <th>Autor</th>
        <th>Laenuta</th>
    </tr>
<?php
    $kask = $yhendus->prepare(
            "SELECT id, nimi, autor FROM raamatukogu WHERE saadavus=1");
    $kask->bind_result($id, $raamatunimi, $autor);
    $kask->execute();
    while ($kask->fetch()) {
        $raamatunimi=htmlspecialchars($raamatunimi);
        $autor=nl2br(htmlspecialchars($autor));

        echo "
                <tr>
                  <td>$raamatunimi</td>
                  <td>$autor</td>
                  <td><a href='?laenutus_id=$id'>Laenuta raamat</a></td>
                </tr>";

    }
?>
</table>

<?php
include ("footer.php")
?>