<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Dashboard</h2>
                        <button class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>add item</button>
                    </div>
                </div>
            </div> -->
            <div class="row m-t-25">
                <div class="col-lg-12">

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title">Hai, <?= ucfirst($this->session->userdata['username']).'👋 ! Kamu Masuk Sebagai '. ucfirst($this->session->userdata('group')); ?> !</h5>

                            <p class="card-text">
                                Kamu Akan Menerima Notifikasi Jika Lampu Belum Menyala atau Mati Pada Waktu Yang Telah Ditentukan !!.
                            </p>
                        </div>
                    </div><!-- /.card -->
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <div class="text">
                                    <h2><?= $user; ?></h2>
                                    <span>Pengguna Aktif</span>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                                <div class="text">
                                    <h2><?= $lampu; ?></h2>
                                    <span>Lampu Menyala</span>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                                <div class="text">
                                    <h2>1,086</h2>
                                    <span>this week</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c4">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                                <div class="text">
                                    <h2>$1,060,386</h2>
                                    <span>total earnings</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- <div class="row">
                <div class="col-lg-12">
                    <h2 class="title-1 m-b-25">Statistik Penggunaan Lampu</h2>
                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>date</th>
                                    <th>order ID</th>
                                    <th>name</th>
                                    <th class="text-right">price</th>
                                    <th class="text-right">quantity</th>
                                    <th class="text-right">total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2018-09-29 05:57</td>
                                    <td>100398</td>
                                    <td>iPhone X 64Gb Grey</td>
                                    <td class="text-right">$999.00</td>
                                    <td class="text-right">1</td>
                                    <td class="text-right">$999.00</td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->
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