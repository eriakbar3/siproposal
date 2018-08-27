<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                   <?php echo $title; ?>
                   <span class="tools pull-right">
                      <a href="javascript:;" class="fa fa-chevron-down"></a>
                   </span>
                </header>
                <div class="panel-body">
                  <div class="adv-table">
                   
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                      <thead>
                      <tr>
                          <th>Kepakaran</th>
                          <th>Nama</th>
                          <th>Nama Instansi</th>
                          <th>Alamat</th>
                          <th>No. Telp</th>
                          <th>Email</th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php
                      $no = 1;
                      $sql = $link->prepare("SELECT * FROM user u, reviewer r  WHERE u.id_user = r.id_user AND level = 'reviewer' ORDER BY tgl_daftar ASC ");
                      $sql->execute();
                      while ($data = $sql->fetch(PDO::FETCH_OBJ)) {
                        $get_id_kepakaran = $data->id_kepakaran;
                        $sql_kepakaran = $link->prepare("SELECT * FROM kepakaran WHERE id_kepakaran = '$get_id_kepakaran' ");
                        $sql_kepakaran->execute();
                        $data_kepakaran = $sql_kepakaran->fetch(PDO::FETCH_OBJ);
                      	 ?>
                      	<tr class="gradeX">
                            <td><?php echo $data_kepakaran->nama_kepakaran ?></td>
                            <td><?php echo $data->nama; ?></td>
                            <td><?php echo $data->nama_instansi; ?></td>
                            <td><?php echo $data->alamat; ?></td>
                            <td><?php echo $data->no_telp; ?></td>
                            <td><?php echo $data->email; ?></td>


                        </tr>
                      	 <?php
                      	 $no++;
                      }

                       ?>


                      </tbody>


                    </table>
                  </div>
                </div>
                </section>
              </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
