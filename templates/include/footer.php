<?php

    $resultcontact = $bdd -> query("SELECT * FROM contact WHERE id_contact = 1") -> fetch();

 ?>

<footer class="padtop10 bgBeige">

      <div class="flex jaround">
        <div>Mes réseaux : </div>
        <div><a href='<?php echo $resultcontact["linkedin"]; ?>' class="fontBlack lineheight15 maj">GitHub</a></div>
        <div><a href=' <?php echo $resultcontact["github"]; ?>' class="fontBlack lineheight15 maj">LinkedIn</a></div>
      </div>

      <div class="tcenter padtop10">
        <p>© <?php echo date("Y"); ?> - Made with ❤ by <?php echo $mon_nom ?> - CC BY-NC</p>
      </div>

</footer>
