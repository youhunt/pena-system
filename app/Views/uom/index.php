<?= $this->extend('template/index') ?>            

<?= $this->section('page-content') ?>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3" style="padding: 0 !important;">
                            <nav class="navbar navbar-expand navbar-light bg-light">
                                <a class="navbar-brand m-0 font-weight-bold text-primary" href="#"><?= $title ?></a>
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item dropdown">
                                        <a class="btn btn-primary" href="<?= base_url(); ?>uom/add" id="navbarDropdown"
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
                                            <th>UOM</th>
                                            <th>Description</th>
                                            <th style="width: 90px;"></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>UOM</th>
                                            <th>Description</th>
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
    
    <form action="<?= base_url(); ?>uom/delete" method="post">
    <div class="modal fade" id="uomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uomLabel">Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to delete</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
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
                "url": "<?php echo site_url('uom/getUOM') ?>",
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
                    "data": "uom_code",
                    "autoWidth": true,
                    "searchable": true
                },
                {
                    "data": "uom_desc",
                    "autoWidth": true,
                    "searchable": true
                }, {
                    data: "ID", render: function (data, type, row) {
                        return '<a href="<?= base_url(); ?>uom/edit/' + row.id + '" class="btn btn-warning btn-circle btn-sm" title="Edit" ><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger btn-circle btn-sm btn-delete-uom" title="Delete" data-id="' + row.id + '"><i class="fas fa-times"></i></a>';
                    }
                },
            ]
        });
        
        $('#dataTable tbody').on('click', '.btn-delete-uom', function() {
            const id = $(this).data('id');
            
            // Set data to Form Edit
            $('.id').val(id);

            // Call Modal Edit
            $('#uomModal').modal('show');
        });

    });
</script>

<?= $this->endSection() ?>  
