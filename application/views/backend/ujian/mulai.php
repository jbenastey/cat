<div class="col-12">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    Navigasi Soal
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                        $totalSoal = 0;
                        foreach ($soal as $key => $value) :
                            ?>
                            <li role="presentation">
                                <a href="#step<?= $key ?>" data-toggle="tab" aria-controls="step<?= $key ?>" role="tab"
                                   title="Soal ke <?= $key + 1 ?>">
                                    <div class="btn btn-outline-primary">
                                        <?= $key + 1 ?>
                                    </div>
                                </a>
                            </li>&nbsp;
                            <?php
                            $totalSoal = $totalSoal + 1;
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header">
                    Sisa waktu :  &nbsp;<div id="waktu">
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?=base_url('ujian/mulai/'.$ujian['ujian_id'])?>" role="form" method="post">
                        <input type="hidden" value="<?=$ujian['ujian_durasi']?>" id="durasi">
                        <div class="tab-content">
                            <?php
                            foreach ($soal as $key => $value) :
                                ?>
                                <div id="step<?= $key ?>" class="tab-pane <?php if ($key == 0) {
                                    echo 'active';
                                } ?>" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Soal Nomor <?=$key+1?></p>
                                            <br>
                                            <p><?= $value['soal_isi'] ?></p>

                                        </div>
                                        <div class="col-12">
                                            <div class="funkyradio">
                                                <?php
                                                $jawaban = json_decode($value['soal_jawaban']);
                                                foreach ($jawaban as $keys => $item):
                                                    ?>
                                                    <div class="funkyradio-primary">
                                                        <input type="radio" name="jawaban-<?= $key ?>"
                                                               id="<?= $key ?>-<?= $keys ?>" value="<?= strtoupper($keys) ?>"/>
                                                        <label for="<?= $key ?>-<?= $keys ?>">
                                                            <div class="huruf_opsi"><?= strtoupper($keys) ?></div><?= $item ?>
                                                        </label>
                                                    </div>
                                                <?php
                                                endforeach;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <?php
                                        if ($key == 0):
                                            ?>
                                            <div class="col-6">

                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary btn-block next-step" value="<?=$key?>">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        <?php
                                        elseif ($key == $totalSoal - 1):
                                            ?>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary btn-block prev-step" value="<?=$key?>">
                                                    Sebelumnya
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-success btn-block" name="selesai" id="selesaiUjian" onclick="return alert('Ujian sudah selesai')">Selesai</button>
                                            </div>
                                        <?php
                                        else:
                                            ?>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-secondary btn-block prev-step" value="<?=$key?>">
                                                    Sebelumnya
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary btn-block next-step" value="<?=$key?>">
                                                    Selanjutnya
                                                </button>
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                    </div>

                                </div>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // window.onbeforeunload = function() {
    //     return 'jangan di refresh';
    // };
</script>
