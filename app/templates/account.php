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
      <ul class="nav nav-tabs nav-pills nav-stacked" role="tablist">
        <li role="presentation" class="">
          <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a>
        </li>
  
        <li role="presentation">
          <a href="#post-article" aria-controls="post-article" role="tab" data-toggle="tab">Post articles</a>
      </li>
    </ul>
    </div>
  <!-- Tab panes -->
    <div class="tab-content clearfix">
      <div role="tabpanel" class="tab-pane active" id="profile">
        <form id="profile" role="form" action="index.php?page=account" method="POST">                      
          <h3>Update details:</h3>
            
          
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

      <hr>

        <div role="tabpanel" class="tab-pane clearfix active" id="post-article">
          <form action="index.php?page=account" method="POST" enctype="multipart/form-data">
            <label for="title-one">Title:</label>
            <input class="article-info" type="text" name="title-one" value="<?php isset($_POST['article-submit'])  ? $_POST['title-one'] : '' ?>">
            <?= isset($titleErrorMessage) ? $titleErrorMessage : '' ?>

            <label for="author">Writen by:</label>
            <input class="article-info" type="text" name="author" value="<?php isset($_POST['article-submit']) ? $_POST['author'] : '' ?>">
            <?= isset($authorErrorMessage) ? $authorErrorMessage : '' ?>

            <label for="description">Description:</label>
            <textarea name="description" value="<?php isset($_POST['article-submit']) ? $_POST['description'] : '' ?>"></textarea>
            <?= isset($descriptErrorMessage) ? $descriptErrorMessage : '' ?>

            <label for="tags">Band:</label>
            <select name="tags">
              <option  value="">Select one</option>
              <?php 
                foreach ( $result as $item ) {
                  echo '<option value="'.$item['tag_id'].'">'.$item['band_name'].'</option>';
                }
              ?>              
            </select>
            <?= isset($tagErrorMessage) ? $tagErrorMessage : '' ?>

            

            <textarea name="article" id="article" rows="10" cols="80" value="<?php isset($_POST['article-submit']) 
            ? $_POST['article'] : '' ?>"></textarea>
            <?= isset($articleErrorMessage) ? $articleErrorMessage : '' ?>

            <label id="profile-pic-input" for="image">Article Image:</label>
            <input class="input-modal" type="file" name="image" id="image">
            <?=  isset($imageMessage) ? $imageMessage : '' ?>

           <!--  <label for="imgDescription">Image description:</label>
            <textarea name="imgDescription" value="<?php isset($_POST['article-submit']) ? $_POST['imgDescription'] : '' ?>"></textarea>
            <<!-- ?= isset($imgDescriptionErrorMessage) ? $imgDescriptionErrorMessage : '' ?> -->

            <!-- <label for="imgAlt">Image alt text:</label> -->
            <!-- <textarea name="imgAlt" value="<?php isset($_POST['article-submit']) ? $_POST['imgAlt'] : '' ?>"></textarea> -->
            <!-- <?= isset($imgAltErrorMessage) ? $imgAltErrorMessage : '' ?> --> 

            <input class="button submit-article" type="submit" name="article-submit" value="POST">
            <?= isset($articlePostMessage) ? $articlePostMessage : '' ?>

            <!--  Dropdown list of all the bands. You see the name of the band as an option
              but the value of the option is the ID of that band
              Get all bands from the database
              <option value="13">Evanescence</option>
    
              -->


              <!-- MUST PROVIDE IMAGE 
              image input field
              Database only supports one image

              Form process:
              upload the image first
              
              continue uploading the article. 2nd SQL
              You should now have the ID of the band, you have the filename of the image that was just uploaded


               -->

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
            