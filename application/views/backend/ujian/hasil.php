<div class="col-12">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kelas</th>
                            <th>Jurusan</th>
                            <th>Mata Pelajaran</th>
                            <th>Nama Siswa</th>
                            <th>Nilai</th>
                            <th><i class="fa fa-gear"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        foreach ($hasil as $key => $value):
                            if ($value['hasil_nilai'] != null):
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $value['ujian_kelas'] ?></td>
                                    <td><?= $value['ujian_jurusan'] ?></td>
                                    <td><?= $value['ujian_matpel'] ?></td>
                                    <td><?= $value['user_nama'] ?></td>
                                    <td><?= round($value['hasil_nilai'], 2) ?></td>
                                    <td><a href="<?= base_url('hasil/lihat/' . $value['hasil_ujian_id']) ?>"
                                           class="btn btn-sm btn-primary"><i class="fe fe-eye"></i> Lihat</a></td>
                                </tr>
                                <?php
                                $no++;
                            endif;
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>