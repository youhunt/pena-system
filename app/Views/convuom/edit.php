<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>convuom/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $convuom[0]->id; ?>" ?>

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
                                            <label for="site_code" class="col-sm-2 col-form-label"><?= lang('ConvUOM.site_code'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="site_code" name="site_code" value="<?= old('site_code') ? old('site_code') : $loc[0]->site_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.site_code')) : ?>is-invalid<?php endif ?>" name="site" id="site" >
                                                    <option selected="selected"><?= $site_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_code" class="col-sm-2 col-form-label"><?= lang('ConvUOM.dept_code'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="dept_code" name="dept_code" value="<?= old('dept_code') ? old('dept_code') : $loc[0]->dept_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.dept_code')) : ?>is-invalid<?php endif ?>" name="dept" id="dept" >
                                                    <option selected="selected"><?= $dept_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_code" class="col-sm-2 col-form-label"><?= lang('ConvUOM.whs_code'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="whs_code" name="whs_code" value="<?= old('whs_code') ? old('whs_code') : $loc[0]->whs_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.whs_code')) : ?>is-invalid<?php endif ?>" name="whs" id="whs" >
                                                    <option selected="selected"><?= $whs_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="fr_uom" class="col-sm-2 col-form-label"><?= lang('ConvUOM.fr_uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.fr_uom')) : ?>is-invalid<?php endif ?>" id="fr_uom" placeholder="<?= lang('ConvUOM.fr_uom'); ?>" name="fr_uom" value="<?= old('fr_uom') ? old('fr_uom') : $convuom[0]->fr_uom; ?>">
                                            </div>
                                            <label for="to_uom" class="col-sm-2 col-form-label"><?= lang('ConvUOM.to_uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.to_uom')) : ?>is-invalid<?php endif ?>" id="comp_code" placeholder="<?= lang('ConvUOM.to_uom'); ?>" name="to_uom" value="<?= old('to_uom') ? old('to_uom') : $convuom[0]->to_uom; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="value" class="col-sm-2 col-form-label"><?= lang('ConvUOM.value'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control <?php if(session('errors.value')) : ?>is-invalid<?php endif ?>" id="value" placeholder="<?= lang('ConvUOM.value'); ?>" name="value" value="<?= old('value') ? old('value') : $convuom[0]->value; ?>">
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

        $('#site').select2({
            placeholder: '',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/site/getByCompany'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        company_id: $("#comp_code").val(),                     
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
            var data = $("#site option:selected").val();
            $("#site_code").val(data);
        });

        $('#dept').select2({
            placeholder: '',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/department/getBySite'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        site_id: $("#site_code").val(),                   
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
            var data = $("#dept option:selected").val();
            $("#dept_code").val(data);
        });

        $('#whs').select2({
            placeholder: '',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/warehouse/getByDepartment'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        dept_id: $("#dept_code").val(),                   
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
            var data = $("#whs option:selected").val();
            $("#whs_code").val(data);
        });
        
        $('#fruom').select2({
            placeholder: '<?= lang('ConvUOM.fr_uom'); ?>',
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
            var data = $("#fruom option:selected").val();
            $("#fr_uom").val(data);
        });

        $('#touom').select2({
            placeholder: '<?= lang('ConvUOM.to_uom'); ?>',
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
            var data = $("#touom option:selected").val();
            $("#to_uom").val(data);
        });

    });
</script>

<?= $this->endSection() ?> 