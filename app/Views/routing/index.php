<?= $this->extend('template/index') ?>            

<?= $this->section('page-content') ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm">
                                            <h4 class="card-title"><?= $title ?></h4>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-auto">
                                            <div class="text-sm-end">
                                                <a href="<?= base_url(); ?>routing/add" class="btn btn-success btn-rounded" id="addProject-btn"><i class="mdi mdi-plus me-1"></i><?= lang('Files.AddNew'); ?></a>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th><?= lang('Routing.id'); ?></th>
                                                        <th><?= lang('Routing.itemcode'); ?></th>
                                                        <th><?= lang('Routing.site'); ?></th>
                                                        <th><?= lang('Routing.dept'); ?></th>
                                                        <th><?= lang('Routing.whs'); ?></th>
                                                        <th><?= lang('Routing.description'); ?></th>
                                                        <th style="width: 40px;"><?= lang('Files.active'); ?></th>
                                                        <th style="width: 45px;"></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><?= lang('Routing.id'); ?></th>
                                                        <th><?= lang('Routing.itemcode'); ?></th>
                                                        <th><?= lang('Routing.site'); ?></th>
                                                        <th><?= lang('Routing.dept'); ?></th>
                                                        <th><?= lang('Routing.whs'); ?></th>
                                                        <th><?= lang('Routing.description'); ?></th>
                                                        <th style="width: 40px;"><?= lang('Files.active'); ?></th>
                                                        <th style="width: 45px;"></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

<?= $this->endSection() ?>  

<?= $this->section('div-modal') ?>
    
    <form action="<?= base_url(); ?>routing/delete" method="post">
    <div class="modal fade" id="routingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="routingModal">Delete</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to delete</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="active" class="active" value="1">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="<?= base_url(); ?>routing/delete" method="post">
    <div class="modal fade" id="routingActiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="routingLabel">Delete</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to <span id="msgActive"></span>.</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="active" class="active">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">No</button>
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
            "scrollX": true,
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('routing/getRouting') ?>",
                "type": "POST"
            },
            "columns": [
                {
                    "data": "id",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "itemcode",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "site",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "dept",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "whs",
                    "autoWidth": true,
                    "searchable": true,
                },                
                {
                    "data": "description",
                    "autoWidth": true,
                    "searchable": true,
                }, 
                {
                    "data": "active", 
                    "render": function (data, type, row) {
                        var retVal = "";
                        if (data === null) return "";
                        if (data === "1") {
                            retVal = '<a href="#" class="btn btn-primary btn-circle btn-sm btn-active-routing" title="Click to delete or INACTIVE item" data-id="' + row.id + '" data-active="' + row.active + '"><i class="fas fa-check"></i></a>';
                        } else if (data === "0") {
                            retVal = '<a href="#" class="btn btn-danger btn-circle btn-sm btn-active-routing" title="Click to ACTIVE Item" data-id="' + row.id + '" data-active="' + row.active + '"><i class="fas fa-times"></i></a>';
                        }

                        return retVal;
                    },
                }, 
                {
                    data: "no", render: function (data, type, row) {
                        return '<a href="<?= base_url(); ?>routing/edit/' + row.id + '" class="btn btn-warning btn-circle btn-sm" title="Edit" ><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger btn-circle btn-sm btn-delete-routing" title="Delete" data-id="' + row.id + '"><i class="fas fa-times"></i></a>';
                    }
                },
            ]
        });
        
        $('#dataTable tbody').on('click', '.btn-delete-routing', function() {
            const id = $(this).data('id');
            
            // Set data to Form Edit
            $('.id').val(id);

            // Call Modal Edit
            $('#routingModal').modal('show');
        });

        $('#dataTable tbody').on('click', '.btn-active-routing', function() {
            const id = $(this).data('id');
            const active = $(this).data('active');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.active').val(active);
            if (active == "1") {
                $('#msgActive').text("Inactive");
            } else if (active == "0") {
                $('#msgActive').text("Active");
            }

            // Call Modal Edit
            $('#routingActiveModal').modal('show');
        });

    });
</script>

<?= $this->endSection() ?>  
