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
                              Profile Satker
                          </header>
                          <div class="panel-body">
                            <table class="table">
                              <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?php echo strtoupper($satker->nama) ?></td>
                              </tr>
                              <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?php echo strtoupper($satker->alamat) ?></td>
                              </tr>
                              <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $satker->email ?></td>
                              </tr>
                              <tr>
                                <td>No Hp</td>
                                <td>:</td>
                                <td><?php
                                if ($satker->nohp == NULL) {
                                  // code...
                                  echo "-";
                                }else {
                                  echo strtoupper($satker->nohp);
                                }
                                ?></td>
                              </tr>
                            </table>


                          </div>
                      </section>
                  </div>
              </div>
              <!--Summernote end-->

          <!-- page end-->
          </section>
      </section>
      <!--main content end-->
