<!DOCTYPE html>
<?php
session_start();
require('securityAction.php');
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Around | Mon profil</title>
    <link rel="stylesheet" href="profil.css">
    <link rel="stylesheet" href="post2.css">
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>
</head>
<body>
    <nav class="navbar">
        <div class="h1_nav">
            <h1>Around</h1>
        </div>
        <div class="lien_intra_site">
            <ul class="navbarul">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="#">Découvrir</a></li>
                <li><a href="pageAmis.html">Amis</a></li>
            </ul>
        </div>
        <div class="search_notif_profile">
            <div class="navSearch">
                <input type="text" placeholder="Search" class="navSearchInput">
                <button class="navSearchButton">
                    <img src="img/search.svg" alt="Rechercher">
                </button>
            </div>
            <img src="img/bell.svg" class="notification_bell">
            <div class="pfp_navbar_div">
                <a href="profil.php" id="profilImg">
                    <img onerror="this.src=getFallbackImage();" id="pp_profil" src="pp_data/<?php echo $_SESSION["id_users"]; ?>.png" class="pfp_navbar" alt="Mon profil" title="Profil">
                    <script>
                      function getFallbackImage() {
                        return "img/anonym.png";
                      }
                    </script>
                </a>
            </div>
            <img src="img/square-menu.svg" alt="Menu" class="menu-burger">
        </div>
    </nav>
    <div class="menuPlusProfil">
        <div class="cadreMenu" id="cadreMenu">
            <div id="topMenu">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none" id="fleche">
                    <path d="M18.75 22.5L11.25 15L18.75 7.5" stroke="#1E1E1E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h1 id="menu">Menu</h1>

            </div>
            
            <div class="middleMenu">
                <div class="homeMenu" >
                    <a href=""><img src="MenuCode/img/house.svg" alt=""><p id="home">Home</p></a>
                </div>
                <div class="searchMenu" >
                    <a href=""><img src="MenuCode/img/search.svg" alt=""><p id="search">Search</p></a>
                </div>
                <div class="notificationMenu" >
                    <a href=""><img src="MenuCode/img/bell.svg" alt=""><p id="notif">Notification</p></a>
                </div>
                <div class="exploreMenu" >
                    <a href=""><img src="MenuCode/img/compass.svg" alt=""><p id="explore">Explore</p></a>
                </div>
            </div>
            <div class="bottomMenu">
                <div class="profileMenu" >
                    <a href=""><img src="MenuCode/img/circle-user-round.svg" alt=""><p id="profile">Profile</p></a>
                </div>
                <div class="settingsMenu">
                    <a href=""><img src="MenuCode/img/settings.svg" alt=""><p  id="settings">Settings</p></a>
                </div>
            </div>
        </div>
        <div class="bgProfil">
            <div class="profil">
                <div class="pfpPsd">
                    <img onerror="this.src=getFallbackImage();" id="pp_profil" src="pp_data/<?php echo $_SESSION["id_users"]; ?>.png">
                    <script>
                      function getFallbackImage() {
                        return "img/anonym.png";
                      }
                    </script>
                    <div class="psdbio">
                        <h3 id="pseudo">
                            
                        <?php echo $_SESSION["username"]; ?>
                        
                        </h3>
                        <p id="bio"><?php echo $_SESSION["email"]; ?></p>
                        <div class="nbrFollow">
                            <h4 id="followers">10.3K <span>Abonnés</span></h4>
                            <h4 id="following">123 <span>Abonnements</span></h4>
                        </div>
                    </div>
                </div>
                <button id="follow">S'abonner</button>
            </div>
            <div class="posts">
                <div class="btnPosts">
                    <button id="btnPostPar">Postés par Matisse</button>
                    <button id="btnPostSur">Postés sur le compte de Matisse</button>
                </div>    
                    <div id="post_global">
                        <div id="div_user_pp">  
                            <img id="user_pp" src="img/pfp.png">
                        </div>
                        
                        <div id="div_poster_name">
                            <p id="poster_name">Sully.rmd</p>
                            <p id="date">01/01/1970</p>
                        </div>
                        
                
                        
                        <div id="div_titre">
                            <p id="titre">Soirée</p>
                        </div>
                
                
                        <div id="div_post">
                            <img id="post" src="img/soirée.jpg">
                        </div>
                
                        <div id="div_com">
                            <div id="com" ></div>
                        </div>
                        
                        <div id="div_vue">
                            <svg id="vue" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M2.06202 12.3481C1.97868 12.1236 1.97868 11.8766 2.06202 11.6521C2.87372 9.68397 4.25153 8.00116 6.02079 6.81701C7.79004 5.63287 9.87106 5.00073 12 5.00073C14.129 5.00073 16.21 5.63287 17.9792 6.81701C19.7485 8.00116 21.1263 9.68397 21.938 11.6521C22.0214 11.8766 22.0214 12.1236 21.938 12.3481C21.1263 14.3163 19.7485 15.9991 17.9792 17.1832C16.21 18.3674 14.129 18.9995 12 18.9995C9.87106 18.9995 7.79004 18.3674 6.02079 17.1832C4.25153 15.9991 2.87372 14.3163 2.06202 12.3481Z" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#808080" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <p id="nb_vue">69</p>
                        </div>
                        
                        <div id="div_interact">
                            <svg id="like" xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                                <path d="M2.31804 2.31804C1.90017 2.7359 1.5687 3.23198 1.34255 3.77795C1.1164 4.32392 1 4.90909 1 5.50004C1 6.09099 1.1164 6.67616 1.34255 7.22213C1.5687 7.7681 1.90017 8.26417 2.31804 8.68204L10 16.364L17.682 8.68204C18.526 7.83812 19.0001 6.69352 19.0001 5.50004C19.0001 4.30656 18.526 3.16196 17.682 2.31804C16.8381 1.47412 15.6935 1.00001 14.5 1.00001C13.3066 1.00001 12.162 1.47412 11.318 2.31804L10 3.63604L8.68204 2.31804C8.26417 1.90017 7.7681 1.5687 7.22213 1.34255C6.67616 1.1164 6.09099 1 5.50004 1C4.90909 1 4.32392 1.1164 3.77795 1.34255C3.23198 1.5687 2.7359 1.90017 2.31804 2.31804Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg id="fav" xmlns="http://www.w3.org/2000/svg" width="14" height="17" viewBox="0 0 14 17" fill="none">
                                <path d="M12.6667 16L6.83333 12.6667L1 16V2.66667C1 2.22464 1.17559 1.80072 1.48816 1.48816C1.80072 1.17559 2.22464 1 2.66667 1H11C11.442 1 11.866 1.17559 12.1785 1.48816C12.4911 1.80072 12.6667 2.22464 12.6667 2.66667V16Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <svg id="repost" xmlns="http://www.w3.org/2000/svg" width="19" height="12" viewBox="0 0 19 12" fill="none">
                                <path d="M1 3.5L3.5 1L6 3.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.1667 11H5.16667C4.72464 11 4.30072 10.8244 3.98816 10.5118C3.67559 10.1993 3.5 9.77536 3.5 9.33333V1" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.6665 8.5L15.1665 11L12.6665 8.5" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8.5 1H13.5C13.942 1 14.366 1.17559 14.6785 1.48816C14.9911 1.80072 15.1667 2.22464 15.1667 2.66667V11" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        
                    
                    </div>
                
            </div>
        </div>
    </div>
    
</body>
</html>
