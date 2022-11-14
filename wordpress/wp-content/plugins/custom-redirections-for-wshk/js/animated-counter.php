<?php

//animated counter
//class members

?>

<script>
    par=document.getElementById('custopurchprod');
count=par.textContent;
i=0;
function counter() {
if(i<count) {
i++;
}
par.textContent=i;
}

setInterval(counter,150);
</script>

<?php


?>