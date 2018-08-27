
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
	                              $sql = $link->prepare("SELECT * FROM rppi_penelitian WHERE id_rppi_penelitian = '$get_id' ");
	                              $sql->execute();
	                              $data = $sql->fetch(PDO::FETCH_OBJ);
	                              if (isset($_POST['submit'])) {
	                              		$nama_rppi = $_POST['nama_rppi'];

	                              		$sql = $link->prepare("UPDATE rppi_penelitian SET nama_rppi_penelitian = ? WHERE id_rppi_penelitian = '$get_id' ");
	                              		$sql->bindParam(1, $nama_rppi);
	                              		if ($sql->execute()) {
	                              			echo $boots->alert_css('success', 'Data berhasil disimpan');
	                              		}else{
	                              			echo $boots->alert_css('danger', 'Error system oncurred');
	                              		}

	                              }

	                               ?>

	                                  <div class="form-group">
	                                      <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Nama RPPI</label>
	                                      <div class="col-lg-10">
	                                          <input type="text" class="form-control" name="nama_rppi" value="<?php echo $data->nama_rppi_penelitian; ?>" autofocus required>
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