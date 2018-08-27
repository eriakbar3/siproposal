
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
	                              $get_id = $_GET['id'];
	                              $sql = $link->prepare("SELECT * FROM user u, reviewer r WHERE u.id_user = r.id_user AND u.id_user = '$get_id' AND r.id_user = '$get_id' ");
	                              $sql->execute();
	                              $data = $sql->fetch(PDO::FETCH_OBJ);
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

	                              		if (!empty($_POST['password'])) {
	                              			$val_password = $password;
	                              		}else{
	                              			$val_password = $data->password;
	                              		}

	                              		if (($username <> $data->username)) {
	                              			$cek_username = $link->prepare("SELECT username FROM user WHERE username = '$username' ");
	                              			$cek_username->execute();
	                              			$result_username = $cek_username->rowCount();
	                              		}else{
	                              			$result_username = 0;
	                              		}

	                              		if ($email <> $data->email) {
	                              			$cek_email = $link->prepare("SELECT email FROM reviewer WHERE email = '$email' ");
	                              			$cek_email->execute();
	                              			$result_email = $cek_email->rowCount();
	                              		}else{
	                              			$result_email = 0;
	                              		}

	                              		if (($no_telp <> $data->no_telp)) {
	                              			$cek_no_telp = $link->prepare("SELECT no_telp FROM reviewer WHERE no_telp = '$no_telp' ");
	                              			$cek_no_telp->execute();
	                              			$result_no_telp = $cek_no_telp->rowCount();
	                              		}else{
	                              			$result_no_telp = 0;
	                              		}

	                              		if ($result_email > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, Email telah terdaftar!");
	                              		}elseif ($result_username > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, Username telah terdaftar!");
	                              		}elseif ($result_no_telp > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, No. Telp telah terdaftar!");
	                              		}else{
	                              			$sql = $link->prepare("UPDATE user SET username = ?, password = ? WHERE id_user = '$get_id' ");
	                              			$sql_reviewer = $link->prepare("UPDATE reviewer SET id_kepakaran = ?, nama = ?, nama_instansi = ?, alamat = ?, no_telp = ?, email = ? WHERE id_user = '$get_id' ");
		                              		$sql->bindParam(1, $username);
		                              		$sql->bindParam(2, $val_password);
	                              			$sql_reviewer->bindParam(1, $id_kepakaran);
	                              			$sql_reviewer->bindParam(2, $nama);
	                              			$sql_reviewer->bindParam(3, $nama_instansi);
	                              			$sql_reviewer->bindParam(4, $alamat);
	                              			$sql_reviewer->bindParam(5, $no_telp);
	                              			$sql_reviewer->bindParam(6, $email);

		                              		if (($sql->execute()) && ($sql_reviewer->execute()) ) {
	                              				echo $boots->alert_css('success', 'Data berhasil disimpan');
	                              			}else{
	                              				echo $boots->alert_css('danger', 'Server failed or error oncurred');
	                              			}
		                              	}

	                              }

	                               ?>


	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="nama" value="<?php echo $data->nama ?>"  autofocus required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama Instansi</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="nama_instansi" value="<?php echo $data->nama_instansi ?>"  autofocus required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Alamat</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" value="<?php echo $data->alamat ?>"  name="alamat"  required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">No. Telp</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="no_telp" value="<?php echo $data->no_telp ?>"  required >
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
	                                      <div class="col-lg-10">
	                                          <input type="email" class="form-control" name="email" value="<?php echo $data->email ?>"  required >
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Kepakaran</label>
	                                      <div class="col-lg-10">
	                                         <select class="form-control" name="id_kepakaran" required>
	                                         	<?php 
	                                         	$sql_kepakaran = $link->prepare("SELECT * FROM kepakaran ORDER BY nama_kepakaran ASC ");
	                                         	$sql_kepakaran->execute();
	                                         	while ($data_kepakaran = $sql_kepakaran->fetch(PDO::FETCH_OBJ)) {
	                                         		?>
	                                         		<option <?php if($data->id_kepakaran == $data_kepakaran->id_kepakaran ){echo "selected";} ?> value="<?php echo $data_kepakaran->id_kepakaran; ?>"><?php echo $data_kepakaran->nama_kepakaran; ?></option>
	                                         		<?php
	                                         	}

	                                         	 ?>
	                                         </select>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Username</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" value="<?php echo $data->username ?>"  name="username"   required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Password</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="password"  >
	                                          <p class="help-block">*abaikan form jika tidak ingin mengganti password</p>
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