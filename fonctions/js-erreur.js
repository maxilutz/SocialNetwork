function ErreurMessage(formID,lien,position) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById(position).innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", lien, true);
    var formData = new FormData(document.getElementById(formID));
    xhttp.send(formData);
    window.setTimeout(delMessage, 5000,position);
}
function delMessage(position){
    document.getElementById(position).innerHTML = "";
}