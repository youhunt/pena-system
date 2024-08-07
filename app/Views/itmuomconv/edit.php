<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>itmuomconv/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $itmuomconv[0]->id; ?>" ?>

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
                                            <label for="itemcode" class="col-sm-2 col-form-label"><?= lang('ItmUOMConv.itemcode'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="itemcode" name="itemcode" value="<?= old('itemcode') ? old('itemcode') : $itmuomconv[0]->itemcode; ?>" />
                                                <input type="hidden" id="itemname" name="itemname" value="<?= old('itemname') ? old('itemname') : $itemname; ?>" />
                                                <select class="form-control <?php if(session('errors.itemcode')) : ?>is-invalid<?php endif ?>" name="item" id="item" >
                                                    <option selected="selected"><?= old('itemname') ? old('itemname') : $itemname; ?></option>
                                                </select>
                                            </div>
                                            <label for="site" class="col-sm-2 col-form-label"><?= lang('ItmUOMConv.site'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site" name="site" value="<?= old('site') ? old('site') : $itmuomconv[0]->site; ?>" />
                                                <input type="hidden" id="site_name" name="site_name" value="<?= old('site_name') ? old('site_name') : $site_name; ?>" />
                                                <select class="form-control <?php if(session('errors.site')) : ?>is-invalid<?php endif ?>" name="site_code" id="site_code" >
                                                    <option selected="selected"><?= old('site_name') ? old('site_name') : $site_name; ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="dept" class="col-sm-2 col-form-label"><?= lang('ItmUOMConv.dept'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept" name="dept" value="<?= old('dept') ? old('dept') : $itmuomconv[0]->dept; ?>" />
                                                <input type="hidden" id="dept_name" name="dept_name" value="<?= old('dept_name') ? old('dept_name') : $dept_name; ?>" />
                                                <select class="form-control <?php if(session('errors.dept')) : ?>is-invalid<?php endif ?>" name="dept_code" id="dept_code" >
                                                    <option selected="selected"><?= old('dept_name') ? old('dept_name') : $dept_name; ?></option>
                                                </select>
                                            </div>
                                            <label for="whs" class="col-sm-2 col-form-label"><?= lang('ItmUOMConv.whs'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs" name="whs" value="<?= old('whs') ? old('whs') : $itmuomconv[0]->whs; ?>" />
                                                <input type="hidden" id="whs_name" name="whs_name" value="<?= old('whs_name') ? old('whs_name') : $whs_name; ?>" />
                                                <select class="form-control <?php if(session('errors.whs')) : ?>is-invalid<?php endif ?>" name="whs_code" id="whs_code" >
                                                    <option selected="selected"><?= old('whs_name') ? old('whs_name') : $whs_name; ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="fr_uom" class="col-sm-2 col-form-label"><?= lang('ItmUOMConv.fr_uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="fr_uom" name="fr_uom" value="<?= old('fr_uom') ? old('fr_uom') : $itmuomconv[0]->fr_uom; ?>" />
                                                <input type="hidden" id="fr_uom_name" name="fr_uom_name" value="<?= old('fr_uom_name') ? old('fr_uom_name') : $fr_uom_name; ?>" />
                                                <select class="form-control <?php if(session('errors.fr_uom')) : ?>is-invalid<?php endif ?>" name="fruom" id="fruom" >
                                                    <option selected="selected"><?= old('fr_uom_name') ? old('fr_uom_name') : $fr_uom_name; ?></option>
                                                </select>
                                            </div>
                                            <label for="to_uom" class="col-sm-2 col-form-label"><?= lang('ItmUOMConv.to_uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="to_uom" name="to_uom" value="<?= old('to_uom') ? old('to_uom') : $itmuomconv[0]->to_uom; ?>" />
                                                <input type="hidden" id="to_uom_name" name="to_uom_name" value="<?= old('to_uom_name') ? old('to_uom_name') : $to_uom_name; ?>" />
                                                <select class="form-control <?php if(session('errors.to_uom')) : ?>is-invalid<?php endif ?>" name="touom" id="touom" >
                                                    <option selected="selected"><?= old('to_uom_name') ? old('to_uom_name') : $to_uom_name; ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="value" class="col-sm-2 col-form-label"><?= lang('ItmUOMConv.value'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" step="0.01"class="form-control <?php if(session('errors.value')) : ?>is-invalid<?php endif ?>" id="value" placeholder="<?= lang('ItmUOMConv.value'); ?>" name="value" value="<?=  old('value') ? : $itmuomconv[0]->value; ?>">
                                            </div>
                                            <label for="item_width" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">
                                                &nbsp;
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

<?= $this->section('script-js') ?>    

<script type="text/javascript">
     $(document).ready(function(){

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
            }
        }).on('select2:select', function (evt) {
            var data = $("#site_code option:selected").val();
            $("#site").val(data);
            $("#site_name").val($("#site_code option:selected").text());
        });

        $('#dept_code').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/department/getAll'); ?>',
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
            var data = $("#dept_code option:selected").val();
            $("#dept").val(data);
            $("#dept_name").val($("#dept_code option:selected").text());
        });

        $('#whs_code').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/warehouse/getAll'); ?>',
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
            var data = $("#whs_code option:selected").val();
            $("#whs").val(data);
            $("#whs_name").val($("#whs_code option:selected").text());
        });
        
        $('#fruom').select2({
            placeholder: '|<?= lang('ItmUOMConv.fr_uom'); ?>',
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#fruom option:selected").val();
            $("#fr_uom").val(data);
            $("#fr_uom_name").val($("#fruom option:selected").text());
        });

        $('#touom').select2({
            placeholder: '|<?= lang('ItmUOMConv.to_uom'); ?>',
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#touom option:selected").val();
            $("#to_uom").val(data);
            $("#to_uom_name").val($("#touom option:selected").text());
        });

    });
</script>

<?= $this->endSection() ?> 