<?php
//require("../dbConfig.php");

// eemalda urlist muutujad
function clearVarsExcept($url, $varname)
{
    return strtok($url, "?") . "?$varname=" . $_REQUEST[$varname];
}
global $yhendus;

if(!empty($_REQUEST["uuepealkiri"])){
    $kask=$yhendus->prepare(
        "INSERT INTO ansamblid(ansamblinimi, kommentaarid) VALUES(?, ' ')");
    $kask->bind_param("s", $_REQUEST["uuepealkiri"]);
    $kask->execute();
    echo $yhendus->error;
    //header("Location: $_SERVER[PHP_SELF]");
    //$yhendus->close();
    //exit();
}
?>

<h1>Ansambel</h1>
<?= clearVarsExcept(basename($_SERVER['REQUEST_URI']), "page") ?>
<form method="post" action="<?= clearVarsExcept(basename($_SERVER['REQUEST_URI']), "page") ?>&">
    <label>Uus ansambel:
        <input type="text" name="uuepealkiri" />
    </label>
    <input type="submit" value="Lisa ansambel" />
</form>
