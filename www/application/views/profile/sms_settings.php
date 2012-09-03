
<h2> Subscription Settings </h2>
<div class = "row-fluid sms_faq well span3">
  <div class="clearfix">
      <label><h3>SMS Number</h3></label>
      <div class="input">
         <?php echo form_error('phone'); ?>
          <input type="text" name = "phone" value="<?php echo $phone; ?>"/>
      </div>
  </div>

    <div class="clearfix subscription_option">
      <label class="checkbox">   
          <input type="checkbox" <?php echo $daily_updates ? "checked" : "" ?> name="daily_updates" value="1"> <h3> Daily Updates </h3>
      </label>
      <div class ="subscription_description">
        1 text messsage every night that tells you you the current Human and Zombie count.
      </div>
    </div>


      <div class="clearfix subscription_option">
      <label class="checkbox">   
          <input type="checkbox" name="team_updates" value="1"> <h3> Team Updates.</h3>
      </label>
      <div class ="subscription_description">
        You recieve a text if someone on your team gets turned into a zombie!
      </div>
    </div>



      <div class="clearfix subscription_option">
      <label class="checkbox">   
          <input type="checkbox" name="team_updates" value="1"> <h3> Mission Updates.</h3>
      </label>    
      <div class ="subscription_description">
        Admins can send mass messages to either zombies or humans during active missions.
      </div>
    </div>
  <div class = "row-fluid"> 
    <div class = "btn btn-info"> Save </div>
  </div>
</div>


<h2> Commands  </h2> <h3> Text us at: +1 208-402-4500 </h3>
<div class = "row-fluid sms_faq well span3">
  <div class = "command_item"> "stop" - Stop recieving any text messages from Zombie Source. </div>
  <div class = "command_item">"start" - Resume receiving texts according to your subscription settings.</div>
  <div class = "command_item">"tag &#60 human_code&#62" - Tag a user by sending the word tag and then their human code </div>
  <div class = "command_item">"stats" - Get human and zombie counts at any time</div>


</div>