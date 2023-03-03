<?php
if(session_status()==1) 
{
    header('Location: /setting');
}
?>
<button id="myButton">Cliquez ici</button>
<p id="text">Texte initial</p>

<script>
  var current_url = document.location.pathname;
  console.log(current_url) 
  document.getElementById("myButton").onclick = function() {
    document.getElementById("text").innerHTML = current_url;
  }
</script>
