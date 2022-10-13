<!
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ülesanne 0401</title>
</head>
<body>

<pre>
Ülesanne 0401:

Tee massiiv kuhu pane järgmised andmed:
Nimi, aadress, pildi nimi (nt. vello.jpg), kodulehekülg (nt. aare.edu.ee)
Pilt salvesta ülesande kataloogi.
Tee HTML lehekülg kuhu kuva nmassiivist välja eelpool kirjeldatud andmed.
Nimi välja kuvamiseks kasuta &lt;b&gt; tagi.
Aadress välja kuvamiseks kasuta &lt;i&gt; tagi.
Pilt välja kuvamiseks kasuta &lt;img src=&gt; tagi.
Kodulehe lingi välja kuvamiseks kasuta &lt;a href=&gt; tagi.
</pre>

<?php

$data = array("name"=>"Karol","address"=>"Sõpruse pst. 222","image_url"=>"portree.JPG","homepage"=>"https://karoliinekaljuste21.thkit.ee");

?>

<b>Nimi: <?= $data["name"] ?></b><br>
<i>Aadress: <?= $data["address"] ?></i><br>

<img src='<?= $data["image_url"] ?>' alt='<?= $data["name"] ?>' width="150" height="170" > <br>
<!-- tegelt peaks pildi tegema reaalselt väiksemaks, nii suur pilt võtab ressursse -->

Koduleht:<a href='<?= $data["homepage"]?>'><?= $data["name"] ?></a><br>

</body>
</html>