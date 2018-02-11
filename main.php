<?php 
include('./lib/init.php');

// Cache preparation
$_SESSION['lang'] = (isset($_SESSION['lang']))?$_SESSION['lang']:'en';
$_GET['page'] = (isset($_GET['page']))?$_GET['page']:1;

$cache = 'cache/'.$currentpage.'-'.$_SESSION['lang'].'-'.$_GET['page'].'.html';
$expire = time()-$config['cache_time']; // valable un jour

// Commandes Get
$cached = 1;
if(isset($_GET['clear']) && $_GET['clear']==1) {
    $cached = 0;
}
if(isset($_GET['cache']) && $_GET['cache']==0) {
    $cached = 0;
}

$blacklist = $config['cache_blacklist'];

// Fichier existant ET temps depuis dernier cache inferieur a l'expiration ET pas dans la blacklist
if(file_exists($cache) && filemtime($cache) > $expire && $config['cache_activated'] && array_search($currentpage,$blacklist)===false && $cached==1) { 
    readfile($cache);
} elseif(array_search($currentpage,$blacklist)!==false || !$config['cache_activated']) {
    if(!file_exists('basefiles/'.$currentpage.'.php')) {
        include_once('errors/404.html');
    } else { 
        include_once('basefiles/'.$currentpage.'.php'); // We don't need to cache it
    }
} else {
    if(!file_exists('basefiles/'.$currentpage.'.php')) {
        include_once('errors/404.html');
    } else {    
        ob_start(); // ouverture du tampon
 
        include_once('basefiles/'.$currentpage.'.php');

        $page = ob_get_contents(); // copie du contenu du tampon dans une chaîne
        ob_end_clean(); // effacement du contenu du tampon et arrêt de son fonctionnement
        
        file_put_contents($cache, $page) ; // on écrit la chaîne précédemment récupérée ($page) dans un fichier ($cache)

        echo $page ; // on affiche notre page :D 
    }
}
?>