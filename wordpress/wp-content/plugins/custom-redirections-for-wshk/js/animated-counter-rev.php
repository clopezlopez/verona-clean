<?php

//animated counter
//class members

?>

<script>
    rev=document.getElementById('custoprorev');
revcount=rev.textContent;
revi=0;
function counterrev() {
if(revi<revcount) {
revi++;
}
rev.textContent=revi;
}

setInterval(counterrev,150);
</script>

<?php


?>