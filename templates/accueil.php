<?php include "include/head.php" ?>

  <body class="bgBeige">

    <div class="bgWhite marg10">

      <?php include "include/header.php" ?>

      <div class="container">
        <?php include $_dossier_template . "include/navigation.php"; ?>
      </div>

      <main class="padtopbot10 paddinglr10">

        <div class="flex jaround aicenter">

          <div class="">
            <h2 class="font2 padbot3 fontBeige tcenter "><?php echo returnValeur("titre")?></h2>
            <div class="tjustify lineheight15 padbot3">
              <?php echo returnValeur("texte")?>
            </div>
          </div>

          <img src="templates/images/accueil.jpg" alt="" height="300" class="margleft3">

        </div>
      </main>

      <?php include "include/footer.php" ?>

    </div>
  </body>
</html>
