<?php

echo "Ülesanne 0201<br>

Genereeri tsükliga 100 täisarvust koosnev massiiv.
Väljasta see 'print_r' funktsiooniga.<br>";

//$numbers = array();
for ($i=0; $i<100; $i++) {
    $numbers[]=$i;
    //$numbers[]=rand();
}

// ??? okei
?>
<pre><?php print_r($numbers); ?>
</pre>