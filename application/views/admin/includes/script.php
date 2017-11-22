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

 <!-- Datatables -->
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>jszip/dist/jszip.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo $this->config->item('vendor_url')?>pdfmake/build/vfs_fonts.js"></script>

<script>
    var basepath = '<?php echo base_url()?>';
</script>

<?php if ($this->session->flashdata('notify_mssg')) {?>
<script>
$(document).ready(function(){
	$.notify(
        "<?php echo $this->session->flashdata('notify_mssg')?>",
        "<?php echo $this->session->flashdata('notify_stat')?>"
  );
});
</script>
<?php }?> 