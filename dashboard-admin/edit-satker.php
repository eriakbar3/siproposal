
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
	                              $sql = $link->prepare("SELECT * FROM user u, satker s WHERE u.id_user = s.id_user AND u.id_user = '$get_id' AND s.id_user = '$get_id' ");
	                              $sql->execute();
	                              $data = $sql->fetch(PDO::FETCH_OBJ);
	                              if (isset($_POST['submit'])) {
	                              		$nama	 			= $_POST['nama'];
	                              		$nama_instansi	 	= $_POST['nama_instansi'];
	                              		$alamat 			= $_POST['alamat'];
	                              		$email 				= $_POST['email'];
	                              		$penanggung_jawab 	= $_POST['penanggung_jawab'];
	                              		$username 			= $_POST['username'];
	                              		$password 			= md5($_POST['password']);
	                              		$level 				= "satker";
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
	                              			$cek_email = $link->prepare("SELECT email FROM satker WHERE email = '$email' ");
	                              			$cek_email->execute();
	                              			$result_email = $cek_email->rowCount();
	                              		}else{
	                              			$result_email = 0;
	                              		}

	                              		if ($result_email > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, Email telah terdaftar!");
	                              		}elseif ($result_username > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, Username telah terdaftar!");
	                              		}else{
	                              			$sql = $link->prepare("UPDATE user SET username = ?, password = ? WHERE id_user = '$get_id' ");
	                              			$sql_satker = $link->prepare("UPDATE satker SET nama = ?, nama_instansi = ?, alamat = ?, email = ?, penanggung_jawab = ? WHERE id_user = '$get_id' ");
		                              		$sql->bindParam(1, $username);
		                              		$sql->bindParam(2, $val_password);
		                              		$sql_satker->bindParam(1, $nama);
		                              		$sql_satker->bindParam(2, $nama_instansi);
		                              		$sql_satker->bindParam(3, $alamat);
		                              		$sql_satker->bindParam(4, $email);
		                              		$sql_satker->bindParam(5, $penanggung_jawab);

		                              		if (($sql->execute()) && ($sql_satker->execute()) ) {
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
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
	                                      <div class="col-lg-10">
	                                          <input type="email" class="form-control" name="email" value="<?php echo $data->email ?>"  required >
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Penanggung Jawab</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" value="<?php echo $data->penanggung_jawab ?>"  name="penanggung_jawab"  required >
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