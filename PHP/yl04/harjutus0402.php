<!
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Ülesanne 0402</title>
</head>
<body>

<pre>

Ülesanne 0402:

Tee tsükliga 20 checkboxi. Pane neile kõigile oma nimi stiilis box[1], box[2], jne.
Tee tsükliga 20 teksti lahtrit. Pane neile kõigile oma nimi stiilis cell[1], cell[2], jne.
Tee tsükliga 20 radio buttonit. Pane neile kõigile üks nimi "radio" ja erinevad väärtused stiilis value1, value2 jne.
</pre>

<!-- otsisime w3schools näite ette https://www.w3schools.com/html/html_forms.asp-->

<!-- proovisin nii et echo sisse läheb, ja siis jutumärkidega jamades-->
<form>
    <?php
    for ($i=1;$i<=20; $i++) {

        echo "<input type='checkbox' id='box" . $i . "' name='box" . $i . "' value='Box'>";
        echo "<label for='box" . $i . "'> box " . $i . " </label><br>";
    
    }
    ?>
</form>
<!-- need <?= "php asi" ?> peab php koodi ümber panema ja siis vist töötab-->
    <?php
    for ($j=1; $j<=20; $j++) { ?>
        <label for="cell <?= $j ?> ">Cell <?= $j ?>:</label><br>
        <input type="text" id="cell <?= $j ?>" name="cell <?= $j ?>"><br>
    <?php
    }

    ?>
<form>
    <?php
    for ($m=1; $m<=20; $m++) { ?>
        <input type="radio" id="radio <?= $m ?>" name="radio_button" value="value <?= $m ?> ">
        <label for="radio <?= $m ?> ">Radio <?= $m ?> </label><br>
    <?php
    }
    ?>

</form>

</body>
</html>