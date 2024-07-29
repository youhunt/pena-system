<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>bom/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $bom[0]->id; ?>" ?>

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4"><?= $title ?></h4>
                                        <div class="row mb-4">
                                            <div class="col-sm-12">
                                                <?= view('\Myth\Auth\Views\_message_block') ?>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-4">
                                            <label for="site" class="col-sm-2 col-form-label"><?= lang('BOM.site'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="site" name="site" value="<?= old('site') ? old('site') : $bom[0]->site ; ?>" />
                                                <select class="form-control <?php if(session('errors.site')) : ?>is-invalid<?php endif ?>" name="site_name" id="site_name" >
                                                    <option selected="selected"><?= $site_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept" class="col-sm-2 col-form-label"><?= lang('BOM.dept'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="dept" name="dept" value="<?= old('dept') ? old('dept') : $bom[0]->dept ; ?>" />
                                                <select class="form-control <?php if(session('errors.dept')) : ?>is-invalid<?php endif ?>" name="dept_name" id="dept_name" >
                                                    <option selected="selected"><?= $dept_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs" class="col-sm-2 col-form-label"><?= lang('BOM.whs'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="whs" name="whs" value="<?= old('whs') ? old('whs') : $bom[0]->whs ; ?>" />
                                                <select class="form-control <?php if(session('errors.whs')) : ?>is-invalid<?php endif ?>" name="whs_name" id="whs_name" >
                                                    <option selected="selected"><?= $whs_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="parentcode" class="col-sm-2 col-form-label"><?= lang('BOM.parentcode'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="parentcode" name="parentcode" value="<?= old('parentcode') ? old('parentcode') : $bom[0]->parentcode ; ?>" />
                                                <input type="hidden" id="itemname" name="itemname" value="<?= $itemname; ?>" />
                                                <select class="form-control <?php if(session('errors.parentcode')) : ?>is-invalid<?php endif ?>" name="item" id="item" >
                                                    <option selected="selected"><?= $itemname; ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="type" class="col-sm-2 col-form-label"><?= lang('BOM.type'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="type" name="type" value="<?= old('type') ? old('type') : $bom[0]->type ; ?>" />
                                                <select class="form-control <?php if(session('errors.type')) : ?>is-invalid<?php endif ?>" name="type" id="type" >
                                                    <option value="1" <?= (old('type') ? old('type') : $bom[0]->type)=="1" ? "selected" : "" ; ?>><?= lang('BOM.type1'); ?></option>
                                                    <option value="2" <?= (old('type') ? old('type') : $bom[0]->type)=="2" ? "selected" : "" ; ?>><?= lang('BOM.type2'); ?></option>
                                                </select>
                                            </div>
                                            <label for="qty" class="col-sm-2 col-form-label"><?= lang('BOM.qty'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control <?php if(session('errors.qty')) : ?>is-invalid<?php endif ?>" id="qty" placeholder="<?= lang('BOM.qty'); ?>" style="text-align:right;" name="qty" value="<?= old('qty') ? old('qty') : $bom[0]->qty ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="uom" class="col-sm-2 col-form-label"><?= lang('BOM.uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="uom" name="uom" value="<?= old('uom') ? old('uom') : $bom[0]->uom  ; ?>" />
                                                <select class="form-control <?php if(session('errors.uom')) : ?>is-invalid<?php endif ?>" name="uom_desc" id="uom_desc" >
                                                    <option selected="selected"><?= old('uom_desc') ? old('uom_desc') : $uom_desc  ; ?></option>
                                                </select>
                                            </div>
                                            <label for="ratio" class="col-sm-2 col-form-label"><?= lang('BOM.ratio'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control <?php if(session('errors.ratio')) : ?>is-invalid<?php endif ?>" id="ratio" placeholder="<?= lang('BOM.ratio'); ?>" style="text-align:right;" name="ratio" value="<?= old('ratio') ? old('ratio') : $bom[0]->ratio ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="description" class="col-sm-2 col-form-label"><?= lang('BOM.description'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.description')) : ?>is-invalid<?php endif ?>" id="description" placeholder="<?= lang('BOM.description'); ?>" name="description" value="<?= old('description') ? old('description') : $bom[0]->description ; ?>">
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
                                                <a href="#" class="btn btn-success btn-rounded" data-id="<?= $bom[0]->id; ?>" id="addChild-btn"><i class="mdi mdi-plus me-1"></i><?= lang('Files.AddNew'); ?></a>
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
                                                        <th><?= lang('BOM.childno'); ?></th>
                                                        <th><?= lang('BOM.childcode'); ?></th>
                                                        <th><?= lang('BOM.childtype'); ?></th>
                                                        <th><?= lang('BOM.qtyused'); ?></th>
                                                        <th><?= lang('BOM.childuom'); ?></th>
                                                        <th><?= lang('BOM.factor'); ?></th>
                                                        <th><?= lang('BOM.childdescription'); ?></th>
                                                        <th style="width: 40px;"><?= lang('Files.active'); ?></th>
                                                        <th style="width: 45px;"></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><?= lang('BOM.childno'); ?></th>
                                                        <th><?= lang('BOM.childcode'); ?></th>
                                                        <th><?= lang('BOM.childtype'); ?></th>
                                                        <th><?= lang('BOM.qtyused'); ?></th>
                                                        <th><?= lang('BOM.childuom'); ?></th>
                                                        <th><?= lang('BOM.factor'); ?></th>
                                                        <th><?= lang('BOM.childdescription'); ?></th>
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
    
    <form action="<?= base_url(); ?>bom/saveChild" method="post">
    <div class="modal fade" id="bomChildModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bomLabel">BOM Child</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row mb-4">
                        <label for="childno" class="col-sm-2 col-form-label"><?= lang('BOM.childno'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.childno')) : ?>is-invalid<?php endif ?>" id="childno" placeholder="<?= lang('BOM.childno'); ?>" name="childno" value="<?= old('childno'); ?>">
                        </div>
                        <label for="childcode" class="col-sm-2 col-form-label"><?= lang('BOM.childcode'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="childcode" name="childcode" value="<?= old('childcode'); ?>" />
                            <input type="hidden" id="itemchildname" name="itemchildname" value="<?= old('itemchildname'); ?>" />
                            <select class="form-control <?php if(session('errors.childcode')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemchild" id="itemchild" >
                                <option selected="selected"><?= old('itemchildname'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="childtype" class="col-sm-2 col-form-label"><?= lang('BOM.childtype'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="childtype" name="childtype" value="<?= old('childtype') ; ?>" />
                            <select class="form-control <?php if(session('errors.childtype')) : ?>is-invalid<?php endif ?>" name="childtype" id="childtype" >
                                <option value="1" <?= (old('childtype'))=="1" ? "selected" : "" ; ?>><?= lang('BOM.typechild1'); ?></option>
                                <option value="2" <?= (old('childtype'))=="2" ? "selected" : "" ; ?>><?= lang('BOM.typechild2'); ?></option>
                            </select>
                        </div>
                        <label for="qtyused" class="col-sm-2 col-form-label"><?= lang('BOM.qtyused'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control <?php if(session('errors.qtyused')) : ?>is-invalid<?php endif ?>" id="qtyused" placeholder="<?= lang('BOM.qtyused'); ?>" style="text-align:right;" name="qtyused" value="<?= old('qtyused') ; ?>">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="childuom" class="col-sm-2 col-form-label"><?= lang('BOM.childuom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="childuom" name="childuom" value="<?= old('childuom'); ?>" />
                            <select class="form-control <?php if(session('errors.childuom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="childuom_desc" id="childuom_desc" >
                                <option selected="selected"><?= old('childuom_desc'); ?></option>
                            </select>
                        </div>
                        <label for="factor" class="col-sm-2 col-form-label"><?= lang('BOM.factor'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control <?php if(session('errors.factor')) : ?>is-invalid<?php endif ?>" id="factor" placeholder="<?= lang('BOM.factor'); ?>" style="text-align:right;" name="factor" value="<?= old('factor'); ?>">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="childdescription" class="col-sm-2 col-form-label"><?= lang('BOM.childdescription'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.childdescription')) : ?>is-invalid<?php endif ?>" id="childdescription" placeholder="<?= lang('BOM.childdescription'); ?>" name="childdescription" value="<?= old('childdescription'); ?>">
                        </div>
                        <label for="transname" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-4">&nbsp;</div>
                    </div>

                </div>
                
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="status" class="status">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="<?= base_url(); ?>bom/updateChild" method="post">
    <div class="modal fade" id="updateBomChildModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bomLabel">Update Child</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row mb-4">
                        <label for="childno" class="col-sm-2 col-form-label"><?= lang('BOM.childno'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.childno')) : ?>is-invalid<?php endif ?> childno" placeholder="<?= lang('BOM.childno'); ?>" name="childno" value="<?= old('childno'); ?>">
                        </div>
                        <label for="childcode" class="col-sm-2 col-form-label"><?= lang('BOM.childcode'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" class="childcode" name="childcode" value="<?= old('childcode'); ?>" />
                            <input type="hidden" class="itemchildname" name="itemchildname" value="<?= old('itemchildname'); ?>" />
                            <select class="form-control <?php if(session('errors.childcode')) : ?>is-invalid<?php endif ?> itemchild" style="width: 100%;" name="itemchild">
                                <option selected="selected" class="itemchildname"><?= old('itemchildname'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="childtype" class="col-sm-2 col-form-label"><?= lang('BOM.childtype'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" class="childtype" name="childtype" value="<?= old('childtype') ; ?>" />
                            <select class="form-control <?php if(session('errors.childtype')) : ?>is-invalid<?php endif ?> childtype" name="childtype" >
                                <option value="1" <?= (old('childtype'))=="1" ? "selected" : "" ; ?>><?= lang('BOM.typechild1'); ?></option>
                                <option value="2" <?= (old('childtype'))=="2" ? "selected" : "" ; ?>><?= lang('BOM.typechild2'); ?></option>
                            </select>
                        </div>
                        <label for="qtyused" class="col-sm-2 col-form-label"><?= lang('BOM.qtyused'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control <?php if(session('errors.qtyused')) : ?>is-invalid<?php endif ?> qtyused" placeholder="<?= lang('BOM.qtyused'); ?>" style="text-align:right;" name="qtyused" value="<?= old('qtyused') ; ?>">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="childuom" class="col-sm-2 col-form-label"><?= lang('BOM.childuom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="childuom" name="childuom" value="<?= old('childuom'); ?>" />
                            <select class="form-control <?php if(session('errors.childuom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="childuom_desc" id="childuom_desc" >
                                <option selected="selected" class="childuom_desc" ><?= old('childuom_desc'); ?></option>
                            </select>
                        </div>
                        <label for="factor" class="col-sm-2 col-form-label"><?= lang('BOM.factor'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control <?php if(session('errors.factor')) : ?>is-invalid<?php endif ?> factor" placeholder="<?= lang('BOM.factor'); ?>" style="text-align:right;" name="factor" value="<?= old('factor'); ?>">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="childdescription" class="col-sm-2 col-form-label"><?= lang('BOM.childdescription'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.childdescription')) : ?>is-invalid<?php endif ?> childdescription" placeholder="<?= lang('BOM.childdescription'); ?>" name="childdescription" value="<?= old('childdescription'); ?>">
                        </div>
                        <label for="transname" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-4">&nbsp;</div>
                    </div>

                </div>
                
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    </form>

<?= $this->endSection() ?> 

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
        $('#addChild-btn').on('click', function() {
            const id = $(this).data('id');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.status').val('1');

            // Call Modal Edit
            $('#bomChildModal').modal('show');
        });

        $('#dataTable tbody').on('click', '.btn-update-bom-child', function() {
            const id = $(this).data('id');
            
            // Set data to Form Edit
            $('.status').val('2');
            $('.id').val(id);
            $.ajax({
                url: "<?php echo site_url('bom/getBOMChildById') ?>",
                type: "post",
                data: {
                    id : id
                } ,
                success: function (response) {
                    var data = $.parseJSON(response); //(jsonStringify);
                    $('#childno').val(data[0].childno);
                    $('#childcode').val(data[0].childcode);
                    $("#itemchildname").val(data[0].itemchildname);
                    $(".itemchildname").val(data[0].itemchildname);
                    // $("#itemchild").val(data[0].childcode);
                    //$("#itemchild").select2('data',{id:data[0].childcode,text:data[0].itemchildname}).trigger('change');
                    // $('#itemchild').select2().val(data[0].childcode).trigger('change');
                    // $("#itemchild").val(data[0].childcode);
                    // $("#itemchild").select2().trigger('change'); 
                    // $("#itemchild option:selected").val(data[0].childcode);
                    //$('#itemchild').val([data[0].childcode]).trigger('change');  
                    //$("#itemchild option:selected").val(data[0].childcode);
                    var itemSelect = $('#itemchild');

                    var option = new Option(data[0].itemchildname, data[0].childcode, true, true);
                    itemSelect.append(option).trigger('change');

                    // manually trigger the `select2:select` event
                    itemSelect.trigger({
                        type: 'select2:select',
                        params: {
                            data: data
                        }
                    });
                    var dataopt = {
                        id: data[0].childcode,
                        text: data[0].itemchildname
                    };

                    var newOption = new Option(dataopt.text, dataopt.id, false, false);
                    $('#itemchild').append(newOption).trigger('change');
                    $('#childtype').val(data[0].childtype);
                    $('#qtyused').val(data[0].qtyused);
                    $('#childuom').val(data[0].childuom);
                    $('.childuom_desc').html(data[0].childuom_desc);
                    $('#factor').val(data[0].factor);
                    $('#childdescription').val(data[0].childdescription);
                },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

            // Call Modal Edit
            $('#bomChildModal').modal('show');
        });

        $('#dataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('bom/getBOMChild') ?>",
                "type": "POST",
                data: {
                    bom_id: $("#id").val(),
                },
            },
            "columns": [
                {
                    "data": "childno",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "childcode",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "childtype",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "qtyused",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "childuom",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "factor",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "childdescription",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "active", 
                    "render": function (data, type, row) {
                        var retVal = "";
                        if (data === null) return "";
                        if (data === "1") {
                            retVal = '<a href="#" class="btn btn-primary btn-circle btn-sm btn-active-bom-child" title="Click to delete or INACTIVE item" data-id="' + row.id + '" data-active="' + row.active + '"><i class="fas fa-check"></i></a>';
                        } else if (data === "0") {
                            retVal = '<a href="#" class="btn btn-danger btn-circle btn-sm btn-active-bom-child" title="Click to ACTIVE Item" data-id="' + row.id + '" data-active="' + row.active + '"><i class="fas fa-times"></i></a>';
                        }

                        return retVal;
                    },
                }, 
                {
                    data: "no", render: function (data, type, row) {
                        return '<a href="#" class="btn btn-warning btn-circle btn-sm btn-update-bom-child" data-id="' + row.id + '" title="Edit" ><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger btn-circle btn-sm btn-delete-bom" title="Delete" data-id="' + row.id + '"><i class="fas fa-times"></i></a>';
                    }
                },
            ]
        });

        $('#whs_name').select2({
            placeholder: '',
            minimumInputLength: 1,
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#whs_name option:selected").val();
            $("#whs").val(data);
        });

        $('#site_name').select2({
            placeholder: '',
            minimumInputLength: 1,
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#site_name option:selected").val();
            $("#company").val(data);
        });

        $('#dept_name').select2({
            placeholder: '',
            minimumInputLength: 1,
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#dept_name option:selected").val();
            $("#dept").val(data);
        });

        $('#item').select2({
            placeholder: '',
            minimumInputLength: 1,
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#item option:selected").val();
            $("#parentcode").val(data);
            $("#itemname").val($("#item option:selected").text());
        });

        $('#itemchild').select2({
            placeholder: '',
            minimumInputLength: 1,
            dropdownParent: $('#bomChildModal'),
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#itemchild option:selected").val();
            $("#childcode").val(data);
            $("#itemchildname").val($("#itemchild option:selected").text());
        });

        $('#uom_desc').select2({
            placeholder: '',
            minimumInputLength: 1,
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#uom_desc option:selected").val();
            $("#uom").val(data);
        });

        $('#childuom_desc').select2({
            placeholder: '',
            minimumInputLength: 1,
            dropdownParent: $('#bomChildModal'),
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#childuom_desc option:selected").val();
            $("#childuom").val(data);
        });

    });
</script>

<?= $this->endSection() ?>  