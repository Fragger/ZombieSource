<?php
if ($use_username) {
    $username = array(
        'name'  => 'username',
        'id'    => 'username',
        'value' => set_value('username'),
        'maxlength' => $this->config->item('username_max_length', 'tank_auth'),
        'size'  => 30,
    );
}
$email = array(
    'name'  => 'email',
    'id'    => 'email',
    'value' => set_value('email'),
    'maxlength' => 80,
    'size'  => 30,
);
//$emailsuffixoptions = array(
//	'1' => 'vandals.uidaho.edu',
//	'2' => 'uidaho.edu'
//);
$password = array(
    'name'  => 'password',
    'id'    => 'password',
    'value' => set_value('password'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size'  => 30,
);
$confirm_password = array(
    'name'  => 'confirm_password',
    'id'    => 'confirm_password',
    'value' => set_value('confirm_password'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size'  => 30,
);
$captcha = array(
    'name'  => 'captcha',
    'id'    => 'captcha',
    'maxlength' => 8,
);
?>

<div class="page-header">
 <h1>Humans vs Zombies <small> Dead of Winter </small></h1>
</div>
<div class = "row" >
   <div class="main">
      <div id = "title">
      <h2>New User Registration </h2>
      </div>
      <div id = "fields">
          <fieldset>

            <?php echo form_open($this->uri->uri_string()); ?>
            <table>
                <?php if ($use_username) { ?>
                <tr>
                    <td><?php echo form_label('Username', $username['id']); ?></td>
                    <td><?php echo form_input($username); ?></td>
                    <td style="color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td><?php echo form_label('Email Address', $email['id']); ?></td>
                    <td><?php echo form_input($email); ?> <? //echo form_dropdown('emailsuffix', $emailsuffixoptions, '1'); ?></td>
                    <td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
                </tr>
                <tr>
                    <td><?php echo form_label('Password', $password['id']); ?></td>
                    <td><?php echo form_password($password); ?></td>
                    <td style="color: red;"><?php echo form_error($password['name']); ?></td>
                </tr>
                <tr>
                    <td><?php echo form_label('Confirm Password', $confirm_password['id']); ?></td>
                    <td><?php echo form_password($confirm_password); ?></td>
                    <td style="color: red;"><?php echo form_error($confirm_password['name']); ?></td>
                </tr>

                <?php if ($captcha_registration) {
                    if ($use_recaptcha) { ?>
                <tr>
                    <td colspan="2">
                        <div id="recaptcha_image"></div>
                    </td>
                    <td>
                        <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
                        <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
                        <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="recaptcha_only_if_image">Enter the words above</div>
                        <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
                    </td>
                    <td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
                    <td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
                    <?php echo $recaptcha_html; ?>
                </tr>
                <?php } else { ?>
                <tr>
                    <td colspan="3">
                        <p>Enter the code exactly as it appears:</p>
                        <?php echo $captcha_html; ?>
                    </td>
                </tr>
                <tr>
                    <td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
                    <td><?php echo form_input($captcha); ?></td>
                    <td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
                </tr>
                <?php }
                } ?>
            </table>
              <div id = "register_button">
                    <input type="submit" value = "Register" class = "btn success"/>  </form> 
                    <?php echo form_close(); ?> 
              </div>
            </fieldset>
      </div>
   </div>
   <div class="sidebar">
      <h3>Info</h3>
      <div class = "infoitem">
         <b> Game Play:</b> <br>
         Feb 6th - Feb 12th
      </div>
      <div class = "tinyline"></div>
      <div class = "infoitem">
         <b> Registration Deadline:</b><br>
         Jan 27th
      </div>
      <div class = "tinyline"></div>
      <div class = "infoitem">
         <b> Orientation Dates:</b><br>
         Jan 30th - Feb 3rd 
      </div>
      <div class = "tinyline"></div>
      <div class = "infoitem">
         <b> Contact:</b><br>
         <a href = "mailto:UofIHvZ@gmail.com"> UofIHvZ@gmail.com </a> <br>
         <a href = "http://www.facebook.com/groups/194292097284119/"> Facebook Group </a>
      </div>
      <div class = "tinyline"></div>
      <div class = "infoitem">
         <a href = "http://www.facebook.com/groups/194292097284119/"> Rules </a>
      </div>
   </div>
</div>

