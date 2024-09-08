<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>routing/update" class="user" method="post">
                        <input type="hidden" name="id" class="routing_id" value="<?= $routing[0]->id; ?>" ?>
                        <input type="hidden" name="routing_id" class="routing_id" value="<?= $routing[0]->id; ?>" ?>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-2"><?= $title ?></h4>
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <?= view('\Myth\Auth\Views\_message_block') ?>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-2">
                                            <label for="itemcode" class="col-sm-2 col-form-label"><?= lang('Routing.itemcode'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="itemcode" name="itemcode" value="<?= old('itemcode') ? old('itemcode') : $routing[0]->itemcode ; ?>" />
                                                <input type="hidden" id="itemname" name="itemname" value="<?= old('itemname') ? old('itemname') : $itemname ; ?>" />
                                                <select class="form-control <?php if(session('errors.itemcode')) : ?>is-invalid<?php endif ?>" name="item" id="item" >
                                                    <option selected="selected"><?= old('itemname') ? old('itemname') : $itemname; ?></option>
                                                </select>
                                            </div>
                                            <label for="site" class="col-sm-2 col-form-label"><?= lang('Routing.site'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site" name="site" value="<?= old('site') ? old('site') : $routing[0]->site ; ?>" />
                                                <input type="hidden" id="site_name" name="site_name" value="<?= old('site_name') ? old('site_name') : $site_name ; ?>" />
                                                <select class="form-control <?php if(session('errors.site')) : ?>is-invalid<?php endif ?>" name="site_code" id="site_code" >
                                                    <option selected="selected"><?= $site_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="dept" class="col-sm-2 col-form-label"><?= lang('Routing.dept'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept" name="dept" value="<?= old('dept') ? old('dept') : $routing[0]->dept ; ?>" />
                                                <input type="hidden" id="dept_name" name="dept_name" value="<?= old('dept_name') ? old('dept_name') : $dept_name ; ?>" />
                                                <select class="form-control <?php if(session('errors.dept')) : ?>is-invalid<?php endif ?>" name="dept_code" id="dept_code" >
                                                    <option selected="selected"><?= $dept_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs" class="col-sm-2 col-form-label"><?= lang('Routing.whs'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs" name="whs" value="<?= old('whs') ? old('whs') : $routing[0]->whs ; ?>" />
                                                <input type="hidden" id="whs_name" name="whs_name" value="<?= old('whs_name') ? old('whs_name') : $whs_name ; ?>" />
                                                <select class="form-control <?php if(session('errors.whs')) : ?>is-invalid<?php endif ?>" name="whs_code" id="whs_code" >
                                                    <option selected="selected"><?= $whs_name ?></option>
                                                </select>
                                            </div>                                            
                                        </div>

                                        <div class="row mb-2">
                                            <label for="description" class="col-sm-2 col-form-label"><?= lang('Routing.description'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.description')) : ?>is-invalid<?php endif ?>" id="description" placeholder="<?= lang('Routing.description'); ?>" name="description" value="<?= old('description') ? old('description') : $routing[0]->description ; ?>">
                                            </div>
                                            <label for="transname" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">&nbsp;</div>
                                        </div>

                                        <div class="row justify-content-end">
                                            <div class="col-sm-12">
                                                <div>
                                                    <button type="submit" class="btn btn-primary w-md"><?= lang('Files.Save'); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm">
                                            <h4 class="card-title"><?= $title_child ?></h4>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-auto">
                                            <div class="text-sm-end">
                                                <a href="#" class="btn btn-success btn-rounded" data-id="<?= $routing[0]->id; ?>" id="addDetail-btn"><i class="mdi mdi-plus me-1"></i><?= lang('Files.AddNew'); ?></a>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTableDetail" style="width: 100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th><?= lang('Routing.routeno'); ?></th>
                                                        <th><?= lang('Routing.workcenter'); ?></th>
                                                        <th><?= lang('Routing.routetype'); ?></th>
                                                        <th><?= lang('Routing.hour'); ?></th>
                                                        <th><?= lang('Routing.houruom'); ?></th>
                                                        <th><?= lang('Routing.speed'); ?></th>
                                                        <th><?= lang('Routing.speeduom'); ?></th>
                                                        <th><?= lang('Routing.notes'); ?></th>
                                                        <th style="width: 40px;"><?= lang('Files.active'); ?></th>
                                                        <th style="width: 45px;"></th>
                                                    </tr>
                                                </thead>
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
    
    <form method="post" id="routingDetailForm">
    <div class="modal fade" id="routingDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="routingLabel">Routing Detail</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row mb-2">
                        <label for="routeno" class="col-sm-2 col-form-label"><?= lang('Routing.routeno'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.routeno')) : ?>is-invalid<?php endif ?>" id="routeno" placeholder="<?= lang('Routing.routeno'); ?>" name="routeno" value="<?= old('routeno'); ?>">
                        </div>
                        <label for="workcenter" class="col-sm-2 col-form-label"><?= lang('Routing.workcenter'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="workcenter" name="workcenter" value="<?= old('workcenter'); ?>" />
                            <input type="hidden" id="workcenter_desc" name="workcenter_desc" value="<?= old('workcenter_desc'); ?>" />
                            <select class="form-control <?php if(session('errors.workcenter')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemworkcenter" id="itemworkcenter" >
                                <option selected="selected"><?= old('workcenter_desc'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="routetype" class="col-sm-2 col-form-label"><?= lang('Routing.routetype'); ?></label>
                        <div class="col-sm-4">
                            <select class="form-control <?php if(session('errors.routetype')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="routetype" id="routetype" >
                                <option value="1" selected="<?= old('routetype')=="1" ? "selected" : ""; ?>" >Main</option>
                                <option value="2" selected="<?= old('routetype')=="2" ? "selected" : ""; ?>" >Alt</option>
                            </select>
                        </div>
                        <label for="speed" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-4">
                            &nbsp;
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="hour" class="col-sm-2 col-form-label"><?= lang('Routing.hour'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.hour')) : ?>is-invalid<?php endif ?>" id="hour" placeholder="<?= lang('Routing.hour'); ?>" style="text-align:right;" name="hour" value="<?= number_format((float)(old('hour')), 5, '.', '')  ; ?>">
                        </div>
                        <label for="houruom" class="col-sm-2 col-form-label"><?= lang('Routing.houruom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="houruom" name="houruom" value="<?= old('houruom'); ?>" />
                            <input type="hidden" id="houruom_desc" name="houruom_desc" value="<?= old('houruom_desc'); ?>" />
                            <select class="form-control <?php if(session('errors.houruom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemhouruom" id="itemhouruom" >
                                <option selected="selected"><?= old('houruom_desc'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="speed" class="col-sm-2 col-form-label"><?= lang('Routing.speed'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.speed')) : ?>is-invalid<?php endif ?>" id="speed" placeholder="<?= lang('Routing.speed'); ?>" style="text-align:right;" name="speed" value="<?= number_format((float)(old('speed')), 5, '.', '')  ; ?>">
                        </div>
                        <label for="speeduom" class="col-sm-2 col-form-label"><?= lang('Routing.speeduom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="speeduom" name="speeduom" value="<?= old('speeduom'); ?>" />
                            <input type="hidden" id="speeduom_desc" name="speeduom_desc" value="<?= old('speeduom_desc'); ?>" />
                            <select class="form-control <?php if(session('errors.speeduom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemspeeduom" id="itemspeeduom" >
                                <option selected="selected"><?= old('speeduom_desc'); ?></option>
                            </select>
                        </div>
                    </div>

                </div>
                
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="routing_id" class="routing_id" value="<?= $routing[0]->id; ?>" ?>
                
                    <input type="hidden" name="status" class="status">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form id="routingDetailDeleteForm" method="post">
    <div class="modal fade" id="routingDetailDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemLabel">Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to delete</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="routing_id" class="routing_id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form id="routingDetailActiveForm" method="post">
    <div class="modal fade" id="routingDetailActiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemLabel">Delete</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to <span id="msgActive"></span>.</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="active" class="active">
                    <input type="hidden" name="routing_id" class="routing_id">
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
        $("#routingDetailDeleteForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#routingDetailDeleteForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>routing/deleteDetail',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        dataTableDetail.ajax.reload();
                        $('#routingDetailDeleteModal').modal('hide');
                        alert("Work Center Detail deleted.");

                    } else {
                        if (data.Counter = 9999) {
                            var err="";
                            $.each( data.errors, function( key, value ) {
                                err += value + "\n";
                            });
                            alert(err);
                        }
                    }
                }
            });

        });

        $("#routingDetailActiveForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#routingDetailActiveForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>routing/deleteDetail',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        dataTableDetail.ajax.reload();
                        $('#routingDetailActiveModal').modal('hide');
                        alert("Work Center Detail updated.");

                    } else {
                        if (data.Counter = 9999) {
                            var err="";
                            $.each( data.errors, function( key, value ) {
                                err += value + "\n";
                            });
                            alert(err);
                        }
                    }
                }
            });

        });

        $("#routingDetailForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#routingDetailForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>routing/saveDetail',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        dataTableDetail.ajax.reload();
                        $('#routingDetailModal').modal('hide');
                        alert("Work Center Detail saved.");

                    } else {
                        if (data.Counter = 9999) {
                            var err="";
                            $.each( data.errors, function( key, value ) {
                                err += value + "\n";
                            });
                            alert(err);
                        }
                    }
                }
            });

        });

        $('#dataTableDetail tbody').on('click', '.btn-delete-routing_machine', function() {
            const id = $(this).data('id');
            const routing_id = $(this).data('routing_id');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.routing_id').val(routing_id);

            // Call Modal Edit
            $('#routingDetailDeleteModal').modal('show');
        });

        $('#dataTableDetail tbody').on('click', '.btn-active-routing_machine', function() {
            const id = $(this).data('id');
            const routing_id = $(this).data('routing_id');
            const active = $(this).data('active');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.routing_id').val(routing_id);
            $('.active').val(active);
            if (active == "1") {
                $('#msgActive').text("Inactive");
            } else if (active == "0") {
                $('#msgActive').text("Active");
            }

            // Call Modal Edit
            $('#routingDetailActiveModal').modal('show');
        });

        $('#addDetail-btn').on('click', function() {
            const id = $(this).data('id');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.status').val('1');

            // Call Modal Edit
            $('#routingDetailForm')[0].reset();
            $('#workcenter').val("");
            var uomSelect = $('#itemworkcenter');
            option = new Option("|", "", true, true);
            uomSelect.append(option).trigger('change');
            $('#houruom').val("");
            uomSelect = $('#itemhouruom');
            option = new Option("|", "", true, true);
            uomSelect.append(option).trigger('change');
            $('#speeduom').val("");
            uomSelect = $('#itemspeeduom');
            option = new Option("|", "", true, true);
            uomSelect.append(option).trigger('change');
            $('#routingDetailModal').modal('show');
        });

        $('#dataTableDetail tbody').on('click', '.btn-update-routing_machine', function() {
            const id = $(this).data('id');
            const routing_id = $(this).data('routing_id');
            
            $('.id').val(id);
            $('.routing_id').val(routing_id);
            $('.status').val('2');
            $.ajax({
                url: "<?php echo site_url('routing/getRoutingDetailById') ?>",
                type: "post",
                data: {
                    id : id, 
                } ,
                success: function (response) {
                    var data = $.parseJSON(response); //(jsonStringify);
                    $('#routing_id').val(data[0].routing_id);
                    $('#routeno').val(data[0].routeno);
                    $('#workcenter').val(data[0].workcenter);
                    var uomSelect = $('#itemworkcenter');
                    option = new Option(data[0].workcenter_desc, data[0].workcenter, true, true);
                    uomSelect.append(option).trigger('change');
                    $('#routetype').val(data[0].routetype);
                    $('#hour').val(data[0].hour);
                    $('#houruom').val(data[0].houruom);
                    uomSelect = $('#itemhouruom');
                    option = new Option(data[0].houruom_desc, data[0].houruom, true, true);
                    uomSelect.append(option).trigger('change');
                    $('#speed').val(data[0].speed);
                    $('#speeduom').val(data[0].speeduom);
                    uomSelect = $('#itemspeeduom');
                    option = new Option(data[0].speeduom_desc, data[0].speeduom, true, true);
                    uomSelect.append(option).trigger('change');
                },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

            // Call Modal Edit
            $('#routingDetailModal').modal('show');
        });

        var dataTableDetail = $('#dataTableDetail').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('routing/getRoutingDetail') ?>",
                "type": "POST",
                data: {
                    routing_id: $(".routing_id").val(),
                },
            },
            "columns": [
                {
                    "data": "routeno",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "workcenter",
                    "autoWidth": true,
                    "searchable": true,
                },                
                {
                    "data": "routetype",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "hour",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "houruom_desc",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "speed",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "speeduom_desc",
                    "autoWidth": true,
                    "searchable": true,
                },                
                {
                    "data": "notes",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "active", 
                    "width": "40px",
                    "render": function (data, type, row) {
                        var retVal = "";
                        if (data === null) return "";
                        if (data === "1") {
                            retVal = '<a href="#" class="btn btn-primary btn-circle btn-sm btn-active-routing_machine" title="Click to delete or INACTIVE item" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" data-active="' + row.active + '"><i class="fas fa-check"></i></a>';
                        } else if (data === "0") {
                            retVal = '<a href="#" class="btn btn-danger btn-circle btn-sm btn-active-routing_machine" title="Click to ACTIVE Item" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" data-active="' + row.active + '"><i class="fas fa-times"></i></a>';
                        }

                        return retVal;
                    },
                }, 
                {
                    "data": "no", 
                    "width": "45px",
                    "render": function (data, type, row) {
                        return '<a href="#" class="btn btn-warning btn-circle btn-sm btn-update-routing_machine" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" title="Edit" ><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger btn-circle btn-sm btn-delete-routing_machine" title="Delete" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" ><i class="fas fa-times"></i></a>';
                    }
                },
            ]
        });

        $('#item').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/item/getAll'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data){
                return {
                    results: data
                };
                },
                cache: true
            },
            templateResult: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
            templateSelection: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            }
        }).on('select2:select', function (evt) {
            var data = $("#item option:selected").val();
            $("#itemcode").val(data);
            $("#itemname").val($("#item option:selected").text());
        });

        $('#whs_code').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/warehouse/getByDepartment'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        dept_id: $("#dept").val(),                   
                        page: params.page
                    };
                },
                processResults: function(data){
                return {
                    results: data
                };
                },
                cache: true
            },
            templateResult: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
            templateSelection: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
        }).on('select2:select', function (evt) {
            var data = $("#whs_code option:selected").val();
            $("#whs").val(data);
            $("#whs_name").val($("#whs_code option:selected").text());
        });

        $('#site_code').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/site/getAll'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data){
                return {
                    results: data
                };
                },
                cache: true
            },
            templateResult: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
            templateSelection: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
        }).on('select2:select', function (evt) {
            var data = $("#site_code option:selected").val();
            $("#site").val(data);
            $("#site_name").val($("#site_code option:selected").text());
        });

        $('#dept_code').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/department/getBySite'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        site_id: $("#site").val(),                   
                        page: params.page
                    };
                },
                processResults: function(data){
                return {
                    results: data
                };
                },
                cache: true
            },
            templateResult: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
            templateSelection: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
        }).on('select2:select', function (evt) {
            var data = $("#dept_code option:selected").val();
            $("#dept").val(data);
            $("#dept_name").val($("#dept_code option:selected").text());
        });        

        $('#itemhouruom').select2({
            placeholder: '|',
            minimumInputLength: 0,
            dropdownParent: $('#routingDetailModal'),
            ajax: {
                url: '<?= base_url('/uom/getAll'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data){
                return {
                    results: data
                };
                },
                cache: true
            },
            templateResult: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
            templateSelection: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
        }).on('select2:select', function (evt) {
            $("#houruom_desc").val($("#itemhouruom option:selected").text());
            $("#houruom").val($("#itemhouruom option:selected").val());
        });

        $('#itemspeeduom').select2({
            placeholder: '|',
            minimumInputLength: 0,
            dropdownParent: $('#routingDetailModal'),
            ajax: {
                url: '<?= base_url('/uom/getAll'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data){
                return {
                    results: data
                };
                },
                cache: true
            },
            templateResult: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
            templateSelection: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
        }).on('select2:select', function (evt) {
            $("#speeduom_desc").val($("#itemspeeduom option:selected").text());
            $("#speeduom").val($("#itemspeeduom option:selected").val());
        });

        $('#itemworkcenter').select2({
            placeholder: '|',
            minimumInputLength: 0,
            dropdownParent: $('#routingDetailModal'),
            ajax: {
                url: '<?= base_url('/work_center/getAll'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function(data){
                return {
                    results: data
                };
                },
                cache: true
            },
            templateResult: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
            templateSelection: function(data) {
                var r = data.text.split('|');
                var result = jQuery(
                    '<div class="row">' +
                        '<div class="col-3">' + r[0] + '</div>' +
                        '<div class="col-7">' + r[1] + '</div>' +
                    '</div>'
                );
                return result;
            },
        }).on('select2:select', function (evt) {
            $("#workcenter_desc").val($("#itemworkcenter option:selected").text());
            $("#workcenter").val($("#itemworkcenter option:selected").val());
        });

    });
</script>

<?= $this->endSection() ?>  