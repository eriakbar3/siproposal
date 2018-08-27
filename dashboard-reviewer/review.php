
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
                                  mysql_select_db("siproposal",mysql_connect("localhost", "root", ""));
                                  $sql = mysql_query('SELECT * FROM proposal ORDER BY id_proposal DESC LIMIT 1');
                                  $sql1 = mysql_fetch_assoc($sql);
                                  if ($sql1['id_proposal'] == null) {
                                    // code...
                                    $id = '1';
                                  }else {
                                    $id = substr($sql1['id_proposal'],7)+1;
                                  }
                                  $kode = 'PRO'.date('Y').$id;
                                  echo $kode;
	                              		$nama_pelaksana_data 	= $_POST['nama_pelaksana_data'];
	                              		$judul_proposal 		= $_POST['judul_proposal'];
                                    $jenis_kegiatan = $_POST['jenis_kegiatan']; //jenis RPPI
                                    $kegiatan_baru = $_POST['kegiatan_baru'];
                                    $kegiatan_lanjutan = $_POST['kegiatan_lanjutan'];
                                    $usulan_biaya = $_POST['usulan_biaya'];

                                    if ($kegiatan_lanjutan = 'Y') {
                                      if (isset($_POST['tgl_mulai'])) {
                                        // code...
                                        $tgl_mulai = $_POST['tgl_mulai'];
                                        $tgl_selesai = $_POST['tgl_selesai'];
                                      }

                                    }else {
                                      $tgl_mulai = date('Y-m-d');
                                      $tgl_selesai = date('Y-m-d');
                                    }
                                    $usulan_biaya = $_POST['usulan_biaya'];
	                              		$ringkasan_proposal 	= $_POST['ringkasan_proposal'];
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
												$sql = $link->prepare("INSERT INTO proposal (
                                                          `id_proposal`,
                                                          `id_satker`,
                                                          `id_rppi_penelitian`,
                                                          `id_rppi_pengembangan`,
                                                          `nama_pelaksana_data`,
                                                          `judul_proposal`,
                                                          `jenis_rppi`,
                                                          `kegiatan_baru`,
                                                          `kegiatan_lanjutan`,
                                                          `tanggal_mulai`,
                                                          `tanggal_selesai`,
                                                          `ringkasan_proposal`,
                                                          `status_proposal`,
                                                          `status_penugasan`,
                                                          `usulan_biaya`,
                                                          `status`,
                                                          `tgl_submit`
                                                        ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
	                              							");
                                              $sql->bindParam(1, $kode);
			                              		$sql->bindParam(2, $id_satker);
			                              		$sql->bindParam(3, $id_rppi_penelitian);
			                              		$sql->bindParam(4, $id_rppi_pengembangan);
			                              		$sql->bindParam(5, $nama_pelaksana_data);
			                              		$sql->bindParam(6, $judul_proposal);
			                              		$sql->bindParam(7, $jenis_kegiatan);
                                        $sql->bindParam(8, $kegiatan_baru);
                                        $sql->bindParam(9, $kegiatan_lanjutan);
                                        $sql->bindParam(10, $tgl_mulai);
                                        $sql->bindParam(11, $tgl_selesai);
			                              		$sql->bindParam(12, $ringkasan_proposal);
			                              		$sql->bindParam(13, $status_proposal);
			                              		$sql->bindParam(14, $status_penugasan);
                                        $sql->bindParam(15, $usulan_biaya);
			                              		$sql->bindParam(16, $status);
                                        $sql->bindParam(17, $tgl_submit);
			                              		if ($sql->execute()) {
			                              			$get_last_id = $link->lastInsertId();
			                              			$file 		 = "file";
			                              			$file_name   = $_FILES[$file]['name'];
											        $tmpfile_ext = explode('.', $file_name);
											        $file_ext    = end($tmpfile_ext);
											        $new_name 	 = "Proposal_Penelitian_".date('Y-m-d').$kode;
			                              			$dir 		 = "../file";

			                              			$general->upload_doc_docx($new_name,$file,$dir);

			                              			$new_name_db = $new_name.'.'.$file_ext;

			                              			$sql_file = $link->prepare("INSERT INTO file_proposal (id_proposal, file) VALUES (?,?) ");
			                              			$sql_file->bindParam(1, $kode);
			                              			$sql_file->bindParam(2, $new_name_db);
			                              			if ($sql_file->execute()) {
			                              				echo $boots->alert_css('success', 'Proposal Berhasil di Ajukan dengan ID '.$kode);
			                              			}else{
			                              				echo $boots->alert_css('danger', 'Error system oncurred');
			                              			}
			                              		}else{
			                              			echo $boots->alert_css('danger', 'Error system oncurred');
			                              		}
								            }else{
								            	echo $boots->alert_css('danger', 'File size nto big');
								            }

								        }else{
								        	echo $boots->alert_css('danger', 'File extention not allowed');
								        }
	                              }
	                               ?>
                                 <div class="form-group">
                                     <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">ID Proposal</label>
                                     <div class="col-lg-10">
                                         <input type="text" name="id_proposal" class="form-control" required>
                                     </div>
                                 </div>

                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Penilaian Proposal</label>
                                        <div class="col-lg-10">
                                            <textarea class="" name="ringkasan_proposal" rows="10" id="editor"></textarea>
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
