<!--footer start-->
      <!-- <footer class="site-footer">
          <div class="text-center">
              2013 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer> -->
      <!--footer end-->
  </section>

    <script src="<?php echo $base_url; ?>/js/jquery.js"></script>
    <script src="<?php echo $base_url; ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo $base_url; ?>/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo $base_url; ?>/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo $base_url; ?>/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo $base_url; ?>/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $base_url; ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $base_url; ?>/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>/assets/data-tables/DT_bootstrap.js"></script>
    <script src="<?php echo $base_url; ?>/js/respond.min.js" ></script>

  <!--dynamic table initialization -->
  <script src="<?php echo $base_url; ?>/js/dynamic_table_init.js"></script>

  <!--this page plugins-->

  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/fuelux/js/spinner.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/jquery-multi-select/js/jquery.multi-select.js"></script>
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/jquery-multi-select/js/jquery.quicksearch.js"></script>

  <!-- form component general default -->
  <!--custom tagsinput-->
  <script src="<?php echo $base_url; ?>/js/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="<?php echo $base_url; ?>/js/ga.js"></script>

  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/ckeditor/ckeditor.js"></script>

  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <!-- ecnd form component general default  -->

  <!--select2-->
  <script type="text/javascript" src="<?php echo $base_url; ?>/assets/select2/js/select2.min.js"></script>

  <!--summernote-->
  <script src="<?php echo $base_url; ?>/assets/summernote/dist/summernote.min.js"></script>

  <!--right slidebar-->
  <script src="<?php echo $base_url; ?>/js/slidebars.min.js"></script>


  <!--this page  script only-->
  <script src="<?php echo $base_url; ?>/js/advanced-form-components.js"></script>

  <!--bootstrap-switch-->
  <script src="<?php echo $base_url; ?>/assets/bootstrap-switch/static/js/bootstrap-switch.js"></script>

  <!--bootstrap-switch-->
  <script src="<?php echo $base_url; ?>/assets/switchery/switchery.js"></script>

  

  <!--common script for all pages-->
  <script src="<?php echo $base_url; ?>/js/common-scripts.js"></script>

  <script>

      jQuery(document).ready(function(){

          $('.summernote').summernote({
              height: 200,                 // set editor height

              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor

              focus: true                 // set focus to editable area after initializing summernote
          });
      });

  </script>

    <!--select2-->
  <script type="text/javascript">

      $(document).ready(function () {
          $(".js-example-basic-single").select2();

          $(".js-example-basic-multiple").select2();
      });
  </script>

  <!--bootstrap swither-->
  <script type="text/javascript">
      $(document).ready(function () {
          // Resets to the regular style
          $('#dimension-switch').bootstrapSwitch('setSizeClass', '');
          // Sets a mini switch
          $('#dimension-switch').bootstrapSwitch('setSizeClass', 'switch-mini');
          // Sets a small switch
          $('#dimension-switch').bootstrapSwitch('setSizeClass', 'switch-small');
          // Sets a large switch
          $('#dimension-switch').bootstrapSwitch('setSizeClass', 'switch-large');


          $('#change-color-switch').bootstrapSwitch('setOnClass', 'success');
          $('#change-color-switch').bootstrapSwitch('setOffClass', 'danger');
      });
  </script>

  <!-- swithery-->
  <script type="text/javascript">
      $(document).ready(function () {
          //default
          var elem = document.querySelector('.js-switch');
          var init = new Switchery(elem);


          //small
          var elem = document.querySelector('.js-switch-small');
          var switchery = new Switchery(elem, { size: 'small' });

          //large
          var elem = document.querySelector('.js-switch-large');
          var switchery = new Switchery(elem, { size: 'large' });


          //blue color
          var elem = document.querySelector('.js-switch-blue');
          var switchery = new Switchery(elem, { color: '#7c8bc7', jackColor: '#9decff' });

          //green color
          var elem = document.querySelector('.js-switch-yellow');
          var switchery = new Switchery(elem, { color: '#FFA400', jackColor: '#ffffff' });

          //red color
          var elem = document.querySelector('.js-switch-red');
          var switchery = new Switchery(elem, { color: '#ff6c60', jackColor: '#ffffff' });


      });
  </script>


  </body>

</html>
