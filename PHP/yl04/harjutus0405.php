<!
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Arvutustabel</title>
    <style>
        table, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {

        }

    </style>
</head>
<body>

    <pre>
Ülesanne 0405:

Genereeri kahe FOR tsükkliga 10x10 korrutustabel.
Korrutustabel peab olema tabeli sees.
Korrutustabelis peab olema esimesel real ja veerul numbrid 1-10.
Teisel real esimese rea ja veeru korrustis jne.
    </pre>
    <table>
    <?php
    for ($i=1; $i<=10; $i++) { ?>
        <tr>
        <?php
        for ($j=1; $j<=10; $j++) {
            ?> <td> <?=$i*$j?> </td>
        <?php
        }
        ?>
        </tr>
        <?php
        ##echo "<br>";
        $j=1;
    }
    ?>
    </table>

</body>
</html>