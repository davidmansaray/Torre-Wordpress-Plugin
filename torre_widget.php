<div class="torre-card">
         <?php
        $torre_username = get_option('torre_username');
        $response = wp_remote_get('https://torre.bio/api/bios/'.$torre_username);
        $body = wp_remote_retrieve_body($response);
        $decoded_body = json_decode( $body, true );

    if (is_array($decoded_body) || is_object($decoded_body)) {
        foreach($decoded_body as $key => $value){
              
            echo    "<div class=\"torre-name\">".$value['name']."<br></div>";
            echo    "<div class=\"torre-professionalHeadline\">".$value['professionalHeadline']."<br></div>";
            echo    "<div class=\"torre-picture\">"."<img src=".$value['picture'].">"."<br></div>";
            echo    "<div class=\"torre-e-mail\">".$value['email']."<br></div>";
            echo    "<div class=\"torre-phone-number\">".$value['phone']."<br></div>"; 
            echo    "<div class=\"torre-location\">".$value['location']."<br></div>"; 
            break;
        }
    }
        ?>

             <?php echo "<div class=\"torre-call-to-action\"> <p> View my full professional profile on <a href="."https://torre.bio/".$torre_username.">Torre</a> </p></div>"; ?>
    
        <button class="torre-profile-button"> View Full Profile </button>
</div class="torre-card" >  <!--  /. Torre card -->


