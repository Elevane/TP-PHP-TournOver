<!--
nom :live.php
fonction :c'est la page de live, on peut visionner les lives twitch
-->
<?php require_once('header.php');  // importe le header?>
        
<!--
/**********************************************/
                /* TWITCH */
/**********************************************/
-->
<div class="divTrait"></div><!--  Trait noir   -->

<div id="twitchH1">
    <h1>TOURNOVER : LE LIVE !</h1>
</div>
<section class="boxTwitch">

    <div id="divLecteur">
        <iframe src="https://player.twitch.tv/?channel=skite" frameborder="0" allowfullscreen="true" scrolling="no" height="378" width="620"></iframe><a href="https://www.twitch.tv/skite?tt_content=text_link&tt_medium=live_embed" style="padding:0px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px; text-decoration:underline;"></a><!--  /* LE LIVE */ -->
    </div>
    
    <iframe src="https://www.twitch.tv/embed/skite/chat" frameborder="0" scrolling="no" height="378" width="350" style="padding:0 0  0px" ></iframe><!--  /* LE TCHAT */ -->
</section>

<div class="divTrait"></div><!--  Trait noir   -->
        
<!--
/**********************************************/
                /* FOOTER */
/**********************************************/
-->
   
<?php require_once('footer.php');// importe le footer ?>