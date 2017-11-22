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
                <table id="sc_questions" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Serial Number</th>
                            <th>Security Question</th>
                            <th>Status</th>
                            <th>Posted Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Serial Number</th>
                            <th>Security Question</th>
                            <th>Status</th>
                            <th>Posted Time</th>
                            <th>Action</th>
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
            $('#sc_questions').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax":{
                   url :basepath+"admin/security_questions/response_security_questions_list", // json datasource
                   type: "post",  // type of method  ,GET/POST/DELETE
                   error: function(){
                     $("#employee_grid_processing").css("display","none");
                   }
                 }
            } );
        } );

        function change_security_question_status(questionID,this_id){
          $.ajax({
            type:"POST",
            url:basepath+"admin/security_questions/change_status",
            data:{questionID:questionID},
            success: function(resp){
              if(resp=='true'){
                $(this_id).parent('td').find('span').removeClass('label_status-danger').addClass('label_status-success').html('Active');
              }
              else if(resp=='false'){
                $(this_id).parent('td').find('span').removeClass('label_status-success').addClass('label_status-danger').html('In Active');
              }
            }
          });
        }
    </script>
  </body>
</html>
