<!-- footer -->
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
						Copyright © 2021<a href="<?= base_url('beranda') ?>"> MoneyBook</a>
					</div>				
				</div>
			</footer>
		</div>
	</div>

	<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/morris.js/morris.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/datepickerange/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/datepickerange/daterangepicker.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>
	<script src="<?= base_url() ?>assets/js/currency-format.js"></script>
	<script src="<?= base_url() ?>assets/js/atlantis.min.js"></script>

	<!-- App -->
	<script src="<?= base_url() ?>assets/app/dashboard.js"></script>
	<script src="<?= base_url() ?>assets/app/kategori_pemasukan.js"></script>
	<script src="<?= base_url() ?>assets/app/kategori_pengeluaran.js"></script>
	<script src="<?= base_url() ?>assets/app/transaksi_pemasukan.js"></script>
	<script src="<?= base_url() ?>assets/app/transaksi_pengeluaran.js"></script>



	<?php if ($this->session->flashdata('success')) { ?>
    	<script>  
			swal("Success", "<?= $this->session->flashdata('success')?>", {
				icon : "success",
				buttons: {        			
					confirm: {
						className : 'btn btn-success'
					}
				},
			});   
		</script>
	<?php } ?>

	
</body>
</html>

