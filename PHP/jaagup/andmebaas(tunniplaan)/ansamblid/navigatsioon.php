<?php
function isActive($name): string {
    return basename($_SERVER['PHP_SELF']) == $name ? "active":"";
}
?>

<nav>
    <ul>
        <li><a class="<?=isActive('avaleht.php');?>" href="?page=avaleht">Avaleht</a></li>
        <li><a class="<?=isActive('avalikudansamblid.php');?>" href="?page=avalikudansamblid">Ansamblid</a></li>
        <li><a class="<?=isActive('lisamine.php');?>" href="?page=lisamine">Lisamine</a></li>
        <li><a  class="<?=isActive('peitmine.php');?>" href="?page=peitmine">Peitmine</a></li>
        <!--        <li><a href="#about">About</a></li>-->
    </ul>
</nav>