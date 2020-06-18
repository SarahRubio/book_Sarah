<?php
  include "config.php";
  include $_dossier_template . "include/head.php";
?>

  <body class="bgBeige">

    <div class="bgWhite marg10">

      <?php include $_dossier_template . "include/header.php"; ?>

      <div class="container">
        <?php include $_dossier_template . "include/navigation.php"; ?>
      </div>

      <main class="padtopbot10 paddinglr10">
        <h2 class="font2 padbot3 tcenter maj margbot5">Me contacter</h2>

          <div class="flex column aicenter jaround">
            <?php
              $resultContact = $bdd -> query("SELECT * FROM contact WHERE id_contact = 1") -> Fetch();
              echo "<p class='fontDarkgrey lineheight15 padbot3'>Tél : $resultContact[tel]</p>";
              echo "<p class='fontDarkgrey lineheight15 padbot3'>Email : $resultContact[email]</p>";
              echo "<p class='padbot3'><a href='$resultContact[linkedin]' class='fontDarkgrey lineheight15'>LinkedIn</a></p>";
              echo "<p class='padbot3'><a href='$resultContact[github]' class='fontDarkgrey lineheight15'>GitHub</a></p>";
             ?>
          </div>

      </main>

      <?php include $_dossier_template . "include/footer.php"; ?>

    </div>


  </body>
</html>
