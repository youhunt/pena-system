<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>bom/save" class="user" method="post">

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
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site" name="site" value="<?= old('site'); ?>" />
                                                <input type="hidden" id="site_name" name="site_name" value="<?= old('site_name'); ?>" />
                                                <select class="form-control <?php if(session('errors.site')) : ?>is-invalid<?php endif ?>" name="site_code" id="site_code" >
                                                    <option selected="selected"><?= old('site_name') ?></option>
                                                </select>
                                            </div>
                                            <label for="dept" class="col-sm-2 col-form-label"><?= lang('BOM.dept'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept" name="dept" value="<?= old('dept'); ?>" />
                                                <input type="hidden" id="dept_name" name="dept_name" value="<?= old('dept_name'); ?>" />
                                                <select class="form-control <?php if(session('errors.dept')) : ?>is-invalid<?php endif ?>" name="dept_code" id="dept_code" >
                                                    <option selected="selected"><?= old('dept_name') ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs" class="col-sm-2 col-form-label"><?= lang('BOM.whs'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs" name="whs" value="<?= old('whs'); ?>" />
                                                <input type="hidden" id="whs_name" name="whs_name" value="<?= old('whs_name'); ?>" />
                                                <select class="form-control <?php if(session('errors.whs')) : ?>is-invalid<?php endif ?>" name="whs_code" id="whs_code" >
                                                    <option selected="selected"><?= old('whs_name') ?></option>
                                                </select>
                                            </div>
                                            <label for="parentcode" class="col-sm-2 col-form-label"><?= lang('BOM.parentcode'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="parentcode" name="parentcode" value="<?= old('parentcode'); ?>" />
                                                <input type="hidden" id="itemname" name="itemname" value="<?= old('itemname'); ?>" />
                                                <select class="form-control <?php if(session('errors.parentcode')) : ?>is-invalid<?php endif ?>" name="item" id="item" >
                                                    <option selected="selected"><?= old('itemname'); ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="type" class="col-sm-2 col-form-label"><?= lang('BOM.type'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="type" name="type" value="<?= old('type'); ?>" />
                                                <select class="form-control <?php if(session('errors.type')) : ?>is-invalid<?php endif ?>" name="type" id="type" >
                                                    <option value="1" <?= (old('type'))=="1" ? "selected" : "" ; ?>><?= lang('BOM.type1'); ?></option>
                                                    <option value="2" <?= (old('type'))=="2" ? "selected" : "" ; ?>><?= lang('BOM.type2'); ?></option>
                                                </select>
                                            </div>
                                            <label for="qty" class="col-sm-2 col-form-label"><?= lang('BOM.qty'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" step="0.01" class="form-control <?php if(session('errors.qty')) : ?>is-invalid<?php endif ?>" id="qty" placeholder="<?= lang('BOM.qty'); ?>" style="text-align:right;" name="qty" value="<?= old('qty') ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="uom" class="col-sm-2 col-form-label"><?= lang('BOM.uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="uom" name="uom" value="<?= old('uom'); ?>" />
                                                <input type="hidden" id="uom_desc" name="uom_desc" value="<?= old('uom_desc'); ?>" />
                                                <select class="form-control <?php if(session('errors.uom')) : ?>is-invalid<?php endif ?>" name="uom_code" id="uom_code" >
                                                    <option selected="selected"><?= old('uom_desc') ; ?></option>
                                                </select>
                                            </div>
                                            <label for="ratio" class="col-sm-2 col-form-label"><?= lang('BOM.ratio'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" step="0.01" class="form-control <?php if(session('errors.ratio')) : ?>is-invalid<?php endif ?>" id="ratio" placeholder="<?= lang('BOM.ratio'); ?>" style="text-align:right;" name="ratio" value="<?= old('ratio'); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="description" class="col-sm-2 col-form-label"><?= lang('BOM.description'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.description')) : ?>is-invalid<?php endif ?>" id="description" placeholder="<?= lang('BOM.description'); ?>" name="description" value="<?= old('description'); ?>">
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
<?= $this->endSection() ?>

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
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
            },
        }).on('select2:select', function (evt) {
            var data = $("#item option:selected").val();
            $("#parentcode").val(data);
            $("#itemname").val($("#item option:selected").text());
        });

        $('#uom_code').select2({
            placeholder: '|',
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
            var data = $("#uom_code option:selected").val();
            $("#uom").val(data);
            $("#uom_desc").val($("#uom_code option:selected").text());
        });

    });
</script>

<?= $this->endSection() ?>  