<?php
$this->layout('master', [
    'title'=>'Headbangers NZ | Sign up',
    'desc'=>'wellington based Hard Rock and Heavy Metal blog, vith photos of local band and up coming events.'
  ]);
?>

<div class="sign-up"> 
  <h1>Sign up:</h1>

  <form id="sign-up" role="form" action="" method="post">
    <div class="form-group">
      <label for="first-name">First Name:</label>
      <input class="input-sign-up" type="text" name="first-name" value="<?= isset($_POST['first-name']) ? $_POST['first-name'] : '' ?>">            
       <?php if( isset($firstNameMessage) ) : ?>
          <p><?= $firstNameMessage ?></p>
        <?php endif; ?>
    </div>
  
    <div class="form-group">
      <label for="last-name">Last Name:</label>
      <input class="input-sign-up" type="text" name="last-name" value="<?= isset($_POST['last-name']) ? $_POST['last-name'] : '' ?>">            
       <?php if( isset($lastNameMessage) ) : ?>
          <p><?= $lastNameMessage ?></p>
        <?php endif; ?>
    </div>
  
    <div class="form-group">
      <label for="email">Email:</label>
      <input class="input-sign-up" type="text" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
      <?php if( isset($emailMessage) ) : ?>
          <p><?= $emailMessage ?></p>
        <?php endif; ?>
    </div>
          
    <div class="form-group">
      <label for="password">Password:</label>
      <input class="input-sign-up" type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">            
       <?php if( isset($passwordMessage) ) : ?>
          <p><?= $passwordMessage ?></p>
        <?php endif; ?>
    </div>

    <div class="form-group">
      <label for="image">Profile picture:</label>
      <input class="" type="file" name="image" id="image">
    </div>

    <input class="button submit-sign-up" type="submit" name="sign-up" value="Sign up">
  </form>
</div>
