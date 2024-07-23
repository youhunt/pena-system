<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>department/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $dept[0]->id; ?>" ?>

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
                                            <label for="comp_code" class="col-sm-2 col-form-label"><?= lang('Department.comp_code'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="comp_code" name="comp_code" value="<?= old('comp_code') ? old('comp_code') : $dept[0]->comp_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.comp_code')) : ?>is-invalid<?php endif ?>" name="company" id="company" >
                                                    <option selected="selected"><?= $comp_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_code" class="col-sm-2 col-form-label"><?= lang('Department.site_code'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="site_code" name="site_code" value="<?= old('site_code') ? old('site_code') : $dept[0]->site_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.site_code')) : ?>is-invalid<?php endif ?>" name="site" id="site" >
                                                    <option selected="selected"><?= $site_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_code" class="col-sm-2 col-form-label"><?= lang('Department.dept_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_code')) : ?>is-invalid<?php endif ?>" id="dept_code" placeholder="<?= lang('Department.dept_code'); ?>" name="dept_code" value="<?= old('dept_code') ? old('dept_code') : $dept[0]->dept_code ; ?>">
                                            </div>
                                            <label for="dept_pic" class="col-sm-2 col-form-label"><?= lang('Department.dept_pic'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_pic')) : ?>is-invalid<?php endif ?>" id="dept_pic" placeholder="<?= lang('Department.dept_pic'); ?>" name="dept_pic" value="<?= old('dept_pic') ? old('dept_pic') : $dept[0]->dept_pic ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_name" class="col-sm-2 col-form-label"><?= lang('Department.dept_name'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_name')) : ?>is-invalid<?php endif ?>" id="dept_name" placeholder="<?= lang('Department.dept_name'); ?>" name="dept_name" value="<?= old('dept_name') ? old('dept_name') : $dept[0]->dept_name ; ?>">
                                            </div>
                                            <label for="dept_taxid" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">&nbsp;</div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_add" class="col-sm-2 col-form-label"><?= lang('Department.dept_add'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.dept_add')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Department.dept_add'); ?>" name="dept_add"><?= old('dept_add') ? old('dept_add') : $dept[0]->dept_add ; ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="dept_count" class="col-sm-2 col-form-label"><?= lang('Department.dept_count'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_count" name="dept_count" value="" />
                                                <select class="form-control <?php if(session('errors.dept_count')) : ?>is-invalid<?php endif ?>" name="country" id="country" >
                                                    <option selected="selected"><?= $count_name ?></option>
                                                </select>
                                            </div>
                                            <label for="dept_prov" class="col-sm-2 col-form-label"><?= lang('Department.dept_prov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_prov" name="dept_prov" value="" />
                                                <select class="form-control <?php if(session('errors.dept_prov')) : ?>is-invalid<?php endif ?>" name="prov" id="prov" >
                                                    <option selected="selected"><?= $prov_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_city" class="col-sm-2 col-form-label"><?= lang('Department.dept_city'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_city" name="dept_city" value="" />
                                                <select class="form-control <?php if(session('errors.dept_city')) : ?>is-invalid<?php endif ?>" name="city" id="city" >
                                                    <option selected="selected"><?= $city_name ?></option>
                                                </select>
                                            </div>
                                            <label for="dept_post" class="col-sm-2 col-form-label"><?= lang('Department.dept_post'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_post')) : ?>is-invalid<?php endif ?>" id="dept_post" placeholder="<?= lang('Department.dept_post'); ?>" name="dept_post" value="<?= old('dept_post') ? old('dept_post') : $dept[0]->dept_post ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_phone1" class="col-sm-2 col-form-label"><?= lang('Department.dept_phone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_phone1')) : ?>is-invalid<?php endif ?>" id="dept_phone1" placeholder="<?= lang('Department.dept_phone1'); ?>" name="dept_phone1" value="<?= old('dept_phone1') ? old('dept_phone1') : $dept[0]->dept_phone1 ; ?>">
                                            </div>
                                            <label for="dept_phone2" class="col-sm-2 col-form-label"><?= lang('Department.dept_phone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_phone2')) : ?>is-invalid<?php endif ?>" id="dept_phone2" placeholder="<?= lang('Department.dept_phone2'); ?>" name="dept_phone2" value="<?= old('dept_phone2') ? old('dept_phone2') : $dept[0]->dept_phone2 ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_phone3" class="col-sm-2 col-form-label"><?= lang('Department.dept_phone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_phone3')) : ?>is-invalid<?php endif ?>" id="dept_phone3" placeholder="<?= lang('Department.dept_phone3'); ?>" name="dept_phone3" value="<?= old('dept_phone3') ? old('dept_phone3') : $dept[0]->dept_phone3 ; ?>">
                                            </div>
                                            <label for="dept_phone2" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_badd" class="col-sm-2 col-form-label"><?= lang('Department.dept_badd'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.dept_badd')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Department.dept_badd'); ?>" name="dept_badd"><?= old('dept_badd') ? old('dept_badd') : $dept[0]->dept_badd ; ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="dept_bcount" class="col-sm-2 col-form-label"><?= lang('Department.dept_bcount'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_bcount" name="dept_bcount" value="" />
                                                <select class="form-control <?php if(session('errors.dept_bcount')) : ?>is-invalid<?php endif ?>" name="bcountry" id="bcountry" >
                                                    <option selected="selected"><?= $bcount_name ?></option>
                                                </select>
                                            </div>
                                            <label for="dept_bprov" class="col-sm-2 col-form-label"><?= lang('Department.dept_bprov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_bprov" name="dept_bprov" value="" />
                                                <select class="form-control <?php if(session('errors.dept_bprov')) : ?>is-invalid<?php endif ?>" name="bprov" id="bprov" >
                                                    <option selected="selected"><?= $bprov_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_bcity" class="col-sm-2 col-form-label"><?= lang('Department.dept_bcity'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_bcity" name="dept_bcity" value="" />
                                                <select class="form-control <?php if(session('errors.dept_bcity')) : ?>is-invalid<?php endif ?>" name="bcity" id="bcity" >
                                                    <option selected="selected"><?= $bcity_name ?></option>
                                                </select>
                                            </div>
                                            <label for="dept_bpost" class="col-sm-2 col-form-label"><?= lang('Department.dept_bpost'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_bpost')) : ?>is-invalid<?php endif ?>" id="dept_bpost" placeholder="<?= lang('Department.dept_bpost'); ?>" name="dept_bpost" value="<?= old('dept_bpost') ? old('dept_bpost') : $dept[0]->dept_bpost ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_bphone1" class="col-sm-2 col-form-label"><?= lang('Department.dept_bphone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_bphone1')) : ?>is-invalid<?php endif ?>" id="dept_bphone1" placeholder="<?= lang('Department.dept_bphone1'); ?>" name="dept_bphone1" value="<?= old('dept_bphone1') ? old('dept_bphone1') : $dept[0]->dept_bphone1 ; ?>">
                                            </div>
                                            <label for="dept_bphone2" class="col-sm-2 col-form-label"><?= lang('Department.dept_bphone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_bphone2')) : ?>is-invalid<?php endif ?>" id="dept_bphone2" placeholder="<?= lang('Department.dept_bphone2'); ?>" name="dept_bphone2" value="<?= old('dept_bphone2') ? old('dept_bphone2') : $dept[0]->dept_bphone2 ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_bphone3" class="col-sm-2 col-form-label"><?= lang('Department.dept_bphone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_bphone3')) : ?>is-invalid<?php endif ?>" id="dept_bphone3" placeholder="<?= lang('Department.dept_bphone3'); ?>" name="dept_bphone3" value="<?= old('dept_bphone3') ? old('dept_bphone3') : $dept[0]->dept_bphone3 ; ?>">
                                            </div>
                                            <label for="dept_bphone2" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_madd" class="col-sm-2 col-form-label"><?= lang('Department.dept_madd'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.dept_madd')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Department.dept_madd'); ?>" name="dept_madd"><?= old('dept_madd') ? old('dept_madd') : $dept[0]->dept_madd ; ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="dept_mcount" class="col-sm-2 col-form-label"><?= lang('Department.dept_mcount'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_mcount" name="dept_mcount" value="" />
                                                <select class="form-control <?php if(session('errors.dept_mcount')) : ?>is-invalid<?php endif ?>" name="mcountry" id="mcountry" >
                                                    <option selected="selected"><?= $mcount_name ?></option>
                                                </select>
                                            </div>
                                            <label for="dept_mprov" class="col-sm-2 col-form-label"><?= lang('Department.dept_mprov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_mprov" name="dept_mprov" value="" />
                                                <select class="form-control <?php if(session('errors.dept_mprov')) : ?>is-invalid<?php endif ?>" name="mprov" id="mprov" >
                                                    <option selected="selected"><?= $mprov_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_mcity" class="col-sm-2 col-form-label"><?= lang('Department.dept_mcity'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_mcity" name="dept_mcity" value="" />
                                                <select class="form-control <?php if(session('errors.dept_mcity')) : ?>is-invalid<?php endif ?>" name="mcity" id="mcity" >
                                                    <option selected="selected"><?= $mcity_name ?></option>
                                                </select>
                                            </div>
                                            <label for="dept_mpost" class="col-sm-2 col-form-label"><?= lang('Department.dept_mpost'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_mpost')) : ?>is-invalid<?php endif ?>" id="dept_mpost" placeholder="<?= lang('Department.dept_mpost'); ?>" name="dept_mpost" value="<?= old('dept_mpost') ? old('dept_mpost') : $dept[0]->dept_mpost ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_mphone1" class="col-sm-2 col-form-label"><?= lang('Department.dept_mphone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_mphone1')) : ?>is-invalid<?php endif ?>" id="dept_mphone1" placeholder="<?= lang('Department.dept_mphone1'); ?>" name="dept_mphone1" value="<?= old('dept_mphone1') ? old('dept_mphone1') : $dept[0]->dept_mphone1 ; ?>">
                                            </div>
                                            <label for="dept_mphone2" class="col-sm-2 col-form-label"><?= lang('Department.dept_mphone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_mphone2')) : ?>is-invalid<?php endif ?>" id="dept_mphone2" placeholder="<?= lang('Department.dept_mphone2'); ?>" name="dept_mphone2" value="<?= old('dept_mphone2') ? old('dept_mphone2') : $dept[0]->dept_mphone2 ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_mphone3" class="col-sm-2 col-form-label"><?= lang('Department.dept_mphone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.dept_mphone3')) : ?>is-invalid<?php endif ?>" id="dept_mphone3" placeholder="<?= lang('Department.dept_mphone3'); ?>" name="dept_mphone3" value="<?= old('dept_mphone3') ? old('dept_mphone3') : $dept[0]->dept_mphone3 ; ?>">
                                            </div>
                                            <label for="dept_mphone2" class="col-sm-2 col-form-label">&nbsp;</label>
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
            $("#comp_code").val(data);
        });

        $('#country').select2({
            placeholder: '<?= lang('Department.dept_count'); ?>',
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
            $("#dept_count").val(data);
        });

        $('#prov').select2({
            placeholder: '<?= lang('Department.dept_prov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#dept_count").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('dept_count').val(),
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
            $("#dept_prov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#city').select2({
            placeholder: '<?= lang('Department.dept_city'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#dept_count").val(),                     
                        province_id: $("#dept_prov").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('dept_count').val(),
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
            $("#dept_city").val(data);
            //alert("Data yang dipilih adalah "+data);
        });

        $('#bcountry').select2({
            placeholder: '<?= lang('Department.dept_bcount'); ?>',
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
            $("#dept_bcount").val(data);
        });

        $('#bprov').select2({
            placeholder: '<?= lang('Department.dept_bprov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#dept_bcount").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('dept_count').val(),
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
            $("#dept_bprov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#bcity').select2({
            placeholder: '<?= lang('Department.dept_bcity'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#dept_bcount").val(),                     
                        province_id: $("#dept_bprov").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('dept_count').val(),
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
            $("#dept_bcity").val(data);
            //alert("Data yang dipilih adalah "+data);
        });

        $('#mcountry').select2({
            placeholder: '<?= lang('Department.dept_mcount'); ?>',
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
            $("#dept_mcount").val(data);
        });

        $('#mprov').select2({
            placeholder: '<?= lang('Department.dept_mprov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#dept_mcount").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('dept_count').val(),
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
            $("#dept_mprov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#mcity').select2({
            placeholder: '<?= lang('Department.dept_mcity'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#dept_mcount").val(),                     
                        province_id: $("#dept_mprov").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('dept_count').val(),
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
            $("#dept_mcity").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
    });
</script>

<?= $this->endSection() ?>  