<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0-rc.1/dist/chartjs-plugin-datalabels.min.js" integrity="sha256-Oq8QGQ+hs3Sw1AeP0WhZB7nkjx6F1LxsX6dCAsyAiA4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript">
      $(document).ready(function(){
        $("#myModal").modal('show');
      });
    </script>

<nav class="navbar navbar-light bg-light shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?php echo base_url(); ?>img/rangsit.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      เทศบาลนครรังสิต
    </a>
  </div>
</nav>

<div class="container">

<div class="row">&nbsp;</div>

<div class="row">
  <div class="col-md-12">
    <?php if($this->session->flashdata('msg')): ?>

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo $this->session->flashdata('msg'); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    <?php endif; ?>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card text-center">
      <div class="card-header">
      แบบฟอร์มร้องเรียน ร้องทุกข์
      </div>
      <div class="card-body">
        <form enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>contact/save_contact">
          <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label for="inputprefix">คำนำหน้า</label>
                  <select class="form-select" id="prefix" name="prefix" required="required">
                    <option value="">--เลือก--</option>
                    <option value="นาย">นาย</option>
                    <option value="นาง">นาง</option>
                    <option value="นางสาว">นางสาว</option>
                    <option value="คุณ">คุณ</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="inputfname">ชื่อจริง</label>
                  <input type="text" class="form-control" id="fname" name="fname" aria-describedby="fname" maxlength="100" required>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="inputlname">นามสกุล</label>
                  <input type="text" class="form-control" id="lname" name="lname" aria-describedby="lname" maxlength="100" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="inputtel">หมายเลขโทรศัพท์ติดต่อ</label>
                  <input type="text" class="form-control" id="tel" name="tel" aria-describedby="tel" maxlength="10" required>
                </div>
              </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="inputidcard">หมายเลขบัตรประจำตัวประชาชน</label>
                  <input type="text" class="form-control" id="idcard" name="idcard" aria-describedby="idcard" maxlength="13" required>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                  <label for="inputaddress">ที่อยู่ : สถานที่ติดต่อ</label>
                  <input type="text" class="form-control" id="address" name="address" aria-describedby="address" maxlength="350" required>
                </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="inputprefix">ประเภทเรื่องร้องเรียน</label>
                  <select class="form-select" id="type" name="type" required>
                  <option value="">--เลือก--</option>
                    <option value="1">ถนน/ทางเท้า</option>
                    <option value="2">ไฟฟ้า/แสงสว่าง</option>
                    <option value="3">ประปา</option>
                    <option value="4">สิ่งปฏิกูล/ขยะ</option>
                    <option value="5">น้ำเสีย</option>
                    <option value="6">กลิ่น</option>
                    <option value="7">อาคาร</option>
                    <option value="8">เสียง</option>
                    <option value="9">สัตว์(สุนัข,แมว ฯลฯ)</option>
                    <option value="10">ตัดต้นไม้</option>
                    <option value="16">ทะเบียนราษฎร,บัตร</option>
                    <option value="17">ภาษี/ค่าธรรมเนียมต่างๆ</option>
                    <option value="18">ท่อระบายน้ำ/ฝาท่อชำรุด</option>
                    <option value="19">เสียงตามสาย/เสียงไร้สาย</option>
                    <option value="20">เบี้ยยังชีพ</option>
                    <option value="11">อื่นๆ</option>
                  </select>
                </div>
            </div>
            <div class="col-md-8">
              <div class="form-group">
                <label for="inputprefix">รายละเอียดเรื่องร้องเรียนร้องทุกข์ <font color="#FF0000">**โปรดระบุสถานที่ดำเนินการให้ชัดเจน**</h3></font></label>
                <textarea class="form-control" id="detail" name="detail" rows="5"></textarea>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="inputprefix">ไฟล์แนบ **กรุณาเเนบรูปภาพมิเช่นนั้นแบบฟอร์มจะไม่ถูกส่ง**</label>
                  <input class="form-control" type="file" id="fileupload1" name="fileupload1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="status" name="status" value="I">
                </div>
            </div>
          </div>
          <br>
          <br>
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary col-md-8" >ส่งข้อมูล</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <a href="https://www.e-service.rangsit.org/e-notify/dashboard" button type="submit" class="btn btn-success col-md-8" >ตรวจสอบสถานะ</button> </a>
                </div>
            </div>
          </div>
          <br>
          <br>
        </form>


      </div>
      <div class="card-footer text-muted">
        เทศบาลนครรังสิต | Rangsit City Municipality.
      </div>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel"></h4>
        <h6> แบบสอบถาม เรื่อง ความสำเร็จของการร้องทุกข์ด้วยแอพพลิเคชั่นของเทศบาลนครรังสิต จังหวัดปทุมธานี </h6>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="col-md-12"> 
            <center>
              <img src="img/e-otifyQR.PNG" class="img-fluid">
            </center>
          </div>
      <div class="modal-footer">
      <a class="btn btn-info" href="https://forms.gle/kr3iq4xdNihJnhmj7">ทำแบบสอบถาม</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->








         
