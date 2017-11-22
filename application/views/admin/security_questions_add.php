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
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2 id="notify_message">Add New <small>Sequrity Questions</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="question_form" action="<?php echo base_url('admin/security_questions/process_question')?>" method="post" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="question">Questions <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="question" id="question" class="form-control col-md-7 col-xs-12 validate[required]" placeholder="Please enter the question">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                          <input type="hidden" value="add" name="action">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('admin/includes/footer')?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <?php $this->load->view('admin/includes/script')?>
	<script>
     $(document).ready(function(){
        $('#question_form').validationEngine();
     }); 
    </script>
  </body>
</html>
