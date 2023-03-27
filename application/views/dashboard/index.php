<nav class="navbar navbar-light bg-light shadow">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?php echo base_url(); ?>img/rangsit.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
      เทศบาลนครรังสิต
    </a>
    <a href="https://www.e-service.rangsit.org/e-notify/admin" button type="button" class="btn btn-danger btn-sm position-relative col-md-1 col-1">
      เข้าสู่ระบบแอดมิน </a>
  </div>
</nav>

<div class="container-fluid">


  <div class="row">&nbsp;</div>

 <!-- <div class="row">
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-header">
          ข้อมูล สถิติ
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <button type="button" class="btn btn-secondary position-relative col-md-12 col-12">
                ยังไม่รับเรื่อง
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo $this->Dashboard_Model->get_status_I();?>
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </div>
            <div class="col-md-6">
              <button type="button" class="text-white btn btn-info position-relative col-md-12 col-12">
                กำลังดำเนินการ
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo $this->Dashboard_Model->get_status_O();?>
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
                <?php echo $this->Dashboard_Model->get_status_E();?>
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
                <?php echo $this->Dashboard_Model->get_status_All();?>
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </div>
          </div>
          <div class="row mt-3"> 
            <div class="col-md-12">
            <a href="https://www.e-service.rangsit.org/e-notify/admin" button type="button" class="btn btn-danger btn-lg position-relative col-md-12 col-12">
                เข้าสู่ระบบแอดมิน </a>
              </button>
            </div>
          </div>
        </div> 
        <div class="card-footer text-muted">
          เทศบาลนครรังสิต | Rangsit City Municipality.
        </div>
      </div>
    </div>-->

    <div class="col-md-12">
      <div class="card text-center">
        <div class="card-header">
          แบบฟอร์มร้องเรียน ร้องทุกข์
        </div>
        <div class="card-body">        
          <div class="table-responsive">
            <table id="tables" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>ประเภท</th>
                  <th>สถานะ</th>
                  <th>รายละเอียด</th>
                  <!--<th>ภาพประกอบ</th>-->
                  <th>ความเห็นเจ้าหน้าที่</th>
                  <th>ผลการดำเนินการ</th>
                  <th>วันที่ดำเนินการ</th>
                </tr>
              </thead>                          
              <?php
                foreach($result as $results){
              ?>
                <tr>
                  <td align="left"> <?php echo $results->id; ?></td>   
                  <td align="left">
                    <?php if ($results->type == '1') { 
                      echo "ถนน/ทางเท้า";
                     }elseif ($results->type == '2') { 
                      echo "ไฟฟ้า/แสงสว่าง";
                     }elseif ($results->type == '3') { 
                      echo "ประปา";
                     }elseif ($results->type == '4') { 
                      echo "สิ่งปฏิกูล";
                     }elseif ($results->type == '5') { 
                      echo "น้ำเสีย";
                     }elseif ($results->type == '6') { 
                      echo "กลิ่น";
                     }elseif ($results->type == '7') { 
                      echo "อาคาร";
                     }elseif ($results->type == '8') { 
                      echo "เสียง";
                     }elseif ($results->type == '9') { 
                      echo "กลิ่น";
                     }elseif ($results->type == '10') { 
                      echo "อาคาร";
                     }elseif ($results->type == '11') { 
                      echo "เสียง";
                     }elseif ($results->type == '12') { 
                      echo "สัตว์";
                     }elseif ($results->type == '13') { 
                      echo "ตัดต้นไม้";
                     }elseif ($results->type == '16') { 
                      echo "ทะเบียนราษฎร,บัตร";
                     }elseif ($results->type == '17') { 
                      echo "ภาษี/ค่าธรรมเนียมต่างๆ";
                     }elseif ($results->type == '18') { 
                      echo "ท่อระบายน้ำ/ฝาท่อชำรุด";
                     }elseif ($results->type == '19') { 
                      echo "เสียงตามสาย/เสียงไร้สาย";
                     }elseif ($results->type == '20') { 
                      echo "เบี้ยยังชีพ";
                     }else { 
                      echo "อื่นๆ";
                     }
                     ?>
                  </td>
                  <td align="left">

                    <?php if ($results->status == 'I') { ?>
                      <span class="badge bg-secondary">รอรับเรื่อง</span>                     
                    <?php }elseif ($results->status == 'O') { ?>
                      <span class="badge bg-info">กำลังดำเนินการ</span>
                    <?php } else { ?>
                      <span class="badge bg-success">เสร็จสิ้น</span>
                    <?php }
                     ?>
                  
                  </td>
                  <td align="left"><?php echo  mb_substr(strip_tags($results->detail), 0, 150, 'UTF-8') . ' ...'; ?>
                  <!--<td align="center"><img width="150" src="<?php echo base_url().'upload/'.$results->fileupload1;?>"></td>-->
                  <td align="left"><?php echo $results->staffdetail; ?></td>
                  <td align="center"><img width="150" src="<?php echo base_url().'upload/'.$results->staffpic;?>"></td> 
                  <td align="left"><?php echo $results->dateadd; ?></td>
                  
                </tr>
              <?php 
                }
              ?>
            </table>
          </div>
        </div>
        <div class="card-footer text-muted">
          เทศบาลนครรังสิต | Rangsit City Municipality.
        </div>
      </div>
    </div>
  </div>


</div>














  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
    var table = $('#tables').DataTable( {  
      responsive: true,   
      autoWidth: false,     
      "oLanguage": {
        "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
        "sZeroRecords": "ไม่พบข้อมูลที่ค้นหา",
        "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
        "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
        "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
        "sSearch": "ค้นหา :",
        "aaSorting" :[[0,'desc']],
        "oPaginate": {
        "sFirst":    "หน้าแรก",
        "sPrevious": "ก่อนหน้า",
        "sNext":     "ถัดไป",
        "sLast":     "หน้าสุดท้าย"
        },
      },    
    } ); 
    } );
</script>







         
