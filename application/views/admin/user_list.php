<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/includes/head')?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <?php $this->load->view('admin/includes/side_bar')?>
        </div>

        <!-- top navigation -->
        <?php $this->load->view('admin/includes/top_panel')?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Serial Number</th>
                            <th>User Name</th>
                            <th>Join date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Serial Number</th>
                            <th>User Name</th>
                            <th>Join date</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

          </div>
          <br />
        </div>
        <!-- /page content -->

        <!-- footer content -->
         <?php $this->load->view('admin/includes/footer')?>
        <!-- /footer content -->
      </div>
    </div>

    <?php $this->load->view('admin/includes/script')?>
	
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax":{
                   url :basepath+"admin/user/response_user_list", // json datasource
                   type: "post",  // type of method  ,GET/POST/DELETE
                   error: function(){
                     $("#employee_grid_processing").css("display","none");
                   }
                 }
            } );
        } );
    </script>
  </body>
</html>
