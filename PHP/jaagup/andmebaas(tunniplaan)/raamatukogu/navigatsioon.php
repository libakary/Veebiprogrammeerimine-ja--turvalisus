<?php
function isActive($name): string {
    return basename($_SERVER['PHP_SELF']) == $name ? "active" : "";
}
?>

<nav class="nav">
    <ul style="list-style-type:none; padding-inline-start: 0">
        <!-- need ei töötanud millegipärast niiet kasutasin lihtsamat versiooni
        <li><a class="< ?= isActive('avaleht.php'); ?>" href="?page=avaleht">Avaleht</a></li>
        <li><a class="< ?= isActive('kuvamineLaenamine.php'); ?>" href="?page=kuvamineLaenamine">Raamatute laenamine</a></li>
        <li><a class="< ?= isActive('raamatuLisamine.php'); ?>" href="?page=raamatuLisamine">Raamatute lisamine</a></li>
        <li><a class="< ?= isActive('väljas.php'); ?>" href="?page=väljas">Väljas raamatud</a></li>-->
        <li><input class="button1" onclick="window.location.href='kuvamineLaenamine.php';" value="Raamatute laenamine" /></li>
        <li><input class="button2" onclick="window.location.href='raamatuLisamine.php';" value="Raamatute lisamine" /></li>
        <li><input class="button3" onclick="window.location.href='väljas.php';" value="Väljas raamatud" /></li>
    </ul>
</nav>