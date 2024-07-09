<?= $this->extend('template/index') ?>            

<?= $this->section('page-content') ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">States</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th style="width: 90px;"></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>State</th>
                                            <th>Country</th>
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
                <div class="modal-body">Pilih "Ya" untuk mengupdate User</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="active" class="active">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
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
                "url": "<?php echo site_url('states/getStates') ?>",
                "type": "POST"
            },
            "columnDefs": [
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
                    "data": "name",
                    "autoWidth": true,
                    "searchable": true
                },
                {
                    "data": "country",
                    "autoWidth": true,
                    "searchable": true
                }, {
                    data: "no", render: function (data, type, row) {
                        return '<a href="<?= base_url(); ?>states/edit/' + row.id + '" class="btn btn-warning btn-circle btn-sm" title="Edit" ><i class="fas fa-edit"></i></a><a href="<?= base_url(); ?>cities/add/' + row.id + '" class="btn btn-danger btn-circle btn-sm" title="Add States"><i class="fas fa-tasks"></i></a>';
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
