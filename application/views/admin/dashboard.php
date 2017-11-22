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
              <h1>Welcome to Ealarm 911</h1>
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
	
  </body>
</html>