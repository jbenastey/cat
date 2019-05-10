<div class="col-12">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">

                </div>
                <div class="col-8">
                    <table class="table">
                        <tr>
                            <td>Soal</td>
                            <td>:</td>
                            <td><?= $soal['soal_isi'] ?></td>
                        </tr>
                        <tr>
                            <td>Jawaban</td>
                            <td>:</td>
                            <td>
                                <ol type="A">
                                    <?php
                                    $jawaban = json_decode($soal['soal_jawaban']);
                                    foreach ($jawaban as $value):
                                        ?>
                                        <li><?= $value ?></li>
                                    <?php endforeach; ?>
                                </ol>
                            </td>
                        </tr>
                        <tr>
                            <td>Kunci Jawaban</td>
                            <td>:</td>
                            <td><?= strtoupper($soal['soal_kunci_jawaban']) ?></td>
                        </tr>
                    </table>
                    <br>
                    <a href="<?=base_url('soal/edit/'.$soal['soal_id'])?>" class="btn btn-success"><i class="fe fe-edit"></i> Edit</a>
                </div>
                <div class="col-2">

                </div>
            </div>
        </div>
    </div>
</div>