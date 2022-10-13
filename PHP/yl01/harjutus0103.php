<?php

echo "Ülesanne 0103: <br>

Järgnevas ülesandes tohib kasutada vaid IF tingimust, 
mooduli võtmist (mod %) ja FOR tsükklit. 
Kuvada ühe FOR tsükkliga välja järgmine arvude jada järgmisel kujul: <br>

100
200
300
400
500
600
700
800
900
1000 <br>";

// mod % on jagatise leidmine
//mdea kuidas seda siin rakendada küll
echo "Lahendus: <br>";
for ($i=100; $i<1001; $i+=100) {
    echo "$i<br>";
}