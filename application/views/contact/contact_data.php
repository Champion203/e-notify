
        <!-- Main content -->
        <section class="content">
          
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title" style="font-family: 'Prompt', sans-serif;">การจัดการหน่วยงาน</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">

              <a href="<?php echo base_url()?>index.php/paperout/add_paperout_form" class="btn btn-info">เพิ่มหน่วยงาน</a>
              	<table class="table table-bordered" style="margin-top:10px">
					<tr class="active">
						<th>หน่วยงาน</th>
						<th>ที่อยู่</th>
						<th width="10%">แก้ไข</th>
						<th width="10%">ลบ</th>
						<th width="10%">พิมพ์</th>
					</tr>
					<?php
						foreach($result as $r){
							echo "<tr>";
								echo "<td>".$r->dp_name."</td>";
								
								echo "<td>".$r->dp_add."</td>";
								
								echo "<td><a href='".base_url()."paperout/edit_paperout_form/".$r->dp_id."' class='btn btn-warning'>แก้ไข</a></td>";
								
								echo "<td><a href='".base_url()."paperout/delete_paperout/".$r->dp_id."' onclick='return confirm(\"Confirm Delete Item\")' class='btn btn-danger'>ลบ</a></td>";

								echo "<td><a href='".base_url()."paperout/paperout_report/".$r->dp_id."' class='btn btn-success'>พิมพ์</a></td>";


								
							echo "</tr>";
						}
					?>
				</table>

				<select class="form-control">
            		<?php 
		           		foreach($result as $row)
            				{ 
            		  			echo '<option value="'.$row->dp_id.'">'.$row->dp_name.'</option>';		
            				}
            		?>
            	</select>



            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->





