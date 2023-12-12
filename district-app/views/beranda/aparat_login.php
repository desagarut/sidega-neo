<div class="card">
	<div class="card-header">
		<h5>Aparat Login</h5>
		<div class="card-header-right">
			<div class="btn-group card-option">
				<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="feather icon-more-horizontal"></i> </button>
				<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
					<li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
					<li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
					<li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
					<li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="card-body">
    <div class="table-responsive">
      <table class="table no-margin">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Waktu</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($last_login_operator as $key => $data) { ?>
            <tr>
              <td><?= $data['nama'] ?></td>
              <td><?= $data['grup'] ?></td>
              <td>
                <div class="sparkbar" data-color="#00a65a" data-height="20"><?= tgl_indo2($data['last_login']) ?></div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
