<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form id="invForm" class="user" method="post">

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
                                            <label for="trans_code" class="col-sm-2 col-form-label"><?= lang('InvTrans.trans_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="trans_code" name="trans_code" value="" />
                                                <select class="form-control <?php if(session('errors.trans_code')) : ?>is-invalid<?php endif ?>" name="transcode" id="transcode" >
                                                    <option selected="selected"></option>
                                                </select>
                                            </div>
                                            <label for="trans_no" class="col-sm-2 col-form-label"><?= lang('InvTrans.trans_no'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.trans_no')) : ?>is-invalid<?php endif ?>" id="trans_no" placeholder="<?= lang('InvTrans.trans_no'); ?>" name="trans_no" value="<?= old('trans_no'); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-sm">
                                                &nbsp;
                                            </div>
                                            <!-- end col -->
                                            <div class="col-sm-auto">
                                                <div class="text-sm-end">
                                                    <a href="#" class="btn btn-success btn-rounded" id="addInvTrans-btn"><i class="mdi mdi-plus me-1"></i><?= lang('Files.AddNew'); ?></a>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>

                                        <div class="row mb-2">
                                            <div class="row mb-2">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="invtransData" width="100%" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th><?= lang('InvTrans.item_code'); ?></th>
                                                                <th><?= lang('InvTrans.loc_code'); ?></th>
                                                                <th><?= lang('InvTrans.batch_no'); ?></th>
                                                                <th><?= lang('InvTrans.multiplier'); ?></th>
                                                                <th><?= lang('InvTrans.divider'); ?></th>
                                                                <th><?= lang('InvTrans.qtyunit'); ?></th>
                                                                <th><?= lang('InvTrans.stockunit_uom'); ?></th>
                                                                <th><?= lang('InvTrans.qty'); ?></th>
                                                                <th><?= lang('InvTrans.stock_uom'); ?></th>
                                                                <th><?= lang('InvTrans.description'); ?></th>
                                                                <th><?= lang('InvTrans.length'); ?></th>
                                                                <th><?= lang('InvTrans.luom'); ?></th>
                                                                <th><?= lang('InvTrans.width'); ?></th>
                                                                <th><?= lang('InvTrans.wuom'); ?></th>
                                                                <th><?= lang('InvTrans.height'); ?></th>
                                                                <th><?= lang('InvTrans.huom'); ?></th>
                                                                <th><?= lang('InvTrans.diameter'); ?></th>
                                                                <th><?= lang('InvTrans.duom'); ?></th>
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
                    
<?= $this->endSection() ?> 

<?= $this->section('div-modal') ?>
    
    <form id="invtransForm" method="post">
    <div class="modal fade" id="invtransModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invtransLabel">Add New</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <label for="item" class="col-sm-2 col-form-label"><?= lang('InvTrans.item_code'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="item_code" name="item_code" value="<?= old('item_code') ? old('item_code') : ""; ?>" />
                            <input type="hidden" id="itemname" name="itemname" value="<?= old('itemname') ? old('itemname') : ""; ?>" />
                            <select class="form-control <?php if(session('errors.item_code')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="item" id="item" >
                                <option selected="selected"><?= old('itemname') ? old('itemname') : ""; ?></option>
                            </select>
                        </div>
                        <label for="loc_code" class="col-sm-2 col-form-label"><?= lang('InvTrans.loc_code'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="loc_code" name="loc_code" value="<?= old('loc_code') ? old('loc_code') : ""; ?>" />
                            <input type="hidden" id="locname" name="locname" value="<?= old('locname') ? old('locname') : ""; ?>" />
                            <select class="form-control <?php if(session('errors.loc_code')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="loc" id="loc" >
                                <option selected="selected"><?= old('locname') ? old('locname') : ""; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="batch_no" class="col-sm-2 col-form-label"><?= lang('InvTrans.batch_no'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.batch_no')) : ?>is-invalid<?php endif ?>" id="batch_no" placeholder="<?= lang('InvTrans.batch_no'); ?>" name="batch_no" value="<?= old('batch_no') ?>">
                        </div>
                        <label for="multiplier" class="col-sm-2 col-form-label"><?= lang('InvTrans.multiplier'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.multiplier')) : ?>is-invalid<?php endif ?>" id="multiplier" placeholder="<?= lang('InvTrans.multiplier'); ?>" style="text-align:right;" name="multiplier" value="<?= number_format((float)(old('multiplier')), 5, '.', ''); ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="divider" class="col-sm-2 col-form-label"><?= lang('InvTrans.divider'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.divider')) : ?>is-invalid<?php endif ?>" id="divider" placeholder="<?= lang('InvTrans.divider'); ?>" style="text-align:right;" name="divider" value="<?= number_format((float)(old('divider')), 5, '.', ''); ?>">
                        </div>
                        <div class="col-sm-6">
                            &nbsp;
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="qtyunit" class="col-sm-2 col-form-label"><?= lang('InvTrans.qtyunit'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.qtyunit')) : ?>is-invalid<?php endif ?>" id="qtyunit" placeholder="<?= lang('InvTrans.qtyunit'); ?>" style="text-align:right;" name="qtyunit" value="<?= number_format((float)(old('qtyunit')), 5, '.', ''); ?>">
                        </div>
                        <label for="stockunit_uom" class="col-sm-2 col-form-label"><?= lang('InvTrans.stockunit_uom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="stockunit_uom" name="stockunit_uom" value="" />
                            <select class="form-control <?php if(session('errors.stockunit_uom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="suuom" id="suuom" ></select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="qty" class="col-sm-2 col-form-label"><?= lang('InvTrans.qty'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.qty')) : ?>is-invalid<?php endif ?>" id="qty" placeholder="<?= lang('InvTrans.qty'); ?>" style="text-align:right;" name="qty" value="<?= number_format((float)(old('qty')), 5, '.', ''); ?>">
                        </div>
                        <label for="stock_uom" class="col-sm-2 col-form-label"><?= lang('InvTrans.stock_uom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="stock_uom" name="stock_uom" value="" />
                            <select class="form-control <?php if(session('errors.stock_uom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="suom" id="suom" ></select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="description" class="col-sm-2 col-form-label"><?= lang('InvTrans.description'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.description')) : ?>is-invalid<?php endif ?>" id="description" placeholder="<?= lang('InvTrans.description'); ?>" name="description" value="<?= old('description') ?>">
                        </div>
                        <div class="col-sm-6">
                            &nbsp;
                        </div>
                    </div>
                    
                    <div class="row mb-1">
                        <label for="length" class="col-sm-2 col-form-label"><?= lang('InvTrans.length'); ?></label>
                        <div class="col-sm-2">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.length')) : ?>is-invalid<?php endif ?>" id="length" placeholder="<?= lang('InvTrans.length'); ?>" name="length" style="text-align:right;" value="<?= number_format((float)(old('length')), 5, '.', ''); ?>">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" id="luom" name="luom" value="" />
                            <select class="form-control <?php if(session('errors.luom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="lengthuom" id="lengthuom" ></select>
                        </div>
                        <label for="width" class="col-sm-2 col-form-label"><?= lang('InvTrans.width'); ?></label>
                        <div class="col-sm-2">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.width')) : ?>is-invalid<?php endif ?>" id="width" placeholder="<?= lang('InvTrans.width'); ?>" name="width" style="text-align:right;" value="<?= number_format((float)(old('width')), 5, '.', ''); ?>">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" id="wuom" name="wuom" value="" />
                            <select class="form-control <?php if(session('errors.wuom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="widthuom" id="widthuom" ></select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <label for="height" class="col-sm-2 col-form-label"><?= lang('InvTrans.height'); ?></label>
                        <div class="col-sm-2">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.height')) : ?>is-invalid<?php endif ?>" id="height" placeholder="<?= lang('InvTrans.height'); ?>" name="height" style="text-align:right;" value="<?= number_format((float)(old('height')), 5, '.', ''); ?>">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" id="huom" name="huom" value="" />
                            <select class="form-control <?php if(session('errors.huom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="heightuom" id="heightuom" ></select>
                        </div>
                        <label for="diameter" class="col-sm-2 col-form-label"><?= lang('InvTrans.diameter'); ?></label>
                        <div class="col-sm-2">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.diameter')) : ?>is-invalid<?php endif ?>" id="diameter" placeholder="<?= lang('InvTrans.diameter'); ?>" name="diameter" style="text-align:right;" value="<?= number_format((float)(old('diameter')), 5, '.', ''); ?>">
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" id="duom" name="duom" value="" />
                            <select class="form-control <?php if(session('errors.duom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="diameteruom" id="diameteruom" ></select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" class="trans_code" name="trans_code" value="" />
                    <input type="hidden" class="trans_no" name="trans_no" value="" />

                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    </form>

<?= $this->endSection() ?>  

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
        //invtransModal

        var invtransData = $('#invtransData').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('invtrans/getTrans') ?>",
                "type": "POST"
            },
            "columns": [
                { "data": "itemname", "autoWidth": true, "searchable": true },
                { "data": "locname", "autoWidth": true, "searchable": true },
                { "data": "batch_no", "autoWidth": true, "searchable": true },
                { "data": "multiplier", "autoWidth": true, "searchable": true },
                { "data": "divider", "autoWidth": true, "searchable": true },
                { "data": "qtyunit", "autoWidth": true, "searchable": true },
                { "data": "stockunit_uom", "autoWidth": true, "searchable": true },
                { "data": "qty", "autoWidth": true, "searchable": true },
                { "data": "stock_uom", "autoWidth": true, "searchable": true },
                { "data": "description", "autoWidth": true, "searchable": true },
                { "data": "length", "autoWidth": true, "searchable": true },
                { "data": "luom", "autoWidth": true, "searchable": true },
                { "data": "width", "autoWidth": true, "searchable": true },
                { "data": "wuom", "autoWidth": true, "searchable": true },
                { "data": "height", "autoWidth": true, "searchable": true },
                { "data": "huom", "autoWidth": true, "searchable": true },
                { "data": "diameter", "autoWidth": true, "searchable": true },
                { "data": "duom", "autoWidth": true, "searchable": true },
                {
                    data: "ID", render: function (data, type, row) {
                        return '<a href="<?= base_url(); ?>invtrans/edit/' + row.id + '" class="btn btn-warning btn-circle btn-sm" title="Edit" ><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger btn-circle btn-sm btn-delete-invtrans" title="Delete" data-id="' + row.id + '"><i class="fas fa-times"></i></a>';
                    }
                },
            ]
        });
        
        $("#invForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#invForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>invtrans/save',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        alert("Inventory Transactions saved.");
                        window.location.href = "<?= base_url(); ?>invtrans/index";
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

        $("#invtransForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#invtransForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>invtrans/saveTrans',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        invtransData.ajax.reload();
                        $('#invtransModal').modal('hide');
                        alert("Inventory Transactions saved.");

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

        $('#addInvTrans-btn').on('click', function() {

            var trans_code = $("#trans_code").val();
            var trans_no = $("#trans_no").val();

            if (trans_code ==='' || trans_no ==='') {
                alert("TransCode and TransNo required.");
            } else {
                $('.trans_code').val(trans_code);
                $('.trans_no').val(trans_no);

                $('#invtransModal').modal('show');
            }
            
        });

        $('#transcode').select2({
            placeholder: '|<?= lang('InvTrans.trans_code'); ?>',
            minimumInputLength: 0,
            allowClear: true,
            ajax: {
                url: '<?= base_url('/transactioncode/getAll'); ?>',
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
            var data = $("#transcode option:selected").val();
            $("#trans_code").val(data);
            $("#transname").val($("#transcode option:selected").text());
            
            $.ajax({
                url: "<?php echo site_url('invtrans/getTransNo') ?>",
                type: "post",
                success: function (response) {
                    var data = $.parseJSON(response); 
                    $('#trans_no').val(data.data);
                    
                },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }).on('select2:unselecting', function (evt) {
            var data = "";
            $("#trans_code").val(data);
            $("#transname").val(data);
        });

        $('#item').select2({
            placeholder: '|',
            minimumInputLength: 0,
            allowClear: true,
            dropdownParent: $('#invtransModal'),
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
            $("#item_code").val(data);
            $("#itemname").val($("#item option:selected").text());
        }).on('select2:unselecting', function (evt) {
            var data = "";
            $("#item_code").val(data);
            $("#itemname").val(data);
        });

        $('#loc').select2({
            placeholder: '|',
            minimumInputLength: 0,
            allowClear: true,
            dropdownParent: $('#invtransModal'),
            ajax: {
                url: '<?= base_url('/location/getAll'); ?>',
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
            var data = $("#loc option:selected").val();
            $("#loc_code").val(data);
            $("#locname").val($("#loc option:selected").text());
        }).on('select2:unselecting', function (evt) {
            var data = "";
            $("#loc_code").val(data);
            $("#locname").val(data);
        });

        $('#lengthuom').select2({
            placeholder: '|<?= lang('InvTrans.luom'); ?>',
            minimumInputLength: 0,
            allowClear: true,
            dropdownParent: $('#invtransModal'),
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
            var data = $("#lengthuom option:selected").val();
            $("#luom").val(data);
        }).on('select2:unselecting', function (evt) {
            var data = "";
            $("#luom").val(data);
        });

        $('#widthuom').select2({
            placeholder: '|<?= lang('InvTrans.wuom'); ?>',
            minimumInputLength: 0,
            allowClear: true,
            dropdownParent: $('#invtransModal'),
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
            var data = $("#widthuom option:selected").val();
            $("#wuom").val(data);
        }).on('select2:unselecting', function (evt) {
            var data = "";
            $("#wuom").val(data);
        });

        $('#heightuom').select2({
            placeholder: '|<?= lang('InvTrans.huom'); ?>',
            allowClear: true,
            dropdownParent: $('#invtransModal'),
            minimumInputLength: 0,
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
            var data = $("#heightuom option:selected").val();
            $("#huom").val(data);
        }).on('select2:unselecting', function (evt) {
            var data = "";
            $("#huom").val(data);
        });

        $('#diameteruom').select2({
            placeholder: '|<?= lang('InvTrans.duom'); ?>',
            minimumInputLength: 0,
            dropdownParent: $('#invtransModal'),
            allowClear: true,
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
            var data = $("#diameteruom option:selected").val();
            $("#duom").val(data);
        }).on('select2:unselecting', function (evt) {
            var data = "";
            $("#duom").val(data);
        });

        $('#suuom').select2({
            placeholder: '|<?= lang('InvTrans.stockunit_uom'); ?>',
            minimumInputLength: 0,
            dropdownParent: $('#invtransModal'),
            allowClear: true,
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
            var data = $("#suuom option:selected").val();
            $("#stockunit_uom").val(data);
        }).on('select2:unselecting', function (evt) {
            var data = "";
            $("#stockunit_uom").val(data);
        });

        $('#suom').select2({
            placeholder: '|<?= lang('InvTrans.stock_uom'); ?>',
            minimumInputLength: 0,
            dropdownParent: $('#invtransModal'),
            allowClear: true,
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
            var data = $("#suom option:selected").val();
            $("#stock_uom").val(data);
        }).on('select2:unselecting', function (evt) {
            var data = "";
            $("#stock_uom").val(data);
        });
    });

</script>

<?= $this->endSection() ?>  
