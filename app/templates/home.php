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
          <img class="first-slide" src="http://placehold.it/1900x500/ff4700" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              
              <p><a class="btn btn-lg btn-primary btn-carousel" href="index.php?page=gallery" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="http://placehold.it/1900x500/0acdc0" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              
              <p><a class="btn btn-lg btn-carousel btn-primary" href="index.php?page=gallery" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>

        <div class="item">
          <img class="third-slide" src="http://placehold.it/1900x500/475767" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              
              <p><a class="btn btn-lg btn-primary btn-carousel" href="index.php?page=gallery" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fourth-slide" src="http://placehold.it/1900x500/aabbcc" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              
              <p><a class="btn btn-lg btn-primary btn-carousel" href="gallery.html" role="button">Browse gallery</a></p>
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

      <!-- Three columns of text below the carousel -->
      <div class="row">

        <div class="col-lg-4">
          <img class="img" src="http://placehold.it/200x200/ff4700" alt="Generic placeholder image" width="200" height="200">
          <h2 class="heading-two">Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default btn-read" href="article.html" role="button">Read article &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">
      <?php foreach($allPosts as $items): ?>
      <div class="row featurette">
        <div class="col-md-7">
          <a class="article-anchor"  href="index.php?page=article">
            <h2 class="featurette-heading"> <?= $item['title_one'] ?>
            <span class="text-muted"><?= $item['title_two']?></span>
            </h2>
          </a>

          <h5 class="byline">Writen by:<?= $item['written_by'] ?></h5>
          <h5 class="byline">Uploaded on:<?= $item['upload_date'] ?></h5>

          <p class="lead"></p>
        </div>
        <div class="col-md-5">
          <a class="article-anchor" href="article.html">
            <img class="featurette-image img-responsive center-block" src="<?=$item['image']?>" alt="">
          </a>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <a class="article-anchor" href="index.php?page=article">
            <h2 class="featurette-heading"><?= $item['title_one'] ?> 
            <span class="text-muted"><?= $item['title_two']?></span>
            </h2>
          </a>

          <h5 class="byline">Writen by:<?= $item['written_by'] ?></h5>
          <h5 class="byline">Uploaded on<:?= $item['upload_date'] ?></h5>

          <p class="lead"></p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <a class="article-anchor" href="article.html">
            <img class="featurette-image img-responsive center-block" src="<?=$item['image']?>" alt="">
          </a>
        </div>
      </div>
    <?php endforeach ?>
      <hr class="featurette-divider">