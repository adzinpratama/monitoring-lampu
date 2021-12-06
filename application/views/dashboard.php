<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Starter Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Starter Page</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                

                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Hai, <?= $this->session->userdata['username']; ?> !</h5>

                        <p class="card-text">
                            Pastikan Kau Mengunci Rumahmu !!.
                        </p>                        
                    </div>
                </div><!-- /.card -->
            </div>
            
            <!-- /.col-md-6 -->

            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $user; ?></h3>

                        <p>User</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="<?= site_url('user'); ?>" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $lampu; ?></h3>

                        <p>Lampu Menyala</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <a href="<?= site_url('control'); ?>" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small card -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $pintu; ?></h3>

                        <p>Pintu Tidak Terbuka</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-lock-open"></i>
                    </div>
                    <a href="<?= site_url('control'); ?>" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>