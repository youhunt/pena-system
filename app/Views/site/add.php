<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>site/save" class="user" method="post">

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
                                            <label for="comp_code" class="col-sm-2 col-form-label"><?= lang('Site.comp_code'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="comp_code" name="comp_code" value="<?= old('comp_code'); ?>" />
                                                <select class="form-control <?php if(session('errors.comp_code')) : ?>is-invalid<?php endif ?>" name="company" id="company" ></select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_code" class="col-sm-2 col-form-label"><?= lang('Site.site_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_code')) : ?>is-invalid<?php endif ?>" id="site_code" placeholder="<?= lang('Site.site_code'); ?>" name="site_code" value="<?= old('site_code') ?>">
                                            </div>
                                            <label for="site_pic" class="col-sm-2 col-form-label"><?= lang('Site.site_pic'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_pic')) : ?>is-invalid<?php endif ?>" id="site_pic" placeholder="<?= lang('Site.site_pic'); ?>" name="site_pic" value="<?= old('site_pic') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_name" class="col-sm-2 col-form-label"><?= lang('Site.site_name'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_name')) : ?>is-invalid<?php endif ?>" id="site_name" placeholder="<?= lang('Site.site_name'); ?>" name="site_name" value="<?= old('site_name') ?>">
                                            </div>
                                            <label for="site_taxid" class="col-sm-2 col-form-label"><?= lang('Site.site_taxid'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_taxid')) : ?>is-invalid<?php endif ?>" id="site_taxid" placeholder="<?= lang('Site.site_taxid'); ?>" name="site_taxid" value="<?= old('site_taxid') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_add" class="col-sm-2 col-form-label"><?= lang('Site.site_add'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.site_add')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Site.site_add'); ?>" name="site_add"><?= old('site_add') ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="site_count" class="col-sm-2 col-form-label"><?= lang('Site.site_count'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_count" name="site_count" value="" />
                                                <select class="form-control <?php if(session('errors.site_count')) : ?>is-invalid<?php endif ?>" name="country" id="country" ></select>
                                            </div>
                                            <label for="site_prov" class="col-sm-2 col-form-label"><?= lang('Site.site_prov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_prov" name="site_prov" value="" />
                                                <select class="form-control <?php if(session('errors.site_prov')) : ?>is-invalid<?php endif ?>" name="prov" id="prov" ></select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_city" class="col-sm-2 col-form-label"><?= lang('Site.site_city'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_city" name="site_city" value="" />
                                                <select class="form-control <?php if(session('errors.site_city')) : ?>is-invalid<?php endif ?>" name="city" id="city" ></select>
                                            </div>
                                            <label for="site_post" class="col-sm-2 col-form-label"><?= lang('Site.site_post'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_post')) : ?>is-invalid<?php endif ?>" id="site_post" placeholder="<?= lang('Site.site_post'); ?>" name="site_post" value="<?= old('site_post') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_phone1" class="col-sm-2 col-form-label"><?= lang('Site.site_phone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_phone1')) : ?>is-invalid<?php endif ?>" id="site_phone1" placeholder="<?= lang('Site.site_phone1'); ?>" name="site_phone1" value="<?= old('site_phone1') ?>">
                                            </div>
                                            <label for="site_phone2" class="col-sm-2 col-form-label"><?= lang('Site.site_phone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_phone2')) : ?>is-invalid<?php endif ?>" id="site_phone2" placeholder="<?= lang('Site.site_phone2'); ?>" name="site_phone2" value="<?= old('site_phone2') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_phone3" class="col-sm-2 col-form-label"><?= lang('Site.site_phone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_phone3')) : ?>is-invalid<?php endif ?>" id="site_phone3" placeholder="<?= lang('Site.site_phone3'); ?>" name="site_phone3" value="<?= old('site_phone3') ?>">
                                            </div>
                                            <label for="site_phone2" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_badd" class="col-sm-2 col-form-label"><?= lang('Site.site_badd'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.site_badd')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Site.site_badd'); ?>" name="site_badd"><?= old('site_badd') ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="site_bcount" class="col-sm-2 col-form-label"><?= lang('Site.site_bcount'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_bcount" name="site_bcount" value="" />
                                                <select class="form-control <?php if(session('errors.site_bcount')) : ?>is-invalid<?php endif ?>" name="bcountry" id="bcountry" ></select>
                                            </div>
                                            <label for="site_bprov" class="col-sm-2 col-form-label"><?= lang('Site.site_bprov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_bprov" name="site_bprov" value="" />
                                                <select class="form-control <?php if(session('errors.site_bprov')) : ?>is-invalid<?php endif ?>" name="bprov" id="bprov" ></select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_bcity" class="col-sm-2 col-form-label"><?= lang('Site.site_bcity'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_bcity" name="site_bcity" value="" />
                                                <select class="form-control <?php if(session('errors.site_bcity')) : ?>is-invalid<?php endif ?>" name="bcity" id="bcity" ></select>
                                            </div>
                                            <label for="site_bpost" class="col-sm-2 col-form-label"><?= lang('Site.site_bpost'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_bpost')) : ?>is-invalid<?php endif ?>" id="site_bpost" placeholder="<?= lang('Site.site_bpost'); ?>" name="site_bpost" value="<?= old('site_bpost') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_bphone1" class="col-sm-2 col-form-label"><?= lang('Site.site_bphone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_bphone1')) : ?>is-invalid<?php endif ?>" id="site_bphone1" placeholder="<?= lang('Site.site_bphone1'); ?>" name="site_bphone1" value="<?= old('site_bphone1') ?>">
                                            </div>
                                            <label for="site_bphone2" class="col-sm-2 col-form-label"><?= lang('Site.site_bphone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_bphone2')) : ?>is-invalid<?php endif ?>" id="site_bphone2" placeholder="<?= lang('Site.site_bphone2'); ?>" name="site_bphone2" value="<?= old('site_bphone2') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_bphone3" class="col-sm-2 col-form-label"><?= lang('Site.site_bphone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_bphone3')) : ?>is-invalid<?php endif ?>" id="site_bphone3" placeholder="<?= lang('Site.site_bphone3'); ?>" name="site_bphone3" value="<?= old('site_bphone3') ?>">
                                            </div>
                                            <label for="site_bphone2" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_madd" class="col-sm-2 col-form-label"><?= lang('Site.site_madd'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.site_madd')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Site.site_madd'); ?>" name="site_madd"><?= old('site_madd') ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="site_mcount" class="col-sm-2 col-form-label"><?= lang('Site.site_mcount'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_mcount" name="site_mcount" value="" />
                                                <select class="form-control <?php if(session('errors.site_mcount')) : ?>is-invalid<?php endif ?>" name="mcountry" id="mcountry" ></select>
                                            </div>
                                            <label for="site_mprov" class="col-sm-2 col-form-label"><?= lang('Site.site_mprov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_mprov" name="site_mprov" value="" />
                                                <select class="form-control <?php if(session('errors.site_mprov')) : ?>is-invalid<?php endif ?>" name="mprov" id="mprov" ></select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_mcity" class="col-sm-2 col-form-label"><?= lang('Site.site_mcity'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_mcity" name="site_mcity" value="" />
                                                <select class="form-control <?php if(session('errors.site_mcity')) : ?>is-invalid<?php endif ?>" name="mcity" id="mcity" ></select>
                                            </div>
                                            <label for="site_mpost" class="col-sm-2 col-form-label"><?= lang('Site.site_mpost'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_mpost')) : ?>is-invalid<?php endif ?>" id="site_mpost" placeholder="<?= lang('Site.site_mpost'); ?>" name="site_mpost" value="<?= old('site_mpost') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_mphone1" class="col-sm-2 col-form-label"><?= lang('Site.site_mphone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_mphone1')) : ?>is-invalid<?php endif ?>" id="site_mphone1" placeholder="<?= lang('Site.site_mphone1'); ?>" name="site_mphone1" value="<?= old('site_mphone1') ?>">
                                            </div>
                                            <label for="site_mphone2" class="col-sm-2 col-form-label"><?= lang('Site.site_mphone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_mphone2')) : ?>is-invalid<?php endif ?>" id="site_mphone2" placeholder="<?= lang('Site.site_mphone2'); ?>" name="site_mphone2" value="<?= old('site_mphone2') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_mphone3" class="col-sm-2 col-form-label"><?= lang('Site.site_mphone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.site_mphone3')) : ?>is-invalid<?php endif ?>" id="site_mphone3" placeholder="<?= lang('Site.site_mphone3'); ?>" name="site_mphone3" value="<?= old('site_mphone3') ?>">
                                            </div>
                                            <label for="site_mphone2" class="col-sm-2 col-form-label">&nbsp;</label>
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

        $('#company').select2({
            placeholder: '',
            minimumInputLength: 1,
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#company option:selected").val();
            $("#comp_code").val(data);
        });

        $('#country').select2({
            placeholder: '<?= lang('Site.site_count'); ?>',
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
            $("#site_count").val(data);
        });

        $('#prov').select2({
            placeholder: '<?= lang('Site.site_prov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#site_count").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('site_count').val(),
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
            $("#site_prov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#city').select2({
            placeholder: '<?= lang('Site.site_city'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#site_count").val(),                     
                        province_id: $("#site_prov").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('site_count').val(),
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
            $("#site_city").val(data);
            //alert("Data yang dipilih adalah "+data);
        });

        $('#bcountry').select2({
            placeholder: '<?= lang('Site.site_bcount'); ?>',
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
            var data = $("#bcountry option:selected").val();
            $("#site_bcount").val(data);
        });

        $('#bprov').select2({
            placeholder: '<?= lang('Site.site_bprov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#site_bcount").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('site_count').val(),
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
            var data = $("#bprov option:selected").val();
            $("#site_bprov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#bcity').select2({
            placeholder: '<?= lang('Site.site_bcity'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#site_bcount").val(),                     
                        province_id: $("#site_bprov").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('site_count').val(),
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
            var data = $("#bcity option:selected").val();
            $("#site_bcity").val(data);
            //alert("Data yang dipilih adalah "+data);
        });

        $('#mcountry').select2({
            placeholder: '<?= lang('Site.site_mcount'); ?>',
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
            var data = $("#mcountry option:selected").val();
            $("#site_mcount").val(data);
        });

        $('#mprov').select2({
            placeholder: '<?= lang('Site.site_mprov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#site_mcount").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('site_count').val(),
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
            var data = $("#mprov option:selected").val();
            $("#site_mprov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#mcity').select2({
            placeholder: '<?= lang('Site.site_mcity'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#site_mcount").val(),                     
                        province_id: $("#site_mprov").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('site_count').val(),
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
            var data = $("#mcity option:selected").val();
            $("#site_mcity").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
    });
</script>

<?= $this->endSection() ?>  