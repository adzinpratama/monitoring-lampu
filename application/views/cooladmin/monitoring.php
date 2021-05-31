<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
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
                            } ?>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" height="100px" width="100px" src="<?= base_url('assets/img/') . $lampu; ?>" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">Lampu <?= $lmp->id; ?></h5>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <?php if ($lmp->data) : ?>
                                        <p>Lampu Menyala Selama</p>
                                        <span><?= ($diff->d > 1) ? $diff->d.' Hari':'' ?></span>
                                        <span class="timeClock" id="jamServer-<?= $lmp->id; ?>"><?= $diff->h . ':' . $diff->i . ':' . $diff->s; ?></span>
                                    <?php else : ?>
                                        <span >-</span>
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
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    data = [];
    $('.timeClock').each(function() {
        data.push($(this).attr('id'));
    })
    for (var i = 0; i < data.length; i++) {
        showServerTime(jQuery("#" + data[i]), jQuery("#" + data[i]).text());
    }


    function showServerTime(obj, time) {
        var parts = time.split(":"),
            newTime = new Date();

        newTime.setHours(parseInt(parts[0], 10));
        newTime.setMinutes(parseInt(parts[1], 10));
        newTime.setSeconds(parseInt(parts[2], 10));

        var timeDifference = new Date().getTime() - newTime.getTime();

        var methods = {
            displayTime: function() {
                var now = new Date(new Date().getTime() - timeDifference);
                obj.text([
                    methods.leadZeros(now.getHours(), 2),
                    methods.leadZeros(now.getMinutes(), 2),
                    methods.leadZeros(now.getSeconds(), 2)
                ].join(":"));
                setTimeout(methods.displayTime, 500);
            },

            leadZeros: function(time, width) {
                while (String(time).length < width) {
                    time = "0" + time;
                }
                return time;
            }
        }
        methods.displayTime();
    }
</script>