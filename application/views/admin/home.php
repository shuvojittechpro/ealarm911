<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('admin/includes/head')?>

<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="form_login" method="post" action="<?php echo base_url('admin/home/process_login')?>">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control validate[required]" placeholder="Username" name="username" />
              </div>
              <div>
                <input type="password" class="form-control validate[required]" placeholder="Password" name="password" />
              </div>
              <div >
                <input type="submit" class="btn btn-default submit" value="Log in" style="margin-left:0px !important" />
              </div>

              <div id="notify_message" style="margin-top: 35px; float: left; margin-left: -69px;"></div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-bell"></i> Ealarm911!</h1>
                  <p>©This is something I have no idea about</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
    <?php $this->load->view('admin/includes/script')?>

    <script>
      $(document).ready(function(){
        $("#form_login").validationEngine();
      });
    </script>
  </body>
</html>
