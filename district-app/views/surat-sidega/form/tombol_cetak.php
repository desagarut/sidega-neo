<div class="box-footer">
	<div class="row">
		<div class="col-xs-12">
			<?php if ($mandiri): ?>
				<button type="reset" onclick="window.history.back();" class="btn btn-outline-danger btn-sm btn-sm "><i class="fe fe-times"></i> Batal</button>
			<?php elseif ($periksa): ?>
				<a href="<?= site_url('permohonan_surat_admin/belum_lengkap/'.$periksa['id'])?>" class="btn btn-outline-danger btn-sm btn-sm "><i class="fe fe-times"></i> Belum Lengkap</a>
				</form>
			<?php else: ?>
				<button type="reset" onclick="$('#validasi').trigger('reset');" class="btn btn-outline-danger btn-sm btn-sm "><i class="fe fe-times"></i> Batal</button>
			<?php endif; ?>
			<?php if ($mandiri): ?>
				<button type="button" onclick="$('#validasi').attr('action', '<?= site_url('permohonan_surat/kirim/'.$permohonan[id])?>'); $('#validasi').submit();" class="btn btn-success btn-sm pull-right" style="margin-right: 5px;"><i class="fe fe-file-text"></i> Kirim</button>
			<?php else: ?>
				<?php if (SuratExport($url)): ?>
					<button type="button" onclick="$('#validasi').submit()" class="btn btn-success btn-sm pull-right" style="margin-right: 5px;"><i class="fe fe-file-text"></i> Cetak Surat</button>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>
