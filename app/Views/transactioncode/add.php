<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>transactioncode/save" class="user" method="post">

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
                                            <label for="company" class="col-sm-2 col-form-label"><?= lang('TransactionCode.company'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="company" name="company" value="<?= old('company'); ?>" />
                                                <select class="form-control <?php if(session('errors.company')) : ?>is-invalid<?php endif ?>" name="comp_name" id="comp_name" >
                                                    <option selected="selected"><?= old('comp_name') ?></option>
                                                </select>
                                            </div>
                                            <label for="site" class="col-sm-2 col-form-label"><?= lang('TransactionCode.site'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site" name="site" value="<?= old('site'); ?>" />
                                                <select class="form-control <?php if(session('errors.site')) : ?>is-invalid<?php endif ?>" name="site_name" id="site_name" >
                                                    <option selected="selected"><?= old('site_name') ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="dept" class="col-sm-2 col-form-label"><?= lang('TransactionCode.dept'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept" name="dept" value="<?= old('dept'); ?>" />
                                                <select class="form-control <?php if(session('errors.dept')) : ?>is-invalid<?php endif ?>" name="dept_name" id="dept_name" >
                                                    <option selected="selected"><?= old('dept_name') ?></option>
                                                </select>
                                            </div>
                                            <label for="transcode" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transcode'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.transcode')) : ?>is-invalid<?php endif ?>" id="transcode" placeholder="<?= lang('TransactionCode.transcode'); ?>" name="transcode" value="<?= old('transcode'); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="transname" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transname'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.transname')) : ?>is-invalid<?php endif ?>" id="transname" placeholder="<?= lang('TransactionCode.transname'); ?>" name="transname" value="<?= old('transname'); ?>">
                                            </div>
                                            <label for="module" class="col-sm-2 col-form-label"><?= lang('TransactionCode.module'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.module')) : ?>is-invalid<?php endif ?>" id="module" placeholder="<?= lang('TransactionCode.module'); ?>" name="module" value="<?= old('module'); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="transtype" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transtype'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="transtype" name="transtype" value="<?= old('transtype'); ?>" />
                                                <select class="form-control <?php if(session('errors.transtype')) : ?>is-invalid<?php endif ?>" name="transtype" id="transtype" >
                                                    <option value="In">In</option>
                                                    <option value="Out">Out</option>
                                                    <option value="Adj">Adj</option>
                                                </select>
                                            </div>
                                            <label for="transnumber" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transnumber'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.transnumber')) : ?>is-invalid<?php endif ?>" id="transnumber" placeholder="<?= lang('TransactionCode.transnumber'); ?>" name="transnumber" value="<?= old('transnumber'); ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">    
                                            <label for="transdescription" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transdescription'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.transdescription')) : ?>is-invalid<?php endif ?>" id="transdescription" placeholder="<?= lang('TransactionCode.transdescription'); ?>" name="transdescription" value="<?= old('transdescription'); ?>">
                                            </div>
                                            <label for="glcode" class="col-sm-2 col-form-label"><?= lang('TransactionCode.glcode'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.glcode')) : ?>is-invalid<?php endif ?>" id="glcode" placeholder="<?= lang('TransactionCode.glcode'); ?>" name="glcode" value="<?= old('glcode'); ?>">
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

        $('#comp_name').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/company/getAll'); ?>',
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
            var data = $("#comp_name option:selected").val();
            $("#company").val(data);
        });

        $('#site_name').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/site/getByCompany'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        company_id: $("#company").val(),                     
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
            var data = $("#site_name option:selected").val();
            $("#site").val(data);
        });

        $('#dept_name').select2({
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
            var data = $("#dept_name option:selected").val();
            $("#dept").val(data);
        });

    });
</script>

<?= $this->endSection() ?>  