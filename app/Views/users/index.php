<?= $this->extend('template/index') ?>            

<?= $this->section('page-content') ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="padding: 0 !important;">
                            <nav class="navbar navbar-expand navbar-light bg-light">
                                <a class="navbar-brand m-0 font-weight-bold text-primary" href="#">Users</a>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a class="btn btn-primary" href="<?= base_url(); ?>users/add" id="navbarDropdown"
                                            role="button" >
                                            Add
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Group</th>
                                            <th>Email</th>
                                            <th style="width: 60px;">Active</th>
                                            <th style="width: 90px;"></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Group</th>
                                            <th>Email</th>
                                            <th>Active</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

<?= $this->endSection() ?>  

<?= $this->section('div-modal') ?>
    
    <form action="<?= base_url(); ?>users/activate" method="post">
    <div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to <span id="msgActive"></span>.</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="active" class="active">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="<?= base_url(); ?>users/changeGroup" method="post">
    <div class="modal fade" id="changeGroupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Group</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group-item p-3">
                        <div class="row align-items-start">
                            <div class="col-md-4 mb-8pt mb-md-0">
                                <div class="media align-items-left">
                                    <div class="d-flex flex-column media-body media-middle">
                                        <span
                                            class="card-title">Group</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col mb-8pt mb-md-0">
                                <select name="group" class="form-control" data-toggle="select" >
                                    <?php
                                        foreach($groups as $key => $row){ 
                                    ?>
                                    <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
    </form>
<?= $this->endSection() ?>  

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
        $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('users/getUsers') ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [4, 5],
                    "className": "text-center",
                }, 
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                },
            ],
            "columns": [
                {
                    "data": "id",
                    "autoWidth": true,
                    "searchable": true
                },
                {
                    "data": "username",
                    "autoWidth": true,
                    "searchable": true
                },
                {
                    "data": "group",
                    "autoWidth": true,
                    "searchable": true
                }, {
                    "data": "email",
                    "autoWidth": true,
                    "searchable": true
                }, {
                    "data": "active", render: function (data, type, row) {
                        return '<a href="#" class="btn btn-sm btn-circle btn-active-users" data-id="'  + row.id +'" data-active="' + (row.active == 1 ? 1 : 0) +'" title="Klik untuk Mengaktifkan atau Menonaktifkan">' + (row.active == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>') + '</a>';
                    }
                }, {
                    data: "no", render: function (data, type, row) {
                        return '<a href="<?= base_url(); ?>users/changePassword/' + row.id + '" class="btn btn-warning btn-circle btn-sm" title="Ubah Password" ><i class="fas fa-key"></i></a><a href="#" class="btn btn-danger btn-circle btn-sm btn-change-group" data-id="'+ row.id + '" title="Ubah Grup"><i class="fas fa-tasks"></i></a>';
                    }
                },
            ]
        });
        
        $('#dataTable tbody').on('click', '.btn-active-users', function() {
            const id = $(this).data('id');
            const active = $(this).data('active');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.active').val(active);

            if (active === "1") {
                msgActive

            } else {
                msgActive

            }

            // Call Modal Edit
            $('#activateModal').modal('show');
        });

        $('#dataTable tbody').on('click', '.btn-change-group', function() {
            // get data from button edit
            const id = $(this).data('id');
            
            // Set data to Form Edit
            $('.id').val(id);
            // Call Modal Edit
            $('#changeGroupModal').modal('show');
        });

    });
</script>

<?= $this->endSection() ?>  
