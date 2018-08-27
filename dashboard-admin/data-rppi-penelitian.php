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
                  <a href="index.php?act=create-rppi-penelitian" class="btn btn-primary">Create RPPI Penelitian</a>
                  <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                      <thead>
                      <tr>
                          <th>Nama RPPI Penelitian</th>
                          <th>act</th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php 
                      
                      $sql = $link->prepare("SELECT * FROM rppi_penelitian ORDER BY nama_rppi_penelitian ASC ");
                      $sql->execute();
                      $no = 1;
                      while ($data = $sql->fetch(PDO::FETCH_OBJ)) {
                      	 ?>
                      	<tr>
                            <td><?php echo $data->nama_rppi_penelitian; ?></td>
                            <td>
                              <?php echo $boots->label_css_link('success', 'edit', "index.php?act=edit-rppi-penelitian&id=$data->id_rppi_penelitian"); ?>
                               <?php echo $boots->label_css_link_confirm('danger', 'delete', "delete-handler.php?type=delete-rppi-penelitian&id=$data->id_rppi_penelitian"); ?>
                              
                              </td>
                        </tr>
                      	 <?php
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