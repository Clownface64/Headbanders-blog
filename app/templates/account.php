<?php
$this->layout('master', [
    'title'=>'Headbangers NZ | Account',
    'desc'=>'wellington based Hard Rock and Heavy Metal blog, vith photos of local band and up coming events.'
  ]);
?>
<div class="account">
  <div>
    <div class="pills">
      <h1>Account:</h1>
  <!-- Nav tabs -->
      <ul class="nav nav-pills nav-stacked" role="tablist">
        <li role="presentation" class="">
          <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a>
        </li>
  
        <li role="presentation">
          <a href="#add-band" aria-controls="add-band" role="tab" data-toggle="tab">Add a band</a>
        </li>
    
        <li role="presentation">
          <a href="#upload-photo" aria-controls="upload-photo" role="tab" data-toggle="tab">Upload photos</a>
      </li>

      <li role="presentation">
          <a href="#post-article" aria-controls="post-article" role="tab" data-toggle="tab">Post articles</a>
      </li>
    </ul>
    </div>
  <!-- Tab panes -->
    <div class="tab-content clearfix">
      <div role="tabpanel" class="tab-pane active" id="profile">
        <form id="profile" role="form" action="" method="post">                      
          <div class="form-group">
            <img src="http://placehold.it/200x200">
            <h3></h3>
            <label id="profile-pic-input" for="image">Update profile picture:</label>
            <input class="input-modal" type="file" name="image" id="image">            
          </div>
          
          <div class="form-group">
            <label for="first-name">First Name:</label>
            <input class="input-modal" type="text" name="first-name" value="<?php isset($_POST['changes']) 
            ? $_POST['first-name'] : '' ?>"> 
            <?= isset($firstNameMessage) ? $firstNameMessage : '' ?>           
          </div>

          <div class="form-group">
            <label for="last-name">Last Name:</label>
            <input class="input-modal" type="text" name="last-name" value="<?php isset($_POST['changes']) 
            ? $_POST['last-name'] : '' ?>"> 
            <?= isset($lastNameMessage) ? $lastNameMessage : '' ?>           
          </div>

          <div class="form-group">
            <label for="email">Email:</label>
            <input class="input-modal" type="text" name="email" value="<?php isset($_POST['changes']) 
            ? $_POST['email'] : '' ?>">
            <?= isset($emailMessage) ? $emailMessage : '' ?>            
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <input class="input-modal" type="password" name="password" value="<?php isset($_POST['changes']) 
            ? $_POST['password'] : '' ?>"> 
            <?= isset($passwordMessage) ? $passwordMessage : '' ?>           
          </div>
      
          <input class="button submit-log-in" type="submit" name="changes" value="Save changes">
          <?= isset($successMessage) ? $successMessage : '' ?>
        </form>
      </div>

      <div role="tabpanel" class="tab-pane clearfix" id="add-band">        
                <form id="profile" role="form" action="" method="post">                      
                  <div class="form-group">
                    <h1><input class="input-modal" type="text" name="band-name" placeholder="Band name:" value=""></h1>       
                  </div>
                      
                  <div class="form-group info-label">
                    <label  for="genre">Genre:</label>
                    <input class="input-modal" type="text" name="last-name" value="">            
                  </div>
        
                  <textarea name="band" id="band" rows="10" cols="80"></textarea>

                  <input class="button submit-log-in" type="submit" name="changes" value="Create">
                </form>
      </div>

      <div role="tabpanel" class="tab-pane" id="upload-photo">
      <h1>Upload a photo</h1>
        <form action="" method="post">
          <div class="form-group">
            <label for="name">Name:</label>
            <input class="input-modal band-input" type="text">
          </div>

          <div class="form-group">
            <label for="description">Discription:</label>
            <textarea class="input-modal band-input" type="text"></textarea>
          </div>

          <div>
            <form action="">
              <select name="bands">
                <option value="">Select one</option>
                <option value="">Shiad</option>
                <option value="">Devilskin</option>
                <option value="">Black Seeds</option>
              </select>
            </form>  
          </div>

          <div class="form-group">
            <label for="images"></label>
            <input class="band-input" type="file" name="image" id="image">
          </div>

          <input class="button submit-images" type="submit" name="images" value="upload">
        </form>
      </div>

        <div role="tabpanel" class="tab-pane" id="post-article">
          <form action="" method="post">
            <label for="title-one">Title part one:</label>
            <input class="article-info" type="text">

            <label for="title-two">Title part two:</label>
            <input class="article-info" type="text">

            <label for="author">Writen by:</label>
            <input class="article-info" type="text">

            <label for="description">Description:</label>
            <textarea name="description"></textarea>

            <textarea name="article" id="article" rows="10" cols="80"></textarea>

            <input class="button submit-article" type="submit" name="article-submit" value="Post">

        </form>
      </div>

    </div>

  </div>
      
</div>

            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'article' );
            </script>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'band' );
            </script>