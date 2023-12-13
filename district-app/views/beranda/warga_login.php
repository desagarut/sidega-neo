<!--
<div class="card">
    <div class="card-header">
        <h5>Warga Login</h5>
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
        <ul class="users-list clearfix">
            <?php foreach ($last_login as $key => $data) { ?>
                <li>
                    <?php if ($data['foto']) : ?>
                        <img src="<?= AmbilFoto($data['foto']) ?>" alt="Foto">
                    <?php else : ?>
                        <img class="user-image" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="Foto">
                    <?php endif; ?>

                    <a class="users-list-name" href="<?php echo site_url('penduduk/detail/1/0/' . $data['id']); ?>"><?= $data['nama'] ?> <?= $data['nik'] ?></a>
                    <span class="users-list-date"><?= $data['dusun'] ?></span>
                </li>
            <?php } ?>
        </ul>
        <div class="card-footer text-center">
            <a href="<?= site_url('mandiri'); ?>" class="uppercase">View All Users</a>
        </div>
    </div>
</div>
                    -->
<div class="row">
                <!-- Log -->
                <div class="col-md-12 mb-4">
                  <div class="card shadow">
                    <div class="card-header">
                      <strong class="card-title">Logging</strong>
                      <a class="float-right small text-muted" href="#!">View all</a>
                    </div>
                    <div class="card-body">
                      <div class="list-group list-group-flush my-n3">
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span class="circle circle-sm bg-warning"><i class="fe fe-shield-off fe-16 text-white"></i></span>
                            </div>
                            <div class="col">
                              <small><strong>11:00 April 16, 2020</strong></small>
                              <div class="mb-2 text-muted small">Lorem ipsum dolor sit amet, <strong>consectetur adipiscing</strong> elit. Integer dignissim nulla eu quam cursus placerat. Vivamus non odio ullamcorper, lacinia ante nec, blandit leo. </div>
                              <span class="badge badge-pill badge-warning">Security</span>
                            </div>
                            <div class="col-auto pr-0">
                              <small class="fe fe-more-vertical fe-16 text-muted"></small>
                            </div>
                          </div> <!-- / .row -->
                        </div><!-- / .list-group-item -->
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span class="circle circle-sm bg-success"><i class="fe fe-database fe-16 text-white"></i></span>
                            </div>
                            <div class="col">
                              <small><strong>17:00 April 15, 2020</strong></small>
                              <div class="mb-2 text-muted small">Proin porta vel erat suscipit luctus. Cras rhoncus felis sed magna commodo, in <a href="#!">pretium</a> mauris faucibus. Cras rhoncus felis sed magna commodo, in pretium mauris faucibus.</div>
                              <span class="badge badge-pill badge-success">System Update</span>
                            </div>
                            <div class="col-auto pr-0">
                              <small class="fe fe-more-vertical fe-16 text-muted"></small>
                            </div>
                          </div> <!-- / .row -->
                        </div><!-- / .list-group-item -->
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <span class="circle circle-sm bg-secondary"><i class="fe fe-user-plus fe-16 text-white"></i></span>
                            </div>
                            <div class="col">
                              <small><strong>17:00 April 10, 2020</strong></small>
                              <div class="mb-2 text-muted small"> Morbi id arcu convallis, eleifend justo tristique, tincidunt nisl. Morbi euismod fermentum quam, at fringilla elit posuere a. <strong>Aliquam</strong> accumsan mi venenatis risus fermentum, at sagittis velit fermentum.</div>
                              <span class="badge badge-pill badge-secondary">Users</span>
                            </div>
                            <div class="col-auto pr-0">
                              <small class="fe fe-more-vertical fe-16 text-muted"></small>
                            </div>
                          </div> <!-- / .row -->
                        </div><!-- / .list-group-item -->
                      </div> <!-- / .list-group -->
                    </div> <!-- / .card-body -->
                  </div> <!-- / .card -->
                </div> <!-- / .col -->
              </div> <!-- end section -->