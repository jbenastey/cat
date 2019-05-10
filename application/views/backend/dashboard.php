<div class="col-12">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 style="text-align: center">Selamat Datang <?= $this->session->userdata('session_name');?></h2>
                    <div class="row">
                        <?php
                        if ($this->session->userdata('session_level') == 'siswa'):
                        ?>
                        <div class="col-4"></div>
                        <div class="col-4">
                            <a href="<?=base_url('ujian')?>" class="btn btn-secondary btn-block"><i class="fe fe-edit" style="font-size: 2000%; overflow: hidden"></i><br><br><h4>Mulai</h4></a>
                        </div>
                        <div class="col-4"></div>
                        <?php
                        else:
                        ?>
                        <div class="col-3"></div>
                        <div class="col-3">
                            <a href="<?=base_url('ujian')?>" class="btn btn-secondary btn-block"><i class="fe fe-book" style="font-size: 1500%; overflow: hidden"></i><br><br><h4>Data Ujian</h4></a>
                        </div>
                        <div class="col-3">
                            <a href="<?=base_url('hasil')?>" class="btn btn-secondary btn-block"><i class="fe fe-check-square" style="font-size: 1500%; overflow: hidden"></i><br><br><h4>Hasil Ujian</h4></a>
                        </div>
                        <civ class="col-3"></civ>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>