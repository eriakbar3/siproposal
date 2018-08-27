
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
	                              		$nama 				= $_POST['nama'];
	                              		$nama_instansi	 	= $_POST['nama_instansi'];
	                              		$alamat 			= $_POST['alamat'];
	                              		$email 				= $_POST['email'];
	                              		$penanggung_jawab 	= $_POST['penanggung_jawab'];
	                              		$username 			= $_POST['username'];
	                              		$password 			= md5($_POST['password']);
	                              		$level 				= "satker";
	                              		$status 			= '0';
	                              		$tgl_daftar 		= $tgl_time_db_now;

	                              		$cek_email = $link->prepare("SELECT email FROM satker WHERE email = '$email' ");
	                              		$cek_email->execute();
	                              		$cek_username = $link->prepare("SELECT username FROM user WHERE username = '$username' ");
	                              		$cek_username->execute();

	                              		if ($cek_email->rowCount() > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, Email telah terdaftar!");
	                              		}elseif ($cek_username->rowCount() > 0 ) {
	                              			echo $boots->alert_css("danger", "PERINGATAN, Username telah terdaftar!");
	                              		}else{
	                              			$sql = $link->prepare("INSERT INTO user (username,password,level,tgl_daftar) 
	                              												VALUES (?,?,?,?) ");
		                              		$sql->bindParam(1, $username);
		                              		$sql->bindParam(2, $password);
		                              		$sql->bindParam(3, $level);
		                              		$sql->bindParam(4, $tgl_daftar);

		                              		if ($sql->execute()) {
		                              			$get_last_id = $link->lastInsertId();
		                              			$sql_satker = $link->prepare("INSERT INTO satker (id_user,nama,nama_instansi,alamat,email,penanggung_jawab)
		                              				VALUES (?,?,?,?,?,?) ");
		                              			$sql_satker->bindParam(1, $get_last_id);
		                              			$sql_satker->bindParam(2, $nama);
		                              			$sql_satker->bindParam(3, $nama_instansi);
		                              			$sql_satker->bindParam(4, $alamat);
		                              			$sql_satker->bindParam(5, $email);
		                              			$sql_satker->bindParam(6, $penanggung_jawab);
		                              			if ($sql_satker->execute()) {
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
	                                          <input type="text" class="form-control" name="nama_instansi"  autofocus required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Alamat</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="alamat"  required>
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Email</label>
	                                      <div class="col-lg-10">
	                                          <input type="email" class="form-control" name="email" required >
	                                      </div>
	                                  </div>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Penanggung Jawab</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="penanggung_jawab"  required >
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