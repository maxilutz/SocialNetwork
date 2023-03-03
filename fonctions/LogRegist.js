
// // Script pour fermer la fenêtre de connexion en cliquant sur la zone extérieure
// var modal_register = document.getElementById('register-modal');
// var modal_login = document.getElementById('login-modal');
// window.onclick = function(event) {
//     if (event.target == modal_register) {
//         document.getElementById('register-modal').style.display='none';
//         changeURL('/');
//     }
//     if (event.target == modal_login) {
//         document.getElementById('login-modal').style.display='none';
//         changeURL('/');
//     }
// }


function register()
{
    document.getElementById("register-modal").style.display = "block";
    document.getElementById("login-modal").style.display = "none";
}
function login()
{
    document.getElementById("register-modal").style.display = "none";
    document.getElementById("login-modal").style.display = "block";
}
function exitLR()
{
    document.getElementById("register-modal").style.display = "none";
    document.getElementById("login-modal").style.display = "none";
}