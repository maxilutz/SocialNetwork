<?php
if(session_status()==1) 
{
    header('Location: /');
}
?>
<header>
    <div id="menu">
        <?php 
        if(isset($_SESSION['token'])){
        ?>
        <div class="cardsMenu">
            <div class="cardMenu">
                <a href="/" >
                    <button <?php if($url == '' || !($url[0]=='profil'||$url[0]=='chat' ||$url[0]=='setting')) { print("class='select'"); } ?> >Home</button>
                </a> 
            </div>
            <div class="cardMenu">
                <a href="/profil" >
                    <button <?php if($url != '' && $url[0]=='profil') { print("class='select'"); } ?> >Profile</button>
                </a>
            </div>
            <div class="cardMenu">
                <a href="/chat" >
                    <button <?php if($url != '' && $url[0]=='chat') { print("class='select'"); } ?> >Message</button>
                </a>
            </div>
            <div class="cardMenu">
                <a href="/setting" >
                    <button <?php if($url != '' && $url[0]=='setting') { print("class='select'"); } ?> >Parametre</button>
                </a> 
            </div>
        </div>
        
            
        <?php
        }
        else
        {
        ?>
            <!-- Nav tabs -->
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <button onclick="login();changeURL('login');" class="select">Home</button>
                </td>
                <td>
                    <button onclick="login();changeURL('login');">Profile</button>
                </td>
                <td>
                    <button onclick="login();changeURL('login');">Message</button>
                </td>
                <td>
                    <button onclick="login();changeURL('login');">Settings</button>
                </td>
            </tr>
        </table>
        <?php
        }
        ?>
    </div>
</header>