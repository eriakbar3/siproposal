
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <!-- page start-->

              <!--Summernote start-->
              <div class="row">
                  <div class="col-md-12">
                      <section class="panel">
                          <header class="panel-heading head-border">
                              <b><?php echo $title; ?></b>
                          </header>
	                      <section class="panel">
	                          <div class="panel-body">
	                              <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>"  role="form" >

	                              <?php
	                              if (isset($_POST['submit'])) {


	                              		$judul_proposal 		= $_POST['judul_proposal'];
                                    $jenis_kegiatan = $_POST['jenis_kegiatan']; //jenis RPPI
                                    $id_proposal = $_GET['id'];
	                              		$rppi 	= $_POST['rppi'];
                                    if ($jenis_kegiatan == '1') {
                                      // code...
                                      $id_rppi_penelitian = $rppi;
                                      $id_rppi_pengembangan = '0';
                                    }else {
                                      $id_rppi_penelitian = '0';
                                      $id_rppi_pengembangan = $rppi;
                                    }
	                              		$id_satker 				= $satker->id_satker;
	                              		$status_proposal 		= "process";
	                              		$status_penugasan		= "0";
	                              		$status 				= "0";
	                              		$tgl_submit 			= $tgl_time_db_now;

	                              		$allowed_ext        = array('doc','docx');
            								        $file_name          = $_FILES['file']['name'];
            								        $tmpfile_ext        = explode('.', $file_name);
            								        $file_ext           = end($tmpfile_ext);
            								        $file_size          = $_FILES['file']['size'];

										if (in_array($file_ext, $allowed_ext) === true ) {
											if ($file_size < 20000000) {
												$sql = $link->prepare("UPDATE proposal SET
                          `judul_proposal`=?,
                          `jenis_rppi`=?,
                          `id_rppi_penelitian` = ?,
                          `id_rppi_pengembangan` = ?
                          WHERE id_proposal = '$id_proposal'
                        ");
                        $sql->bindParam(1, $judul_proposal);
                    		$sql->bindParam(2, $jenis_kegiatan);
                    		$sql->bindParam(3, $id_rppi_penelitian);
                    		$sql->bindParam(4, $id_rppi_pengembangan);
			                              		if ($sql->execute()) {
			                              			$get_last_id = $link->lastInsertId();
			                              			$file 		 = "file";
			                              			$file_name   = $_FILES[$file]['name'];
											        $tmpfile_ext = explode('.', $file_name);
											        $file_ext    = end($tmpfile_ext);
											        $new_name 	 = "Proposal_Penelitian_".date('Y-m-d').'_'.$id_proposal;

			                              			$dir 		 = "../file";

			                              			$general->upload_doc_docx($new_name,$file,$dir);

			                              			$new_name_db = $new_name.'.'.$file_ext;

			                              			$sql_file = $link->prepare("UPDATE file_proposal SET file=? WHERE id_proposal='$id_proposal' ");
			                              			$sql_file->bindParam(1, $new_name_db);

			                              			if ($sql_file->execute()) {
			                              				echo $boots->alert_css('success', 'Proposal Berhasil di Perbaiki dengan ID '.$id_proposal);
			                              			}else{
			                              				echo $boots->alert_css('danger', 'Error system oncurred');
			                              			}
			                              		}else{
			                              			echo $boots->alert_css('danger', 'BACOT');
			                              		}
								            }else{
								            	echo $boots->alert_css('danger', 'File size nto big');
								            }

								        }else{
								        	echo $boots->alert_css('danger', 'File extention not allowed');
								        }
	                              }
	                               ?>
                                 <?php
                                  $id_proposal = $_GET['id'];
                                  $sql = $link->prepare("SELECT * FROM proposal
                                   INNER JOIN satker ON satker.id_satker=proposal.id_satker
                                   INNER JOIN file_proposal ON proposal.id_proposal = file_proposal.id_proposal
                                   WHERE proposal.id_satker=$satker->id_satker  AND proposal.id_proposal='$id_proposal'");
                                 $sql->execute();
                                 $data = $sql->fetch(PDO::FETCH_OBJ);
                                 ?>
	                                  <div class="form-group"  >
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama Satker</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" value="<?php echo $satker->nama; ?>" disabled>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">ID Proposal</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" name="nama_pelaksana_data" class="form-control" value="<?php echo $id_proposal ?>" disabled>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Judul Proposal</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" name="judul_proposal" class="form-control" value="<?php echo $data->judul_proposal ?>" required>
	                                      </div>
	                                  </div>


                                    <div class="form-group">
                                      <label for="" class="col-lg-2 col-sm-2 control-label">Jenis Kegiatan</label>
                                      <div class="col-lg-10">
                                        <select class="form-control" name="jenis_kegiatan" id="jk">
                                          <option value="">--Kegiatan--</option>
                                          <option value="1">Penelitian</option>
                                          <option value="2">Pengembangan</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label" >RPPI</label>
	                                      <div class="col-lg-10">
	                                          <select class="form-control" name="rppi" id="rppi">
	                                          </select>
	                                      </div>
	                                  </div>
	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Upload File Proposal</label>
	                                      <div class="col-lg-10">
	                                          <input type="file" name="file" class="form-control" required>
	                                          <p class="help-block">Ekstensi: *.DOC *.DOCX (MAX Size: 20 MB)</p>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <div class="col-lg-offset-2 col-lg-10">
	                                          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
	                                      </div>
	                                  </div>
	                              </form>
	                          </div>
	                      </section>
                      </section>
                  </div>
              </div>
              <!--Summernote end-->

          <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <script src="//cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
      <script type="text/javascript">
        CKEDITOR.replace( 'editor' );
      </script>
      <script type="text/javascript">
      $(document).ready(function(){
        $('#jk').change(function(){
          var optVal= $("#jk option:selected").val();

          if (optVal ==1) {
            $('#rppi').empty()
            $('#rppi')
              .append("<option>--pilih rppi penelitian--</option>");
            <?php
            $sql_rppi_penelitian = $link->prepare("SELECT * FROM rppi_penelitian ORDER BY nama_rppi_penelitian ");
            $sql_rppi_penelitian->execute();
            while ($data_rppi_penelitian = $sql_rppi_penelitian->fetch(PDO::FETCH_OBJ)) {

              ?>
              var valid = "<?php echo $data_rppi_penelitian->id_rppi_penelitian; ?>" ;
              var nama = "<?php echo $data_rppi_penelitian->nama_rppi_penelitian; ?>" ;
              $('#rppi')
                .append($("<option></option>")
                      .attr("value",valid)
                      .text(nama));
              <?php
            }
             ?>

          }else{
            $('#rppi').empty()
            $('#rppi')
              .append("<option>--pilih rppi pengembangan--</option>");
            <?php
            $sql_rppi_pengembangan = $link->prepare("SELECT * FROM rppi_pengembangan ORDER BY nama_rppi_pengembangan ");
            $sql_rppi_pengembangan->execute();
            while ($data_rppi_pengembangan = $sql_rppi_pengembangan->fetch(PDO::FETCH_OBJ)) {

              ?>
              var valid = "<?php echo $data_rppi_pengembangan->id_rppi_pengembangan; ?>" ;
              var nama = "<?php echo $data_rppi_pengembangan->nama_rppi_pengembangan; ?>" ;
              $('#rppi')
                .append($("<option></option>")
                      .attr("value",valid)
                      .text(nama));
              <?php
            }

             ?>
          }

        });
    });
    $('#lanjutan').click(function(){
      $('#l').empty()
      $('#l').append("<label class='col-lg-2 col-sm-2 control-label'>Tanggal Mulai</label>");
      $('#l').append("<div class='col-lg-10'><input type='date' name='tgl_mulai' class='form-control' style='width:50%'></div>");
      $('#l').append("<label class='col-lg-2 col-sm-2 control-label'>Tanggal Selesai</label>");
      $('#l').append("<div class='col-lg-10'><input type='date' name='tgl_selesai' class='form-control' style='width:50%'></div>");
    });
    $('#lt').click(function(){
      $('#l').empty()
    });
      </script>
