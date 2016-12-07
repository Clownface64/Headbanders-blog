<?php
$this->layout('master', [
    'title'=>'Headbangers NZ | Article',
    'desc'=>'wellington based Hard Rock and Heavy Metal blog, with photos of local band and up coming events.'
  ]);
?>
<!-- Carousel
    ================================================== -->
    <div class="jumbotron">
  <div class="container">
    <img src="img/uploads/original/<?= $this->e($article['image']) ?>">
  </div>
</div>
<!-- ========================================== -->
   <div class="article">
    <article >
      <h1><?= $this->e($article['title_one']) ?></h1>
      <h6 class="byline">Writen by:<?= $this->e($article['written_by']) ?></h6>
      <h6 class="byline">Uploaded on: <?= $this->e($article['upload_date']) ?></h6>
      

      
      <hr id="hr">
     
      <p class="article-body">
        <?= $this->e($article['article']) ?>
      </p>
      <a href="index.php?page=editArticle&articleid<?=$_GET['article_id']?>"><h2>EDIT</h2></a>
    </article>
    <hr>
    <div>
      <section>
        <section>
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12"> 
         
                <form class="form-group" action="index.php?page=article&articleid=<?= $_GET['article_id'] ?>" method="post">
            
              <h2>Comments: (<?= count($allComments) ?>)</h2>
              
                <div class="form-group">
                  <label for="comment">Please write a comment: </label>
                  <textarea class="form-control ckeditor" name="comment" id="comment" cols="30" rows="5"></textarea>
                </div>

                <?= isset($commentMessage) ? $commentNameMessage : '' ?>
              
                <div>
                  <input class="btn btn-default" type="submit" name="new-comment" value="Submit">
                </div>

                <?= isset($articleCommentMessage) ? $articleCommentMessage : '' ?>
            </form>

            <?php if(is_array($allComments)): ?>
          <?php foreach($allComments as $comment): ?>

            <article id="edit-dot">
                <h2>Posted Comments</h2> 
                <p><?= ($comment['comment']) ?> </p>
                <small>Written by: <?= htmlentities($comment['first_name']) ?> <?= htmlentities($comment['last_name']) ?></small>

                <?php
                // Is the visitor logged in?
                if( isset($_SESSION['user_id']) ) {
                // Does this user own the comment?
                if( $_SESSION['user_id'] == $comment['user_id'] || $_SESSION['privilege'] == 'admin' ){
                  
                  ?>
                    <li>
                      <a href="index.php?page=edit-comments&commentid=<?=$comment['comment_id']?>"><button class="btn btn-success post-button btn-xs">Edit</button></a>
                    </li>
                      
                    <li>
                      <a><button class="delete-post btn btn-success post-button btn-xs">Delete</button></a>
                      
                        <div class="delete-post-options">
                          <a href= "<?= $_SERVER['REQUEST_URI'] ?>&deleteComment&commentid=<?=$comment['comment_id']?>">Yes</a> / <button>No</button>
                        </div>

                    </li>
                    <?php
                  }
                }
              ?>

            </article>
                
                <?php endforeach ?>
              <?php endif; ?>
            </div>
        </div> 
    </div>
</section>
            </div>
          </li>
        </ul>
      </section>
    </div>
   </div>
   <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'comment' );
            </script>