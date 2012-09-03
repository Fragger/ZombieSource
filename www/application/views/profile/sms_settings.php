


<div class = "row-fluid sms_faq well span3">
  <h2> Subscription Settings </h2>
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
    <div class = "btn btn-info btn-margin"> Save </div>
  </div>
</div>



<div class = "row-fluid sms_faq well span3">
 <h2> Commands  </h2> <h3> Text us at: +1 208-402-4500 </h3>
<table cellspacing="20px">
<tr>
<div class = "command_item">
<td><strong>stop</strong></td>
<td>Stop recieving any text messages from Zombie Source.</td>
</div>
</tr>
<tr>
  <div class = "command_item">
<td><strong>start</strong></td>
<td>Resume receiving texts according to your subscription settings.</td>
</div>
</tr>

<tr>
  <div class = "command_item">
<td><strong>tag &#60human_code&#62</strong></td>
<td>    Tag a user by sending the word tag and then their human code.</td>
</div>
</tr>

<tr>
  <div class = "command_item">
<td><strong>stats</strong></td>
<td>Get human and zombie counts at any time.</td>
</div>
</tr>
</table>


</div>