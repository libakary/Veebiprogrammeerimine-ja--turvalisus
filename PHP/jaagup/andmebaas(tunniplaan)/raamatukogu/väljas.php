<?php
// Loo leht, kus kuvatakse raamatud, mis on välja laenatud.
// Värvidega indikeeri laenu tähtaja lähedust
// (näit. Roheline üle nädala veel, Kollane kuni nädal veel, punane ületanud tähtaega)

require("../dbConfig.php");
global $yhendus;

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
    <title>Väljalaenutatud raamatud</title>
</head>
<body>
<h2>Väljalaenutatud raamatud</h2>
<table>
    <tr>
        <th>Pealkiri</th>
        <th>Autor</th>
        <th>Laenutusaeg</th>
    </tr>
    <?php
    $kask = $yhendus->prepare(
        "SELECT id, nimi, autor, tagastus_kuup FROM raamatukogu WHERE saadavus=0");
    $kask->bind_result($id, $raamatunimi, $autor, $tagastus_kuup);
    $kask->execute();
    while ($kask->fetch()) {
        $raamatunimi=htmlspecialchars($raamatunimi);
        $autor=nl2br(htmlspecialchars($autor));

        $currentDate = new DateTime();
        $tagastusDate= new DateTime($tagastus_kuup);
        $laenupikkus= $currentDate ->diff($tagastusDate) ->days;

        if ($laenupikkus > 7) {
            echo "<tr>
              <td>$raamatunimi</td>
              <td>$autor</td>
              <td style='background: #7da368'>$laenupikkus</td>
              </tr>";
        }
        else if ($laenupikkus <= 0) {
            echo "<tr>
              <td>$raamatunimi</td>
              <td>$autor</td>
              <td style='background: #f27c6c'>$laenupikkus</td>
              </tr>";
        }
        else if ($laenupikkus > 0 && $laenupikkus <= 7) {
            echo "<tr>
              <td>$raamatunimi</td>
              <td>$autor</td>
              <td style='background: #ffec99'>$laenupikkus</td>
              </tr>";
        }



    }
    ?>
</table>

<?php
include ("footer.php")
?>
