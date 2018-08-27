<style media="screen">
  .data-group{
      margin-top: 10px;
      float: left;
  }
  .right{
    text-align: right;
  }
</style>
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          <!-- page start-->

              <!--Summernote start-->
              <div class="row">
                  <div class="col-md-12">
                      <section class="panel">
                          <header class="panel-heading head-border">
                              Data Proposal
                          </header>
                          <div class="panel-body">
                            <div class="adv-table table-responsive">

                              <table  class="display table table-bordered table-striped" id="dynamic-table">
                                <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nama Pelaksana</th>
                                    <th>Judul</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $no = 1;
                                $sql = $link->prepare("SELECT * FROM proposal
                                  INNER JOIN satker ON satker.id_satker=proposal.id_satker
                                  INNER JOIN file_proposal ON proposal.id_proposal = file_proposal.id_proposal
                                  WHERE proposal.id_satker=$satker->id_satker ");
                                $sql->execute();
                                while ($data = $sql->fetch(PDO::FETCH_OBJ)) {
                                	 ?>
                                	<tr class="gradeX">
                                      <td><?php echo $data->nama; ?></td>
                                      <td><?php echo $data->nama_pelaksana_data; ?></td>
                                      <td><?php echo $data->judul_proposal; ?></td>
                                      <?php if ($data->jenis_rppi ==1): ?>
                                        <td>Penelitian</td>
                                      <?php endif; ?>
                                      <?php if ($data->jenis_rppi ==2): ?>
                                        <td>Pengembangan</td>
                                      <?php endif; ?>
                                      <td> <a target="_blank" href="<?php echo $base_url.'/file/'.$data->file; ?>" title="<?php echo $data->file ?>"><?php echo str_pad(substr($data->file,0,19),22,'.');?></a> </td>
                                      <td><?php echo $data->status_proposal;?></td>
                                      <td>
                                        <a href="index.php?act=perbaikan&id=<?php echo $data->id_proposal; ?>" class="btn btn-warning">Perbaikan</a>
                                        <a href="index.php?act=detail" class="btn btn-success">Detail</a>
                                      </td>
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
              <!--Summernote end-->

          <!-- page end-->
          </section>
      </section>
      <!--main content end-->
