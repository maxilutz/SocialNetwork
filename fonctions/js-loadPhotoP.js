
function gallery(num)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("gallery").innerHTML += this.responseText;
        }
    };
    xhttp.open("POST", "/pages/3pProfil.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if(num != null)
        xhttp.send(num);
    else xhttp.send()
}