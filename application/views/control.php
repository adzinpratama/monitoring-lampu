<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Home Control</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Home Control</li>
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
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username" id="control_<?= $lmp->id_aksi; ?>"><?= $lmp->nama_kontrol; ?></h3>
                            <h5 class="widget-user-desc"><?= $lmp->posisi; ?></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="<?= base_url('assets'); ?>/img/lampu.jpg" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12 border-right">                                    
                                    <div class="description-block">
                                        <?php if($lmp->status == "On"){
                                            $bg = 'success';
                                        }else{
                                            $bg = 'danger';
                                        } ?>
                                        <a class="btn btn-app bg-<?= $bg; ?>" id="<?= $lmp->id_aksi; ?>" onclick="action(<?= $lmp->id_aksi; ?>)">
                                            <i class="fas fa-power-off"></i>
                                            <p id="text_<?= $lmp->id_aksi; ?>" class="lampu"><?= $lmp->status; ?></p>
                                        </a>
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

            <?php foreach ($pintu as $pt) : ?>
                <div class="col-lg-3">
                    <div class="card card-widget widget-user ml-lg-3">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-warning">
                            <h3 class="widget-user-username"><?= $pt->nama_kontrol; ?></h3>
                            <h5 class="widget-user-desc"><?= $pt->posisi; ?></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="<?= base_url('assets'); ?>/img/pintu.jpg" alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-12 border-right">
                                    <div class="description-block">
                                        <?php if($pt->status=='Key'){
                                            $bgp = 'success';
                                            $icon = 'lock';
                                        }else{
                                            $bgp = 'danger';
                                            $icon = 'lock-open';
                                        } ?>
                                        <a class="btn btn-app bg-<?= $bgp; ?>" id="<?= $pt->id_aksi; ?>" onclick="action(<?= $pt->id_aksi; ?>)">
                                            <i class="fas fa-<?= $icon; ?>"></i>
                                            <p id="text_<?= $pt->id_aksi; ?>" ><?= $pt->status; ?></p>
                                        </a>
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


<script>
    

    function action(id) {
        console.log(id);
        var aksi = $('#text_' + id).text();
        if (aksi == 'On') {
            action = 'Off';
        } else if (aksi == 'Off') {
            action = 'On';
        } else if (aksi == 'Key') {            
            action = 'Unkey';
        } else {
            action = 'Key'
        }
        console.log(action);
        var saklar = getJSON("<?= site_url('control/aksi'); ?>", {
            action: action,
            id: id
        });
        if (saklar.status == 'sukses') {
            if (action == 'On') {
                Swal.fire(
                    'Sukses!',
                    'Lampu sudah Menyala',
                    'success'
                ).then((result) => {
                    location.reload()
                })
                
            } else if (action == 'Off') {
                Swal.fire(
                    'Sukses!',
                    'Lampu sudah Mati',
                    'success'
                ).then((result) => {
                    location.reload()
                })
                
            } else if (action == 'Key') {
                Swal.fire(
                    'Sukses!',
                    'Pintu Sudah Terkunci',
                    'success'
                ).then((result) => {
                    location.reload()
                })
                
            } else {
                Swal.fire(
                    'Sukses!',
                    'Pintu sudah Terbuka',
                    'success'
                ).then((result) => {
                    location.reload()
                })               
                
            }
        }


    }

    function getJSON(url, data) {
        return JSON.parse($.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            global: false,
            async: false,
            success: function(msg) {

            }
        }).responseText);
    }
</script>