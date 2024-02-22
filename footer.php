<footer class="py-4 bg-light mt-auto">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
      <div class="text-muted">Copyright &copy; <?php echo $_SESSION["empresa"]; ?></div>
      <div class="logo">
        <?php if ($_SESSION["logo"] != "") { ?>
          <img src="./images/<?php echo $_SESSION["logo"]; ?>">
        <?php } ?>
      </div>
    </div>
  </div>
</footer>