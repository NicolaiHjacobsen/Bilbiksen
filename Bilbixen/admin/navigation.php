<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Bilbi<span style="color:#45ffe0">x</span>en</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
    <?php
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='1')
      {
        ?>
        <div class="btn-group">
          <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
            <?php echo $page_title=="Edit Profile" ? "class='active'" : ""; ?>>
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
            &nbsp;&nbsp;<span class="caret"></span>
        </a>
          </button>
        <div class="dropdown-menu dropdown-menu-right">
          <button class="dropdown-item" type="button"><a href="<?php echo $home_url; ?>logout.php">Logout</a></button>
          </div>
        </div>

        <?php
      }
    ?>

  </div>
</nav>