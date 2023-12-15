<!--
<?php //if ($this->CI->cek_hak_akses('h')) : 
?>
	<div class='modal fade' id='confirm-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
					<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Konfirmasi</h4>
				</div>
				<div class='modal-body btn-info'>
					Apakah Anda yakin ingin menghapus data ini?
				</div>
				<div class='modal-footer'>
					<button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
					<a class='btn-ok'>
						<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" id="ok-delete"><i class='fa fa-trash-o'></i> Hapus</button>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php //endif; 
?>
-->
<?php if ($this->CI->cek_hak_akses('h')) : ?>

	<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="defaultModalLabel">Konfirmasi Hapus</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body"> Apakah Anda yakin ingin menghapus data ini? </div>
				<div class="modal-footer">
					<button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Batal</button>
					<button type="button" class="btn mb-2 btn-danger" id="ok-delete">Hapus</button>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>