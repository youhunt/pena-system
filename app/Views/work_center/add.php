<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>work_center/save" class="user" method="post">

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
                                            <label for="site" class="col-sm-2 col-form-label"><?= lang('WorkCenter.site'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site" name="site" value="<?= old('site'); ?>" />
                                                <input type="hidden" id="site_name" name="site_name" value="<?= old('site_name'); ?>" />
                                                <select class="form-control <?php if(session('errors.site')) : ?>is-invalid<?php endif ?>" name="site_code" id="site_code" >
                                                    <option selected="selected"><?= old('site_name') ?></option>
                                                </select>
                                            </div>
                                            <label for="dept" class="col-sm-2 col-form-label"><?= lang('WorkCenter.dept'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept" name="dept" value="<?= old('dept'); ?>" />
                                                <input type="hidden" id="dept_name" name="dept_name" value="<?= old('dept_name'); ?>" />
                                                <select class="form-control <?php if(session('errors.dept')) : ?>is-invalid<?php endif ?>" name="dept_code" id="dept_code" >
                                                    <option selected="selected"><?= old('dept_name') ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="warehouse" class="col-sm-2 col-form-label"><?= lang('WorkCenter.warehouse'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="warehouse" name="warehouse" value="<?= old('warehouse'); ?>" />
                                                <input type="hidden" id="warehouse_name" name="warehouse_name" value="<?= old('warehouse_name'); ?>" />
                                                <select class="form-control <?php if(session('errors.warehouse')) : ?>is-invalid<?php endif ?>" name="warehouse_code" id="warehouse_code" >
                                                    <option selected="selected"><?= old('warehouse_name') ?></option>
                                                </select>
                                            </div>
                                            <label for="workcenter" class="col-sm-2 col-form-label"><?= lang('WorkCenter.workcenter'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.workcenter')) : ?>is-invalid<?php endif ?>" id="workcenter" placeholder="<?= lang('WorkCenter.workcenter'); ?>" name="workcenter" value="<?= old('workcenter'); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="description" class="col-sm-2 col-form-label"><?= lang('WorkCenter.description'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.description')) : ?>is-invalid<?php endif ?>" id="description" placeholder="<?= lang('WorkCenter.description'); ?>" name="description" value="<?= old('description'); ?>">
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
        $('#warehouse_code').select2({
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
            var data = $("#warehouse_code option:selected").val();
            $("#warehouse").val(data);
            $("#warehouse_name").val($("#warehouse_code option:selected").text());
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