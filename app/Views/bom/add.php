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
                                            <div class="col-sm-6">
                                                <input type="hidden" id="site" name="site" value="<?= old('site'); ?>" />
                                                <select class="form-control <?php if(session('errors.site')) : ?>is-invalid<?php endif ?>" name="site_name" id="site_name" >
                                                    <option selected="selected"><?= old('site_name') ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept" class="col-sm-2 col-form-label"><?= lang('BOM.dept'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="dept" name="dept" value="<?= old('dept'); ?>" />
                                                <select class="form-control <?php if(session('errors.dept')) : ?>is-invalid<?php endif ?>" name="dept_name" id="dept_name" >
                                                    <option selected="selected"><?= old('dept_name') ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs" class="col-sm-2 col-form-label"><?= lang('BOM.whs'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="whs" name="whs" value="<?= old('whs'); ?>" />
                                                <select class="form-control <?php if(session('errors.whs')) : ?>is-invalid<?php endif ?>" name="whs_name" id="whs_name" >
                                                    <option selected="selected"><?= old('whs_name') ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="parentcode" class="col-sm-2 col-form-label"><?= lang('BOM.parentcode'); ?></label>
                                            <div class="col-sm-6">
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
                                                <input type="number" class="form-control <?php if(session('errors.qty')) : ?>is-invalid<?php endif ?>" id="qty" placeholder="<?= lang('BOM.qty'); ?>" style="text-align:right;" name="qty" value="<?= old('qty') ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="uom" class="col-sm-2 col-form-label"><?= lang('BOM.uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="uom" name="uom" value="<?= old('uom'); ?>" />
                                                <select class="form-control <?php if(session('errors.uom')) : ?>is-invalid<?php endif ?>" name="uom_desc" id="uom_desc" >
                                                    <option selected="selected"><?= old('uom_desc') ; ?></option>
                                                </select>
                                            </div>
                                            <label for="ratio" class="col-sm-2 col-form-label"><?= lang('BOM.ratio'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control <?php if(session('errors.ratio')) : ?>is-invalid<?php endif ?>" id="ratio" placeholder="<?= lang('BOM.ratio'); ?>" style="text-align:right;" name="ratio" value="<?= old('ratio'); ?>">
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
            $("#site").val(data);
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

    });
</script>

<?= $this->endSection() ?>  