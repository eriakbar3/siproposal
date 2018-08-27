
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
	                              <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" role="form">

	                              <?php 
	                              if (isset($_POST['submit'])) {
	                              		$nama	 			= $_POST['nama'];
	                              		$nama_instansi	 	= $_POST['nama_instansi'];
	                              		$alamat 			= $_POST['alamat'];
	                              		$no_telp 			= $_POST['no_telp'];
	                              		$email 				= $_POST['email'];
	                              		$username 			= $_POST['username'];
	                              		$password 			= md5($_POST['password']);
	                              		$id_kepakaran 		= $_POST['id_kepakaran'];
	                              		$level 				= "reviewer";
	                              		$status 			= '0';
	                              		$tgl_daftar 		= $tgl_time_db_now;

	                              		$cek_email = $link->prepare("SELECT email FROM reviewer WHERE email = '$email' ");
	                              		$cek_email->execute();
	                              		$cek_username = $link->prepare("SELECT username FROM user WHERE username = '$username' ");
	                              		$cek_username->execute();
	                              		$cek_no_telp = $link->prepare("SELECT no_telp FROM reviewer WHERE no_telp = '$no_telp' ");
	                              		$cek_no_telp->execute();

	                              		if ($cek_email->rowCount() > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, Email telah terdaftar!");
	                              		}elseif ($cek_username->rowCount() > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, Username telah terdaftar!");
	                              		}elseif ($cek_no_telp->rowCount() > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, No Telphone telah terdaftar!");
	                              		}else{
	                              			$sql = $link->prepare("INSERT INTO user (username,password,level,tgl_daftar) 
	                              												VALUES (?,?,?,?) ");
		                              		$sql->bindParam(1, $username);
		                              		$sql->bindParam(2, $password);
		                              		$sql->bindParam(3, $level);
		                              		$sql->bindParam(4, $tgl_daftar);

		                              		if ($sql->execute()) {
		                              			$get_last_id = $link->lastInsertId();
		                              			$sql_reviewer = $link->prepare("INSERT INTO reviewer (id_user,id_kepakaran,nama,nama_instansi,alamat,no_telp,email)
		                              				VALUES (?,?,?,?,?,?,?) ");
		                              			$sql_reviewer->bindParam(1, $get_last_id);
		                              			$sql_reviewer->bindParam(2, $id_kepakaran);
		                              			$sql_reviewer->bindParam(3, $nama);
		                              			$sql_reviewer->bindParam(4, $nama_instansi);
		                              			$sql_reviewer->bindParam(5, $alamat);
		                              			$sql_reviewer->bindParam(6, $no_telp);
		                              			$sql_reviewer->bindParam(7, $email);
		                              			if ($sql_reviewer->execute()) {
		                              				echo $boots->alert_css('success', 'Data berhasil disimpan');
		                              			}else{
		                              				echo $boots->alert_css('danger', 'Server failed or error oncurred');
		                              			}
		                              			
		                              		}
		                              	}

	                              }

	                               ?>

	                               	  

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="nama"  autofocus required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama Instansi</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="nama_instansi"  required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Alamat</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="alamat"  required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. Telp</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="no_telp" required >
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
	                                      <div class="col-lg-10">
	                                          <input type="email" class="form-control" name="email" required >
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Kepakaran</label>
	                                      <div class="col-lg-10">
	                                         <select class="form-control" name="id_kepakaran" required>
	                                         <option value="">--pilih kepakaran--</option>
	                                         	<?php 
	                                         	$sql_kepakaran = $link->prepare("SELECT * FROM kepakaran ORDER BY nama_kepakaran ASC ");
	                                         	$sql_kepakaran->execute();
	                                         	while ($data_kepakaran = $sql_kepakaran->fetch(PDO::FETCH_OBJ)) {
	                                         		?>
	                                         		<option value="<?php echo $data_kepakaran->id_kepakaran; ?>"><?php echo $data_kepakaran->nama_kepakaran; ?></option>
	                                         		<?php
	                                         	}

	                                         	 ?>
	                                         </select>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Username</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="username"   required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Password</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="password"  required >
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