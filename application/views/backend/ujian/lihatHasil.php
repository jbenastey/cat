<div class="col-12">
    <div class="card">
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td class="right-border"><?= $ujian['ujian_kelas'] ?></td>

                    <td>Durasi</td>
                    <td>:</td>
                    <td><?= $ujian['ujian_durasi'] ?> Menit</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <td class="right-border"><?= $ujian['ujian_jurusan'] ?></td>

                    <td>Kode Ujian</td>
                    <td>:</td>
                    <td class="bottom-border"><?= $ujian['ujian_kode'] ?></td>
                </tr>
                <tr>
                    <td class="bottom-border">Mata Pelajaran</td>
                    <td class="bottom-border">:</td>
                    <td class="right-border bottom-border"><?= $ujian['ujian_matpel'] ?></td>

                    <?php
                    $jumlah = 0;
                    $status = json_decode($hasil['hasil_nilai_detail'], true);
                    $jumlahBenar = 0;
                    foreach ($soal as $key => $value) {
                        $jumlah++;
                        if ($status[$key] == 'benar') {
                            $jumlahBenar = $jumlahBenar + 1;
                        }
                    }
                    ?>
                    <td class="bottom-border">Jumlah Soal</td>
                    <td class="bottom-border">:</td>
                    <td class="bottom-border"><?= $jumlah ?></td>
                </tr>
                <?php
                if ($this->session->userdata('session_level') == 'guru'):
                    ?>
                    <tr>
                        <td class="bottom-border">Nilai Minimal</td>
                        <td class="bottom-border">:</td>
                        <td class="right-border bottom-border"><?= $ujian['ujian_nilai_minimal'] ?></td>

                        <td class="bottom-border"><b>Jumlah Benar</b></td>
                        <td class="bottom-border">:</td>
                        <td class="right-border bottom-border"><b><?= $jumlahBenar ?> / <?= $jumlah ?></b></td>

                    </tr>
                    <tr>
                        <td class="bottom-border"><b>Nilai</b></td>
                        <td class="bottom-border">:</td>
                        <td class="bottom-border"><b><?= round($hasil['hasil_nilai'], 2) ?></b></td>

                        <?php
                        if ($hasil['hasil_nilai'] < $ujian['ujian_nilai_minimal']):
                            ?>
                            <td colspan="3">
                                <label class="btn btn-danger btn-sm" style="cursor: context-menu">Belum
                                    Lulus</label>
                            </td>
                        <?php
                        else:
                            ?>
                            <td colspan="3">
                                <label class="btn btn-success btn-sm" style="cursor: context-menu">Lulus</label>
                            </td>
                        <?php
                        endif;
                        ?>
                    </tr>
                <?php
                endif;
                ?>
            </table>
            <table class="table table-bordered" id="datatable">
                <?php
                if ($this->session->userdata('session_level') == 'guru'):
                    ?>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Soal</th>
                        <th>Jawaban</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $status = json_decode($hasil['hasil_nilai_detail'], true);
                    $jawab = json_decode($hasil['hasil_jawaban_detail'], true);
                    foreach ($soal as $key => $value):
                        ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $value['soal_isi'] ?></td>
                            <td>
                                <ol type="A">
                                <?php $jawaban = json_decode($value['soal_jawaban'], true);
                                foreach ($jawaban as $keys => $item):
                                    ?>
                                    <li style="<?php
                                    if ($value['soal_kunci_jawaban'] == $keys) {
                                        echo 'color: white';
                                    } elseif ($jawab[$key] == strtoupper($keys)) {
                                        echo 'color: white';
                                    }
                                    ?>"><div class="<?php
                                        if ($value['soal_kunci_jawaban'] == $keys) {
                                            echo 'benar';
                                        } elseif ($jawab[$key] == strtoupper($keys)) {
                                            echo 'salah';
                                        }
                                        ?>"><?= $item ?></div></li>

                                <?php
                                endforeach;
                                ?>
                                </ol>
                            </td>
                            <td>
                                <?php
                                if ($status[$key] == 'salah'):
                                    ?>
                                    <label class="btn btn-danger btn-sm" style="cursor: context-menu">Salah</label>
                                <?php
                                elseif ($status[$key] == 'benar'):
                                    ?>
                                    <label class="btn btn-success btn-sm" style="cursor: context-menu">Benar</label>
                                <?php
                                endif;
                                ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                    endforeach;
                    ?>
                    </tbody>
                <?php
                endif;
                ?>
            </table>
        </div>
    </div>
</div>