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

	<!--   Core JS Files   -->
	<script src="<?= base_url() ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?= base_url() ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Chart JS -->
	<script src="<?= base_url() ?>assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?= base_url() ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?= base_url() ?>assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?= base_url() ?>assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?= base_url() ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?= base_url() ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?= base_url() ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Moris Line -->
    <script src="<?= base_url() ?>assets/js/plugin/raphael/raphael.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/morris.js/morris.min.js"></script>

	<!-- Date Picker -->
    <script src="<?= base_url() ?>assets/js/plugin/datepickerange/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/datepickerange/daterangepicker.js"></script>
    <script src="<?= base_url() ?>assets/js/plugin/datepicker/bootstrap-datepicker.js"></script>

	<!-- Sweet Alert -->
	<script src="<?= base_url() ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Currency Format -->
	<script src="<?= base_url() ?>assets/js/currency-format.js"></script>

	<!-- Atlantis JS -->
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

