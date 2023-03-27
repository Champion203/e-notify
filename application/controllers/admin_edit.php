<?php
$user_id=$this->session->userdata('user_A');

if(!$user_id){

  redirect('admin');
}

 ?>
<link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<?php
  foreach($result as $results){
?>
<div class="container-fluid">
  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          รายงานสรุป
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <button type="button" class="btn btn-secondary position-relative col-md-12 col-12">
                ยังไม่รับเรื่อง
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo $this->Admin_Model->get_status_I();?>
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </div>
            <div class="col-md-6">
              <button type="button" class="text-white btn btn-info position-relative col-md-12 col-12">
                กำลังดำเนินการ
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo $this->Admin_Model->get_status_O();?>
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </div>
          </div>
          <div class="row mt-3"> 
            <div class="col-md-12">
              <button type="button" class="btn btn-success position-relative col-md-12 col-12">
                เสร็จสิ้น
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo $this->Admin_Model->get_status_E();?>
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </div>
          </div>
          <div class="row mt-3"> 
            <div class="col-md-12">
              <button type="button" class="btn btn-primary btn-lg position-relative col-md-12 col-12">
                จำนวนเรื่องทั้งหมด
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo $this->Admin_Model->get_status_All();?>
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header bg-info text-white">
          รายละเอียดเรื่องร้องเรียน
        </div>
        <div class="card-body">
        

          <div class="row">            
            <div class="col-md-6">
              <?php if ($results->type == '1') { 
                      echo "<h4><strong><ion-icon name='walk-outline'></ion-icon> ถนน/ทางเท้า</strong></h4>";
                     }elseif ($results->type == '2') { 
                      echo "<h4><strong><ion-icon name='sunny-outline'></ion-icon> ไฟฟ้า/แสงสว่าง</strong></h4>";
                     }elseif ($results->type == '3') { 
                      echo "<h4><strong><ion-icon name='water-outline'></ion-icon> ประปา</strong></h4>";
                     }elseif ($results->type == '4') { 
                      echo "<h4><strong><ion-icon name='trash-outline'></ion-icon> สิ่งปฏิกูล</strong></h4>";
                     }elseif ($results->type == '5') { 
                      echo "<h4><strong><ion-icon name='fish-outline'></ion-icon> น้ำเสีย</strong></h4>";
                     }elseif ($results->type == '6') { 
                      echo "<h4><strong><ion-icon name='sad-outline'></ion-icon> กลิ่น</strong></h4>";
                     }elseif ($results->type == '7') { 
                      echo "<h4><strong><ion-icon name='sad-outline'></ion-icon> อาคาร</strong></h4>";
                     }elseif ($results->type == '8') { 
                      echo "<h4><strong><ion-icon name='volume-mute-outline'></ion-icon> เสียง</strong></h4>";
                     }elseif ($results->type == '9') { 
                      echo "<h4><strong><ion-icon name='paw-outline'></ion-icon> สัตว์</strong></h4>";
                     }elseif ($results->type == '10') { 
                      echo "<h4><strong><ion-icon name='leaf-outline'></ion-icon> ตัดต้นไม้</strong></h4>";
                     }else { 
                      echo "<h4><strong><ion-icon name='warning-outline'></ion-icon> อื่นๆ</strong></h4>";
                     }
                     ?>              
            </div>
            <div class="col-md-6">
              <?php if ($results->status == 'I') { ?>
                <h4 class="badge bg-secondary">รอรับเรื่อง</h4>                     
              <?php }elseif ($results->status == 'O') { ?>
                <h4 class="badge bg-info">กำลังดำเนินการ</h4>
              <?php } else { ?>
                <h4 class="badge bg-success">เสร็จสิ้น</h4>
              <?php }
              ?>
            </div>
          </div>
          <hr>
          <div class="row">            
            <div class="col-md-12">
              <h5><?php echo "ชื่อ: ",$results->fname," ",$results->lname; ?></h5>
              <h5><?php echo "โทรศัพท์: ",$results->tel; ?></h5>
              <?php if ($results->status == 'I') { ?>
                <h5> <?php echo "สถานะ รอรับเรื่อง เมื่อ: ,$results->dateadd;" ?></h5>                     
              <?php }elseif ($results->status == 'O') { ?>
                <h5> <?php echo "สถานะ กำลังดำเนินการ เมื่อ: ",$results->dateadd; ?></h5> 
              <?php } else { ?>
                <h5> <?php echo "สถานะ เสร็จสิ้น เมื่อ: ",$results->dateadd; ?></h5> 
              <?php }
              ?>
              <h5><?php echo $results->detail; ?></h5>
            </div>
          </div>
          <hr>
          <div class="row">            
            <div class="col-md-12">
              <?php if ($results->fileupload1 == '') { ?>
                <img src="<?php echo base_url(); ?>img/No-Image-Placeholder.svg" alt="" class="img-fluid img-thumbnail">
              <?php } else { ?>
                <img src="<?php echo base_url().'upload/'.$results->fileupload1;?>" class="img-fluid img-thumbnail">
              <?php }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card">
        <div class="card-header bg-primary text-white">
          ตอบกลับเรื่องร้องเรียน
        </div>
        <div class="card-body">
          <form enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>admin/admin_save_edit">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $results->id; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputprefix">รายละเอียดการตอบกลับ</label>
                  <textarea class="form-control" id="staffdetail" name="staffdetail" rows="5"><?php echo $results->staffdetail; ?></textarea>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputprefix">ไฟล์แนบ *กรุณาแนบรูปภาพมิเช่นนั้นสถานะจะไม่เปลี่ยน*</label>
                  <input class="form-control" type="file" id="staffpic" name="staffpic">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputprefix">สถานะ</label>
                  <select class="form-select" id="status" name="status" required>
                    <option value="">--เลือก--</option>
                    <option value="O">กำลังดำเนินการ</option>
                    <option value="E">เสร็จสิ้น</option>
                  </select>
                </div>
              </div>
            </div>
            <br>
          
          <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="inputrecipient">ผู้รับเรื่อง</label>
                  <select class="form-select" id="recipient" name="recipient" required>
                    <option value="">--เลือก--</option>
                    <option value="กองช่าง">กองช่าง</option>
                    <option value="สำนักปลัด">สำนักปลัด</option>
                    <option value="กองสาธารณะสุข">กองสาธารณะสุข</option>
                    <option value="งานป้องกัน">งานป้องกัน</option>
                    <option value="กองคลัง">กองคลัง</option>
                    <option value="กองยุทธศาสตร์">กองยุทธศาสตร์</option>
                    <option value="กองสวัสดิการสังคม">กองสวัสดิการสังคม</option>
                    <option value="อื่นๆ">อื่นๆ</option>
                  </select>
                </div>
              </div>
            </div>
            <br>
          <br>
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <center><button type="submit" class="btn btn-primary col-md-8" >ส่งข้อมูล</button></center>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <center><?php echo "<a href='".base_url()."admin/delete_data/".$results->id."' class='btn btn-danger col-md-8' title='ลบข้อมูล'><ion-icon name='trash-outline'></ion-icon> ลบคำร้อง</a>"; ?></center>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <center><?php echo "<input type='button' onclick='javascript:print()' class='btn btn-info col-md-8' value='พิมพ์'>";?></center>
                </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">&nbsp;</div>
  <div class="row">&nbsp;</div>
  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <center><button class="btn btn-lg btn-secondary col-md-8" onclick="goBack()">ย้อนกลับ</button></center>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<?php 
  }
?>

<script>
function goBack() {
  window.history.back();
}
</script>


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
