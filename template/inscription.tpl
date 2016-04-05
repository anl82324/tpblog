{if isset($membre)}
    <div class="alert alert-error" id="notif">
        {$membre}
    </div>
{/if}

{*formulaire d'inscription*}
<form action="inscription.php" method="post" enctype="multipart/form-data" id="form-inscription" name="form_inscription">
    <div class="clearfix">
        <label for="nom">Nom : </label>
        <div class="input"> 
            <input type="text" name="nom" id="nom" value=""/>
        </div>
    </div> 
    <div class="clearfix">
        <label for="prenom">Prenom : </label>
        <div class="input"> 
            <input type="text" name="prenom" id="prenom" value=""/>
        </div>
    </div> 
    <div class="clearfix">
        <label for="email">Email : </label>
        <div class="input"> 
            <input type="text" name="email" id="email" value=""/>
        </div>
    </div> 
    <div class="clearfix">
        <label for="email">Login : </label>
        <div class="input"> 
            <input type="text" name="login" id="login" value=""/>
        </div>
    </div> 
    <div class="clearfix">
        <label for="mdp">Mot de passe : </label>
        <div class="input"> 
            <input type="text" name="mdp" id="mdp"></input>
        </div> 
    </div>
    <div class="form-actions">
        <input type="submit" name="membre" value="Devenir membre" class="btn btn-large btn-primary"/>
    </div>
</form>  
