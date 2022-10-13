<?php

echo "Ülesanne 0104:<br>

Kuvada kahe FOR tsükkliga välja järgmine arvude jada järgmisel kujul:<br>

1,0
1,1
1,2
1,3
1,4
1,5
1,6
1,7
1,8
1,9
2,0
2,1
... jne kuni
9,9<br>";

echo "Lahendus: <br>";
for ($j=1; $j<10; $j+=1) {
    for ($i=0;$i<10;$i+=1) {
        echo "$j,$i<br>";
    }
}
