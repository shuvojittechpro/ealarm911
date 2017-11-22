<!-- jQuery -->
<script src="<?php echo $this->config->item('vendor_url')?>jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo $this->config->item('vendor_url')?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo $this->config->item('build_url')?>js/custom.min.js"></script>

<!-- Validation Engine -->
<script src="<?php echo $this->config->item('plugins_url')?>validation-engine/js/languages/jquery.validationEngine-en.js"></script>
<script src="<?php echo $this->config->item('plugins_url')?>validation-engine/js/jquery.validationEngine.js"></script>
<script src="<?php echo $this->config->item('plugins_url')?>notify/notify.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


<script>
    var basepath = '<?php echo base_url()?>';
</script>

<?php if ($this->session->flashdata('notify_mssg')) {?>
<script>
$(document).ready(function(){
	$('#notify_message').notify(
        "<?php echo $this->session->flashdata('notify_mssg')?>",
        "<?php echo $this->session->flashdata('notify_stat')?>", 
        { position: "bottom center" }
  );
});
</script>
<?php }?> 