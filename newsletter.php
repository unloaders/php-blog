<?php
  include('includes/head.php');
?>
  <body>
    <div class="container">

      <div class="content">
      
        <div class="page-header well">
          <h1>Mon Blog <small>Pour m'initier à PHP</small></h1>
          <?php
            if(isset($_GET['dc']) && $_GET['dc'] == true)
            {
              setcookie("sid",'',time()-1);
              header('Location: index.php');
            }
            if(isset($email_util))
            {
              echo'<p>Bonjour '.$email_util.' !';
            }
          ?>

        </div>
        <div id="div1">
      
        </div>
        <div class="row"> 
          <div class="span8">
            <p>Email : <input type="email" name="email" id="email" /></p>
            <input type="button" id="button" value="OK">
          </form> 
          </div>  
            <?php
				include('includes/menu.php');
			?>
        </div>
        
      </div>
      <?php
        include('includes/footer.php');
      ?>

    </div>

  </body>
</html>

