<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('user') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-2">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="username">Username</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('username'); ?>" type="text" id="username" name="username" class="form-control" placeholder="Username">
                        <?= form_error('username', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="password">Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <?= form_error('password', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="password2">Konfirmasi Password</label>
                    <div class="col-md-6">
                        <input type="password" id="password2" name="password2" class="form-control" placeholder="Konfirmasi Password">
                        <?= form_error('password2', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama">Nama</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nama'); ?>" type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                        <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="email">Jabatan</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('email'); ?>" type="text" id="email" name="email" class="form-control" placeholder="Jabatan">
                        <?= form_error('email', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="no_telp">Nomor Telepon</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('no_telp'); ?>" type="text" id="no_telp" name="no_telp" class="form-control" placeholder="Nomor Telepon">
                        <?= form_error('no_telp', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="role">Role</label>
                    <div class="col-md-6">
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'admin'); ?> value="admin" type="radio" id="admin" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="admin">Admin</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'tk1'); ?> value="tk1" type="radio" id="tk1" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="tk1">TK1</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'tk2'); ?> value="tk2" type="radio" id="tk2" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="tk2">TK2</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'sd1'); ?> value="sd1" type="radio" id="sd1" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="sd1">SD1</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'sd2'); ?> value="sd2" type="radio" id="sd2" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="sd2">SD2</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'smp1'); ?> value="smp1" type="radio" id="smp1" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="smp1">SMP1</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'smp2'); ?> value="smp2" type="radio" id="smp2" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="smp2">SMP2</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'sma1'); ?> value="sma1" type="radio" id="sma1" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="sma1">SMA1</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'sma2'); ?> value="sma2" type="radio" id="sma2" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="sma2">SMA2</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input <?= set_radio('role', 'yys'); ?> value="yys" type="radio" id="yys" name="role" class="custom-control-input">
                            <label class="custom-control-label" for="yys">YAYASAN</label>
                        </div>

                        <?= form_error('role', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>