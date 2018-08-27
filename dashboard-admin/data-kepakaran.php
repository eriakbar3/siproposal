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
                  <a href="index.php?act=create-kepakaran" class="btn btn-primary">Create Kepakaran</a>
                  <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                      <thead>
                      <tr>
                          <th>Nama Kepakaran</th>
                          <th>act</th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php 
                      
                      $sql = $link->prepare("SELECT * FROM kepakaran ORDER BY nama_kepakaran ASC ");
                      $sql->execute();
                      $no = 1;
                      while ($data = $sql->fetch(PDO::FETCH_OBJ)) {
                      	 ?>
                      	<tr>
                            <td><?php echo $data->nama_kepakaran; ?></td>
                            <td>
                              <?php echo $boots->label_css_link('success', 'edit', "index.php?act=edit-kepakaran&id=$data->id_kepakaran"); ?>
                               <?php echo $boots->label_css_link_confirm('danger', 'delete', "delete-handler.php?type=delete-kepakaran&id=$data->id_kepakaran"); ?>
                              
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