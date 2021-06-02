<?php foreach ($lampu as $lmp) : ?>
    <div class="col-md-4">
        <div class="card">
            <?php
            $awal  = date_create($lmp->time_start);
            // $akhir = date_create($lmp->time_end);
            $akhir = date_create();
            $diff  = date_diff($awal, $akhir);
            if ($lmp->data == "1") {
                $bg = 'success';
                $status = 'Lampu Menyala';
                $lampu = 'lampu-nyala.png';
            } else {
                $bg = 'danger';
                $status = 'Lampu Mati';
                $lampu = 'lampu-mati.png';
            }            
            ?>
            <div class="card-body">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" height="100px" width="100px" src="<?= base_url('assets/img/') . $lampu; ?>" alt="Card image cap">
                    <h5 class="text-sm-center mt-2 mb-1">Lampu <?= $lmp->id; ?></h5>
                </div>
                <hr>
                <div class="card-text text-sm-center">
                    <?php if ($lmp->data) : ?>
                        <p>Lampu Menyala Selama</p>
                        <span><?= ($diff->d > 1) ? $diff->d . ' Hari' : '' ?></span>
                        <span class="timeClock" id="jamServer-<?= $lmp->id; ?>"><?= $diff->h . ' Jam ' . $diff->i . ' Menit ' . $diff->s; ?> Detik</span>
                    <?php else : ?>
                        <span>-</span>
                        <p>-</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer bg-<?= $bg; ?>">
                <strong class="card-title mb-3 text-white"><?= $status; ?></strong>
            </div>
        </div>
    </div>
<?php endforeach; ?>