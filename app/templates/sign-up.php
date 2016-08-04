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
      <input class="input-sign-up" type="text" name="first-name" value="">            
    </div>
  
    <div class="form-group">
      <label for="last-name">Last Name:</label>
      <input class="input-sign-up" type="text" name="last-name" value="">            
    </div>
  
    <div class="form-group">
      <label for="email">Email:</label>
      <input class="input-sign-up" type="text" name="email" value=""> 
    </div>
          
    <div class="form-group">
      <label for="password">Password:</label>
      <input class="input-sign-up" type="text" name="password" value="">            
    </div>

    <div class="form-group">
      <label for="password">Password:</label>
      <input class="input-sign-up" type="text" name="password" value="">            
    </div>
  
    <div class="form-group">
      <label for="image">Profile picture:</label>
      <input class="" type="file" name="image" id="image">
    </div>

    <input class="button submit-sign-up" type="submit" name="sign-up" value="Sign up">
  </form>
</div>
