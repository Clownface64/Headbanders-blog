<?php
$this->layout('master', [
    'title'=>'Headbangers NZ | Edit Article',
    'desc'=>'wellington based Hard Rock and Heavy Metal blog, with photos of local band and up coming events.'
  ]);
?>

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

           

            <input class="button submit-article" type="submit" name="editArticleSubmit" value="Save Changes">
            <?= isset($articlePostMessage) ? $articlePostMessage : '' ?>