function bodyChange(page, param)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("body").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", page, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if(param != null)
        xhttp.send(param);
    else xhttp.send()
}
function MenuButton(button)
{
    // Désélectionner tous les boutons
    var buttons = document.getElementsByTagName("button");
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove("select");
    }
    // Sélectionner le bouton cliqué
    button.classList.add("select");
}

function currentURL()
{
    var selUrl = document.location.pathname;
    var splitUrl = selUrl.split("/");
    splitUrl = splitUrl.filter((str) => str !== '');
    return splitUrl;
}



function pushURL(newURL)
{
    window.history.pushState({}, "", newURL);
}

function changeURL(newURL)
{
    window.history.replaceState({}, "", newURL);
}