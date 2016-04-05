<div> 
    <nav class="contenu_menu">
    <h3>Menu</h3>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="article.php">Rédiger un article</a></li>
            <li><a href="connexion.php">Se connecter</a></li> 
            <li><a href="inscription.php">Devenir membre de la communaute</a></li> 
        </ul> 
           
        <div id="newsletter">
            <h3>Inscription à la Newsletter</h3>
            <input id="email" type="text" value="E-mail"/>
            <button id="bouton">OK</button>
        </div>
        
            
        <div id="searchbar">
            <h3>Recherche</h3>
            <form action="" class="formulaire">
                <input class="champ" type="text" value=""/>
                <input class="bouton" type="button" value='loupe.jpg'/>  
            </form>
        </div>    
    </nav>
</div>

<script src="js/jquery-1.8.2.js"></script>
<script>
    $(document).ready(function(){
        $("nav h3").hover(function(){
            $("#contenu_menu").slideDown();
        }), function(){
           $("#contenu_menu").slideUp();
        };
    });
    
    $("#bouton").click(function(){
        $ajax({
            method:'POST',
            url:'newsletter.php',
            data: {email: $("#email").val()}
        }).done(function(msg){
            console.log(msg);
        })
          .fail(function(){
            console.log("Echec");
        });
    }
</script>
