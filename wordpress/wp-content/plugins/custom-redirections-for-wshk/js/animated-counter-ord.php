<?php

//animated counter
//class members

?>

<script>
    ord=document.getElementById('custototords');
ordcount=ord.textContent;
ordi=0;
function counterord() {
if(ordi<ordcount) {
ordi++;
}
ord.textContent=ordi;
}

setInterval(counterord,150);
</script>

<?php


?>