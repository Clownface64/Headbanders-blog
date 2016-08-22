<?php
$this->layout('master', [
    'title'=>'Headbangers NZ | Sign in',
    'desc'=>'wellington based Hard Rock and Heavy Metal blog, vith photos of local band and up coming events.'
  ]);



?>
<div id="login">

<h1>Sign in:</h1>
<form class="login col-xs-12" action="index.php?page=sign-in" method="post">
  <div class="form-group login-input">
    <label for="email">Email:</label>
    <input class="form-control " type="text" name="email" value="<?= isset($_POST['sign-in']) ? $_POST['email'] : '' ?>">
    <?php if(isset($emailMessage)): ?>
      <p><?= $emailMessage ?></p>
    <?php endif ?>
  </div>
  <div class="form-group login-input">
    <label for="password">Password:</label>
    <input class="form-control " type="password" name="password" value="<?= isset($_POST['sign-in']) ? $_POST['password'] : '' ?>">
    <?php if(isset($passwordMessage)): ?>
      <p><?= $passwordMessage ?></p>
    <?php endif ?>
  </div>
   <div class="forgotten-dropdown">
    <ul>
      <li><a href="">Forgotten password</a></li>
      <li><a href="index.php?page=sign-up">Sign up</a></li>
    </ul>
  </div> 
  <?php if(isset($signInMessage)): ?>
    <p><?= $signInMessage ?></p>
  <?php endif ?>
  <input class="button submit-log-in" type="submit" name="sign-in" value="Sign in">  
</form>
</div>