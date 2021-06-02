<style>
    .option-checker {
        width: 100px;
        float: left;
        margin: 10px 15px 0 0;
        height: 25px;
        line-height: 25px;
        text-align: center;
        border-radius: 15px;
        border: 1px solid #ddd;
        cursor: pointer;
        position: relative;
        transition: background .2s linear;
        -moz-transition: background .2s linear;
        /* Firefox 4 */
        -webkit-transition: background .2s linear;
        /* Safari 和 Chrome */
        -o-transition: background .2s linears;
        /* Opera */
    }

    .option-checker.active {
        background: #63C76A;
        color: #fff;
    }


    .option-checker .ball {
        display: block;
        position: absolute;
        left: 0;
        width: 22px;
        height: 22px;
        background: #eee;
        border-radius: 10px;
        transition: left .2s linear;
        -moz-transition: left .2s linear;
        /* Firefox 4 */
        -webkit-transition: left .2s linear;
        /* Safari 和 Chrome */
        -o-transition: left .2s linears;
        /* Opera */
    }

    .option-checker.active .ball {
        left: 77px;
    }
</style>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Manajemen User</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <!-- <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button> -->
                        </div>
                        <div class="table-data__tool-right">
                            <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#modal-form">
                                <i class="zmdi zmdi-plus"></i>Tambah User</button>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th> -->
                                    <th>Username</th>
                                    <th>email</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($record as $rc) : ?>
                                    <tr class="tr-shadow">
                                        <!-- <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox" value="<?= $rc->ID; ?>">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td> -->
                                        <td><?= $rc->username; ?></td>
                                        <td><?= $rc->email; ?></td>
                                        <td><?= $rc->group; ?></td>
                                        <td>
                                            <!-- <label class="switch switch-text switch-warning switch-pill">
                                                <input type="checkbox" class="switch-input status" value="<?= $rc->ID; ?>">
                                                <span data-on="Aktif" data-off="Tidak Aktif" class="switch-label"></span>
                                                <span class="switch-handle"></span>
                                            </label> -->
                                            <span class="option-checker option-status <?= ($rc->active) ? 'active' : '';  ?>" data-status="<?= $rc->ID; ?>">
                                                <span class="ball"></span>
                                                <span class="text"><?= ($rc->active) ? 'Aktif' : 'Non-Aktif';  ?></span>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($rc->ID !== $this->session->userdata('ID')) : ?>
                                                <div class="table-data-feature">
                                                    <button onclick="edit(<?= $rc->ID; ?>)" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                    <button onclick="del(<?= $rc->ID; ?>)" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
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

<!-- modal medium -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="tambah" method="post" id="form-add" class="tambah" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <!-- <input type="text" id="input1-group1" name="input1-group1" placeholder="Username" class="form-control"> -->
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <!-- <input type="email" id="input2-group1" name="input2-group1" placeholder="Email" class="form-control"> -->
                                <div class="input-group-addon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <!-- <input type="email" id="input2-group1" name="input2-group1" placeholder="Email" class="form-control"> -->
                                <div class="input-group-addon">
                                    <!-- <i class="far fa-envelope"></i> -->
                                    +62
                                </div>
                                <input class="form-control" type="number" id="telp" name="telp" placeholder="Nomor Telepon">
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <!-- <input type="email" id="input2-group1" name="input2-group1" placeholder="Email" class="form-control"> -->
                                <!-- <input class="form-control" type="email" id="email" name="email" placeholder="Email"> -->
                                <div class="input-group-addon">
                                    <i class="fa fa-group"></i>
                                </div>
                                <select class="form-control" id="group" name="group">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-12">
                            <div class="input-group">
                                <!-- <input type="email" id="input2-group1" name="input2-group1" placeholder="Email" class="form-control"> -->
                                <div class="input-group-addon">
                                    <i class="fas fa-key"></i>
                                </div>
                                <input class="form-control" type="password" id="password" name="password" placeholder="password" />
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" id="submit-form" class="btn btn-primary">Save changes</button>

            </div>
        </div>
    </div>
</div>
<!-- end modal medium -->

<!-- custom javascript -->
<script>
    // $('#form-add').validate();
    // bootstrapValidate('#username','required:Please fill out this field!');
    $('#modal-form').on('hidden.bs.modal', function(e) {
        e.preventDefault();
        $('#username').val('');
        $('#email').val('');
        $('#password').val('');
        $('#telp').val('');
    });                                                
    // jquery request add form   
    $(document).on('click', '#submit-form', function(eve) {

        eve.preventDefault();
        username = $('#username').val();
        email = $('#email').val();
        password = $('#password').val();
        action = $('#form-add').attr('action');
        console.log($('#form-add').serialize());
        if (action == 'tambah') {
            method = 'add';
        } else {
            method = 'update'
        }
        console.log(method);
        if (username != "" && email != "") {
            $('#modal-form').modal('hide');
            Swal.showLoading();
            $.ajax("<?= site_url('user/'); ?>" + method, {
                dataType: 'json',
                type: 'POST',
                data: $('#form-add').serialize(),
                success: function(data) {
                    Swal.fire(data.response,data.message,data.response);
                    if(data.response == 'success'){
                        location.reload();
                    }
                    // if (data.response == 'success') {
                    //     $('#modal-default').modal('hide');
                    //     Swal.fire(
                    //         'Sukses!',
                    //         'File Kamu Sudah Tersimpan',
                    //         'success'
                    //     ).then((result) => {
                    //         location.reload()
                    //     })
                    // } else if (data.response == 'failed') {
                    //     if (data.error) {
                    //         // toastr["error"](data.error);
                    //         Swal.fire('Error', data.error);
                    //     }
                    // }                    
                },
                error: function(e) {                    
                    Swal.fire(
                        'Gagal!',
                        'File Kamu Sudah Tersimpan',
                        'success'
                    ).then((result) => {
                        location.reload()
                    })
                }
            });
        } else {
            if (username == "") {
                $('#username').addClass('is-invalid');
            }
            if (email == "") {
                $('#email').addClass('is-invalid');
            }
            if (password == "") {
                $('#password').addClass('is-invalid');
            }

        }

    });

    function edit(id) {
        var get = getJSON("<?= site_url('user/get'); ?>", {
            id: id
        },false);
        $('#id').val(id);
        $('#username').val(get.data['username']);
        $('#form-add').removeAttr('action');
        $('#form-add').attr('action', 'edit');
        $('#email').val(get.data['email']);
        $('#group').val(get.data['group']);
        $('#telp').val(get.data['telp']);
        $('#modal-form').modal('show');

    }

    function getJSON(url, data,async='true') {
        return JSON.parse($.ajax({
            type: 'POST',
            url: url,
            data: data,
            dataType: 'json',
            global: false,
            async: async,
            beforeSend: () => {
                Swal.showLoading();
            },
            success: function(data) {
                if(data.response){
                    notif(data.response,data.message,'center');
                }else{
                    Swal.close();
                }
            },
            // complete: () => {
            //     Swal.close();
            // }
        }).responseText);
    }

    function del(id) {
        Swal.fire({
            title: 'Apakah Yakin Menghapus User Ini?',
            text: "User Yang dihapus Tidak akan Bisa Dipulihkan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus Saja !!'
        }).then((result) => {
            if (result.isConfirmed) {
                var del = getJSON("<?= site_url('user/delete'); ?>", {
                    id
                });
                if (del.status == 'success') {
                    Swal.fire(
                        'Sukses!',
                        'File Kamu Sudah Terhapus',
                        'success'
                    ).then((result) => {
                        location.reload()
                    })
                }
            }
        })

    }
    $(document).on('click', 'span.option-checker', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('active');
        var text = $(this).hasClass('active') ? 'Aktif' : 'Non-Aktif';
        $(this).children('.text').text(text);
        active = $(this).hasClass('active');
        id = $(this).attr('data-status');
        status = (active) ? '1' : '0';
        console.log(id);
        var status = getJSON('<?= base_url('user/status'); ?>', {
            id,
            status
        });        

    });

    function notif(type, message, position = 'top', timer = 1500, button = false) {
        Swal.fire({
            position: position,
            icon: type,
            title: message,
            showConfirmButton: false,
            timer: timer,
            timerProgressBar: true,
            showConfirmButton: button
        })
    }
</script>