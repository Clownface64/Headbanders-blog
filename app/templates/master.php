<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $title?> </title>
    <meta name="description" content="<?=$desc?>">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic,900,900italic|Trade+Winds|Raleway:400,100,100italic,200,200italic,300italic,300,400italic,500,500italic,600,600italic,700,700italic,800italic,800,900,900italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <?php if(isset($_SESSION['id'])){
    var_dump("you are Logged in as ".$_SESSION['id']);
    } else{
      var_dump("you are logged Out");
    } 
  ?>
    
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.html">Headbangers NZ</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="nav-ul" class="nav navbar-nav">
                <li class=""><a href="index.php?page=home">Home</a></li>
                <li class=""><a href="index.php?page=gallery">Gallery</a></li>
                <li class=""><a href="index.php?page=event">Events</a></li>
                <li class=""><a href="index.php?page=contact">Contact</a></li>
              </ul>

                <form class="navbar-form navbar-right" role="search">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="">
                  </div>

                  <button type="submit" class="btn btn-search">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                  </button>
                </form>

              <div id="dropdown" class="dropdown">
                <a href="#" class="dropdown-toggle " data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">                  
                  <li>                    
                      <form class="login col-lg-12" action="index.php?page=sign-in" method="post">
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
                    
                        <div class="checkbox">
                          <label><input type="checkbox"> Remember me</label>
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
                    
                  </li>
                  <li><a href="index.php?page=account">Account</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="index.php?page=sign-out">Sign out</a></li>                
                </ul>
              </div>                 
            </div>
          </div>
        </nav>
      </div>
    </div>

    <?php echo $this->section('content') ?> 

          <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div>
       
      

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>