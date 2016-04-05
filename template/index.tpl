{if isset($msg_confirm)} {*Test si msg_error est different de nul*}
    <div class="alert alert-success" id="notif">
        {$msg_confirm}
    </div>
 {/if} 
 
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bjqs-1.3.min.js"></script>
 
<link type="text/css" rel="Stylesheet" href="css/bjqs.css" />

<div id="my-slideshow">
    <ul class="bjqs">
 
{foreach from=$tableauArticleSmarty item=tableau}
    <li>
    <img src="img/{$tableau['id']}.jpg" alt="{$tableau['titre']}" width="200"  />
    <h2> {$tableau['titre']} </h2>
    <p> {$tableau['texte']} </p> 
    <p> {$tableau['date_fr']} </p> 
    </li>
{/foreach}

    </ul>
</div>
   
<script>
    jQuery(document).ready(function($) {
        $('#my-slideshow').bjqs({
            'height' : 600,
            'width' : 600,
            animtype : 'slide'
        });  
    });    
</script>

<div class = "pagination">
    <ul>
        {for $i=1 to $nbpage}
           <li {if $i == $page} class="active"{/if}><a href="index.php?page={$i}">{$i}</a></li>
        {/for}
    </ul>
</div>
    
