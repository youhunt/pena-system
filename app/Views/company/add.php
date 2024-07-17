<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
 
                    <form action="<?= base_url(); ?>company/save" class="user" method="post">

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
                                            <label for="comp_code" class="col-sm-2 col-form-label"><?= lang('Company.comp_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.comp_code')) : ?>is-invalid<?php endif ?>" id="comp_code" placeholder="<?= lang('Company.comp_code'); ?>" name="comp_code" value="<?= old('comp_code') ?>">
                                            </div>
                                            <label for="comp_pic" class="col-sm-2 col-form-label"><?= lang('Company.comp_pic'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.comp_pic')) : ?>is-invalid<?php endif ?>" id="comp_code" placeholder="<?= lang('Company.comp_pic'); ?>" name="comp_pic" value="<?= old('comp_pic') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="comp_name" class="col-sm-2 col-form-label"><?= lang('Company.comp_name'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.comp_name')) : ?>is-invalid<?php endif ?>" id="comp_name" placeholder="<?= lang('Company.comp_name'); ?>" name="comp_name" value="<?= old('comp_name') ?>">
                                            </div>
                                            <label for="comp_taxid" class="col-sm-2 col-form-label"><?= lang('Company.comp_taxid'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.comp_taxid')) : ?>is-invalid<?php endif ?>" id="comp_code" placeholder="<?= lang('Company.comp_taxid'); ?>" name="comp_taxid" value="<?= old('comp_taxid') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="comp_add" class="col-sm-2 col-form-label"><?= lang('Company.comp_add'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.comp_add')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Company.comp_add'); ?>" name="comp_add"><?= old('comp_add') ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="comp_count" class="col-sm-2 col-form-label"><?= lang('Company.comp_count'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="comp_count" name="comp_count" value="" />
                                                <select class="form-control <?php if(session('errors.comp_count')) : ?>is-invalid<?php endif ?>" name="country" id="country" ></select>
                                            </div>
                                            <label for="comp_prov" class="col-sm-2 col-form-label"><?= lang('Company.comp_prov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="comp_prov" name="comp_prov" value="" />
                                                <select class="form-control <?php if(session('errors.comp_prov')) : ?>is-invalid<?php endif ?>" name="prov" id="prov" ></select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="comp_city" class="col-sm-2 col-form-label"><?= lang('Company.comp_city'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="comp_city" name="comp_city" value="" />
                                                <select class="form-control <?php if(session('errors.comp_city')) : ?>is-invalid<?php endif ?>" name="city" id="city" ></select>
                                            </div>
                                            <label for="comp_post" class="col-sm-2 col-form-label"><?= lang('Company.comp_post'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.comp_post')) : ?>is-invalid<?php endif ?>" id="comp_post" placeholder="<?= lang('Company.comp_post'); ?>" name="comp_post" value="<?= old('comp_post') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="comp_phone1" class="col-sm-2 col-form-label"><?= lang('Company.comp_phone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.comp_phone1')) : ?>is-invalid<?php endif ?>" id="comp_phone1" placeholder="<?= lang('Company.comp_phone1'); ?>" name="comp_phone1" value="<?= old('comp_phone1') ?>">
                                            </div>
                                            <label for="comp_phone2" class="col-sm-2 col-form-label"><?= lang('Company.comp_phone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.comp_phone2')) : ?>is-invalid<?php endif ?>" id="comp_phone2" placeholder="<?= lang('Company.comp_phone2'); ?>" name="comp_phone2" value="<?= old('comp_phone2') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="comp_phone3" class="col-sm-2 col-form-label"><?= lang('Company.comp_phone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.comp_phone3')) : ?>is-invalid<?php endif ?>" id="comp_phone3" placeholder="<?= lang('Company.comp_phone3'); ?>" name="comp_phone3" value="<?= old('comp_phone3') ?>">
                                            </div>
                                            <label for="comp_taxid" class="col-sm-2 col-form-label">&nbsp;</label>
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
        $('#country').select2({
            placeholder: '<?= lang('Company.comp_count'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/countries/getAll'); ?>',
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
            var data = $("#country option:selected").val();
            $("#comp_count").val(data);
        });

        $('#prov').select2({
            placeholder: '<?= lang('Company.comp_prov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/states/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#comp_count").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('comp_count').val(),
                    // };
                },
                processResults: function(data){
                return {
                    results: data
                };
                },
                cache: true
            }
        }).on('select2:select', function (evt) {
            var data = $("#prov option:selected").val();
            $("#comp_prov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#city').select2({
            placeholder: '<?= lang('Company.comp_city'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndState'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#comp_count").val(),                     
                        state_id: $("#comp_prov").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('comp_count').val(),
                    // };
                },
                processResults: function(data){
                return {
                    results: data
                };
                },
                cache: true
            }
        }).on('select2:select', function (evt) {
            var data = $("#city option:selected").val();
            $("#comp_city").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        

    });
</script>

<?= $this->endSection() ?>  