

<div class="container">
  <div class="row mt-5">&nbsp;</div>
  <div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-2">
      <center><img src="<?php echo base_url(); ?>img/rangsit.png" alt="" class="img-fluid col-md-8"></center>
    </div>
    <div class="col-md-5"></div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-5"></div>
    <div class="col-md-2">
      <center><h5>ระบบจัดการ เรื่องร้องเรียนร้องทุกข์ LINE OA</h5></center>
    </div>
    <div class="col-md-5"></div>
  </div>
  <hr>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <?php
        $success_msg= $this->session->flashdata('success_msg');
        $error_msg= $this->session->flashdata('error_msg');
          if($success_msg){
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong><?php echo $success_msg; ?></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
          }
          if($error_msg){
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $error_msg; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                            
          <?php
            }
          ?>
    </div>
    <div class="col-md-3"></div>
  </div>
  <!-- Form -->
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <form enctype="multipart/form-data" method="POST" action="<?php echo base_url('admin/home'); ?>" class="needs-validation" novalidate="">
        <div class="input-group mb-3">
          <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="user_A" id="user_A" required autofocus>
          <div class="valid-feedback">
            ป้อนข้อมูลเรียบร้อย.
          </div>
          <div class="invalid-feedback">
            กรุณาป้อนข้อมูล.
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" name="pass_A" id="pass_A" required>
          <div class="valid-feedback">
            ป้อนข้อมูลเรียบร้อย.
          </div>
          <div class="invalid-feedback">
            กรุณาป้อนข้อมูล.
          </div>
        </div>
        <div class="form-group text-center">
          <div class="col-xs-12 p-b-20">
            <button class="btn btn-block btn-lg btn-success" type="submit">เข้าสู่ระบบ</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>
                    
                    

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>adminbite-10/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>adminbite-10/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>adminbite-10/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?php echo base_url(); ?>adminbite-10/dist/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>adminbite-10/dist/js/app.init.js"></script>
    <script src="<?php echo base_url(); ?>adminbite-10/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>adminbite-10/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>adminbite-10/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>adminbite-10/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>adminbite-10/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>adminbite-10/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo base_url(); ?>adminbite-10/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url(); ?>adminbite-10/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="<?php echo base_url(); ?>adminbite-10/assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?php echo base_url(); ?>adminbite-10/assets/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="<?php echo base_url(); ?>adminbite-10/assets/libs/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>adminbite-10/assets/libs/morris.js/morris.min.js"></script>

    <script src="<?php echo base_url(); ?>adminbite-10/dist/js/pages/dashboards/dashboard1.js"></script>

    <script src="<?php echo base_url(); ?>adminbite-10/assets/libs/toastr/build/toastr.min.js"></script>
    <script src="<?php echo base_url(); ?>adminbite-10/assets/extra-libs/toastr/toastr-init.js"></script>


  </body>
</html>