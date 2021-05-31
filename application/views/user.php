<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Daftar User</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a class="btn btn-app bg-primary" data-toggle="modal" data-target="#modal-default">
                            <i class="fas fa-plus"></i> Tambah
                        </a>

                        <table id="table-user" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>email</th>
                                    <th style="width: 20%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($record as $rc) : ?>
                                    <tr>
                                        <td><?= $rc->username; ?></td>
                                        <td><?= $rc->email; ?></td>
                                        <td>
                                            <div class="form-button-action">

                                                <a onclick="edit(<?= $rc->ID; ?>)" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit User">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a onclick="del(<?= $rc->ID; ?>)" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="tambah" method="post" id="form-add" class="tambah" enctype="multipart/form-data">
                    <div class="row">
                        <input type="hidden" id="id" name="id">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
                            </div>
                            <select class="form-control" id="group" name="group">
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input class="form-control" type="password" id="password" name="password" placeholder="password" />
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" id="submit-form" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- endmodal -->

<!-- custom javascript -->
<script>
    // $('#form-add').validate();
    // bootstrapValidate('#username','required:Please fill out this field!');
    $(function() {

        $('#table-user').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "pageLength": 5
        });
    });

    // profil pic
    $("#profileImage").click(function(e) {
        $("#imageUpload").click();
    });

    function fasterPreview(uploader) {
        if (uploader.files && uploader.files[0]) {
            $('#profileImage').attr('src',
                window.URL.createObjectURL(uploader.files[0]));
        }
    }

    $("#imageUpload").change(function() {
        fasterPreview(this);
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
        if (username != "" && email != "") {
            $.ajax("<?= site_url('user/'); ?>" + method, {
                dataType: 'json',
                type: 'POST',
                data: $('#form-add').serialize(),
                success: function(data) {
                    // alert('sukses');
                    // return console.log(data.post);
                    if (data.response == 'success') {
                        $('#modal-default').modal('hide');
                        Swal.fire(
                            'Sukses!',
                            'File Kamu Sudah Tersimpan',
                            'success'
                        ).then((result) => {
                            location.reload()
                        })
                    } else if (data.response == 'failed') {
                        if (data.error) {
                            toastr["error"](data.error);
                        }
                    }
                    console.log(data);
                },
                error: function(e) {
                    console.log(e.responseText);
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
        });
        $('#id').val(id);
        $('#username').val(get.data['username']);
        $('#form-add').removeAttr('action');
        $('#form-add').attr('action', 'edit');
        $('#email').val(get.data['email']);
        $('#modal-default').modal('show');
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

    function del(id) {        
        var del = getJSON("<?= site_url('user/delete'); ?>", {
            id: id
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
</script>