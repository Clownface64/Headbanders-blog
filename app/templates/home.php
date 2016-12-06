<?php
$this->layout('master', [
    'title'=>'Headbangers NZ | Home',
    'desc'=>'wellington based Hard Rock and Heavy Metal blog, vith photos of local band and up coming events.'
  ]);
?>
<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/carousel/1goodnightnurse.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="img/carousel/Devilskin+Live_0028_Photo_©Steve+Dykes.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              
            </div>
          </div>
        </div>

        <div class="item">
          <img class="third-slide" src="img/carousel/elemeno-p-at-homegrown-2011-005-500x333.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">              
              
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fourth-slide" src="img/carousel/maxresdefault (1).jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              
            </div>
          </div>
        </div> 
         <div class="item">
          <img class="fourth-slide" src="img/carousel/maxresdefault.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              
            </div>
          </div>
        </div>       
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

    <?php  $toggler = false;    ?>

      <!-- START THE FEATURETTES -->
      <?php foreach($allPosts as $item): ?>
      

      <div class="row featurette">
        <div class="col-md-7 <?= $toggler ? 'col-md-push-5' : '' ?>">
          <a class="article-anchor" href="index.php?page=article&articleid=<?=$item['']?>">
            <h2 class="featurette-heading"><?= $item['title_one'] ?> 
            </h2>
          </a>

          <h5 class="byline">Writen by:<?= $item['written_by'] ?></h5>
          <h5 class="byline">Uploaded on:<?= $item['upload_date'] ?></h5>

          <p class="lead"><?= $item['description'] ?></p>
        </div>
        <div class="col-md-5 <?= $toggler ? 'col-md-pull-7' : '' ?>">
          <a class="article-anchor" href="article.html">
            <img class="featurette-image img-responsive center-block" src="img/uploads/post/<?=$item['image']?>" alt="">
          </a>
        </div>
      </div>
<hr>
      <?php  $toggler = !$toggler;  ?>

    <?php endforeach ?>
      <hr class="featurette-divider">