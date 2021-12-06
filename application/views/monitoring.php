<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Monitoring Lampu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Monitoring Lampu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($lampu as $lmp) : ?>
                <div class="col-lg-3">
                    <div class="card card-widget widget-user ml-lg-3">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <?php if($lmp->data == "1"){
                            $bgOne = 'success';
                        }else{
                            $bgOne = 'danger';
                        } ?>
                        <div class="widget-user-header bg-<?= $bgOne; ?>">
                            <h3 class="widget-user-username" id="control_<?= $lmp->id; ?>">Lampu <?= $lmp->id; ?></h3>
                            <!-- <h5 class="widget-user-desc"><?= $lmp->posisi; ?></h5> -->
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="<?= base_url('assets'); ?>/img/lampu.jpg" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12 border-right">                                    
                                    <div class="description-block">
                                        <?php 
                                        $awal  = date_create($lmp->time_start);
                                        $akhir = date_create($lmp->time_end); // waktu sekarang
                                        $diff  = date_diff( $awal, $akhir );
                                        if($lmp->data == "1"){
                                            $bg = 'success';
                                            $status = 'Lampu Menyala';

                                        }else{
                                            $bg = 'danger';
                                            $status = 'Lampu Mati';
                                        } ?>
                                        <p><?= $status; ?></p>
                                        <p><?=date('d-m-Y  G:i:s'); ?></p>
                                        <p><?= $diff->h ?> jam Sudah Menyala</p>

                                        <!-- <a class="btn btn-app bg-<?= $bg; ?>">
                                            <i class="fas fa-power-off"></i>
                                            <p id="text_<?= $lmp->id_aksi; ?>" class="lampu"><?= $lmp->status; ?></p>
                                        </a> -->
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>            


        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>