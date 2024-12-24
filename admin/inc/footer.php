
<script src="inc/sweetalert.min.js"></script>
    <?php 
      if (isset($_SESSION['status'])){ ?>
        <script>
          swal({
          title: "<?php echo $_SESSION['status'];?>",
          text: "You clicked the button!",
          icon: "<?php echo $_SESSION['status_code']?>",
          button: "Aww yiss!",
          });
       </script>
      <?php 
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
    } ?>