{if isset($connect)}
    <div class="alert alert-error" id="notif">
        {$connect}
    </div>
{/if}

{*formulaire de connexion*}
<form action="connexion.php" method="post" enctype="multipart/form-data" id="form-connexion" name="form_connexion">
    <div class="clearfix">
        <label for="email">Email : </label>
        <div class="input"> 
            <input type="text" name="email" id="email" value=""/>
        </div>
    </div>   
    <div class="clearfix">
        <label for="mot de passe">Mot de passe : </label>
        <div class="input"> 
            <input type="text" name="mdp" id="mdp"></input>
        </div> 
    </div>
    <div class="form-actions">
        <input type="submit" name="connect" value="Se connecter" class="btn btn-large btn-primary"/>
    </div>
</form>  

   
        
         