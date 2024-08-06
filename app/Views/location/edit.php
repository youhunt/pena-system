<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>location/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $loc[0]->id; ?>" ?>

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
                                            <label for="comp_code" class="col-sm-2 col-form-label"><?= lang('Location.comp_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="comp_code" name="comp_code" value="<?= old('comp_code') ? old('comp_code') : $loc[0]->comp_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.comp_code')) : ?>is-invalid<?php endif ?>" name="company" id="company" >
                                                    <option selected="selected"><?= $comp_name ?></option>
                                                </select>
                                            </div>
                                            <label for="site_code" class="col-sm-2 col-form-label"><?= lang('Location.site_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site_code" name="site_code" value="<?= old('site_code') ? old('site_code') : $loc[0]->site_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.site_code')) : ?>is-invalid<?php endif ?>" name="site" id="site" >
                                                    <option selected="selected"><?= $site_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_code" class="col-sm-2 col-form-label"><?= lang('Location.dept_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept_code" name="dept_code" value="<?= old('dept_code') ? old('dept_code') : $loc[0]->dept_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.dept_code')) : ?>is-invalid<?php endif ?>" name="dept" id="dept" >
                                                    <option selected="selected"><?= $dept_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs_code" class="col-sm-2 col-form-label"><?= lang('Location.whs_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_code" name="whs_code" value="<?= old('whs_code') ? old('whs_code') : $loc[0]->whs_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.whs_code')) : ?>is-invalid<?php endif ?>" name="whs" id="whs" >
                                                    <option selected="selected"><?= $whs_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="loc_code" class="col-sm-2 col-form-label"><?= lang('Location.loc_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.loc_code')) : ?>is-invalid<?php endif ?>" id="loc_code" placeholder="<?= lang('Location.loc_code'); ?>" name="loc_code" value="<?= old('loc_code') ? old('loc_code') : $loc[0]->loc_code ; ?>">
                                            </div>
                                            <label for="loc_pic" class="col-sm-2 col-form-label"><?= lang('Location.loc_pic'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.loc_pic')) : ?>is-invalid<?php endif ?>" id="loc_pic" placeholder="<?= lang('Location.loc_pic'); ?>" name="loc_pic" value="<?= old('loc_pic') ? old('loc_pic') : $loc[0]->loc_pic ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="loc_name" class="col-sm-2 col-form-label"><?= lang('Location.loc_name'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.loc_name')) : ?>is-invalid<?php endif ?>" id="loc_name" placeholder="<?= lang('Location.loc_name'); ?>" name="loc_name" value="<?= old('loc_name') ? old('loc_name') : $loc[0]->loc_name ; ?>">
                                            </div>
                                            <label for="loc_taxid" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">&nbsp;</div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="loc_add" class="col-sm-2 col-form-label"><?= lang('Location.loc_add'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.loc_add')) : ?>is-invalid<?php endif ?>" rows="2" placeholder="<?= lang('Location.loc_add'); ?>" name="loc_add"><?= old('loc_add') ? old('loc_add') : $loc[0]->loc_add ; ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="loc_count" class="col-sm-2 col-form-label"><?= lang('Location.loc_count'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="loc_count" name="loc_count" value="<?= old('loc_count') ? old('loc_count') : $loc[0]->loc_count ; ?>" />
                                                <select class="form-control <?php if(session('errors.loc_count')) : ?>is-invalid<?php endif ?>" name="country" id="country" >
                                                    <option selected="selected"><?= $count_name ?></option>
                                                </select>
                                            </div>
                                            <label for="loc_prov" class="col-sm-2 col-form-label"><?= lang('Location.loc_prov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="loc_prov" name="loc_prov" value="<?= old('loc_prov') ? old('loc_prov') : $loc[0]->loc_prov ; ?>" />
                                                <select class="form-control <?php if(session('errors.loc_prov')) : ?>is-invalid<?php endif ?>" name="prov" id="prov" >
                                                    <option selected="selected"><?= $prov_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="loc_city" class="col-sm-2 col-form-label"><?= lang('Location.loc_city'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="loc_city" name="loc_city" value="<?= old('loc_city') ? old('loc_city') : $loc[0]->loc_city ; ?>" />
                                                <select class="form-control <?php if(session('errors.loc_city')) : ?>is-invalid<?php endif ?>" name="city" id="city" >
                                                    <option selected="selected"><?= $city_name ?></option>
                                                </select>
                                            </div>
                                            <label for="loc_post" class="col-sm-2 col-form-label"><?= lang('Location.loc_post'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.loc_post')) : ?>is-invalid<?php endif ?>" id="loc_post" placeholder="<?= lang('Location.loc_post'); ?>" name="loc_post" value="<?= old('loc_post') ? old('loc_post') : $loc[0]->loc_post ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="loc_phone1" class="col-sm-2 col-form-label"><?= lang('Location.loc_phone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.loc_phone1')) : ?>is-invalid<?php endif ?>" id="loc_phone1" placeholder="<?= lang('Location.loc_phone1'); ?>" name="loc_phone1" value="<?= old('loc_phone1') ? old('loc_phone1') : $loc[0]->loc_phone1 ; ?>">
                                            </div>
                                            <label for="loc_phone2" class="col-sm-2 col-form-label"><?= lang('Location.loc_phone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.loc_phone2')) : ?>is-invalid<?php endif ?>" id="loc_phone2" placeholder="<?= lang('Location.loc_phone2'); ?>" name="loc_phone2" value="<?= old('loc_phone2') ? old('loc_phone2') : $loc[0]->loc_phone2 ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="loc_phone3" class="col-sm-2 col-form-label"><?= lang('Location.loc_phone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.loc_phone3')) : ?>is-invalid<?php endif ?>" id="loc_phone3" placeholder="<?= lang('Location.loc_phone3'); ?>" name="loc_phone3" value="<?= old('loc_phone3') ? old('loc_phone3') : $loc[0]->loc_phone3 ; ?>">
                                            </div>
                                            <label for="loc_phone2" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_dadd" class="col-sm-2 col-form-label"><?= lang('Location.whs_dadd'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.whs_dadd')) : ?>is-invalid<?php endif ?>" rows="2" placeholder="<?= lang('Location.whs_dadd'); ?>" name="whs_dadd"><?= old('whs_dadd') ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="whs_dcount" class="col-sm-2 col-form-label"><?= lang('Location.whs_dcount'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_dcount" name="whs_dcount" value="<?= old('whs_dcount') ? old('whs_dcount') : $loc[0]->whs_dcount ; ?>" />
                                                <select class="form-control <?php if(session('errors.whs_dcount')) : ?>is-invalid<?php endif ?>" name="dcountry" id="dcountry" >
                                                    <option selected="selected"><?= $dcount_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs_dprov" class="col-sm-2 col-form-label"><?= lang('Location.whs_dprov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_dprov" name="whs_dprov" value="<?= old('whs_dprov') ? old('whs_dprov') : $loc[0]->whs_dprov ; ?>" />
                                                <select class="form-control <?php if(session('errors.whs_dprov')) : ?>is-invalid<?php endif ?>" name="dprov" id="dprov" >
                                                    <option selected="selected"><?= $dprov_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_dcity" class="col-sm-2 col-form-label"><?= lang('Location.whs_dcity'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_dcity" name="whs_dcity" value="<?= old('whs_dcity') ? old('whs_dcity') : $loc[0]->whs_dcity ; ?>" />
                                                <select class="form-control <?php if(session('errors.whs_dcity')) : ?>is-invalid<?php endif ?>" name="dcity" id="dcity" >
                                                    <option selected="selected"><?= $dcity_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs_dpost" class="col-sm-2 col-form-label"><?= lang('Location.whs_dpost'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_dpost')) : ?>is-invalid<?php endif ?>" id="whs_dpost" placeholder="<?= lang('Location.whs_dpost'); ?>" name="whs_dpost" value="<?= old('whs_dpost') ? old('whs_dpost') : $loc[0]->whs_dpost ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_dphone1" class="col-sm-2 col-form-label"><?= lang('Location.whs_dphone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_dphone1')) : ?>is-invalid<?php endif ?>" id="whs_dphone1" placeholder="<?= lang('Location.whs_dphone1'); ?>" name="whs_dphone1" value="<?= old('whs_dphone1') ? old('whs_dphone1') : $loc[0]->whs_dphone1 ; ?>">
                                            </div>
                                            <label for="whs_dphone2" class="col-sm-2 col-form-label"><?= lang('Location.whs_dphone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_dphone2')) : ?>is-invalid<?php endif ?>" id="whs_dphone2" placeholder="<?= lang('Location.whs_dphone2'); ?>" name="whs_dphone2" value="<?= old('whs_dphone2') ? old('whs_dphone2') : $loc[0]->whs_dphone2 ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_dphone3" class="col-sm-2 col-form-label"><?= lang('Location.whs_dphone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_dphone3')) : ?>is-invalid<?php endif ?>" id="whs_dphone3" placeholder="<?= lang('Location.whs_dphone3'); ?>" name="whs_dphone3" value="<?= old('whs_dphone3') ? old('whs_dphone3') : $loc[0]->whs_dphone3 ; ?>">
                                            </div>
                                            <label for="whs_dphone2" class="col-sm-2 col-form-label">&nbsp;</label>
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
            var data = $("#company option:selected").val();
            $("#comp_code").val(data);
        });

        $('#site').select2({
            placeholder: '|',
            minimumInputLength: 0,
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
            var data = $("#site option:selected").val();
            $("#site_code").val(data);
        });

        $('#dept').select2({
            placeholder: '|',
            minimumInputLength: 0,
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
            var data = $("#dept option:selected").val();
            $("#dept_code").val(data);
        });

        $('#whs').select2({
            placeholder: '|',
            minimumInputLength: 0,
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
            var data = $("#whs option:selected").val();
            $("#whs_code").val(data);
        });

        $('#country').select2({
            placeholder: '|<?= lang('Location.loc_count'); ?>',
            minimumInputLength: 0,
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
            var data = $("#country option:selected").val();
            $("#loc_count").val(data);
        });

        $('#prov').select2({
            placeholder: '|<?= lang('Location.loc_prov'); ?>',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#loc_count").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('loc_count').val(),
                    // };
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
            var data = $("#prov option:selected").val();
            $("#loc_prov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#city').select2({
            placeholder: '|<?= lang('Location.loc_city'); ?>',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#loc_count").val(),                     
                        province_id: $("#loc_prov").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('loc_count').val(),
                    // };
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
            var data = $("#city option:selected").val();
            $("#loc_city").val(data);
            //alert("Data yang dipilih adalah "+data);
        });

        $('#dcountry').select2({
            placeholder: '|<?= lang('Location.whs_dcount'); ?>',
            minimumInputLength: 0,
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
            var data = $("#dcountry option:selected").val();
            $("#whs_dcount").val(data);
        });

        $('#dprov').select2({
            placeholder: '|<?= lang('Location.whs_dprov'); ?>',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#whs_dcount").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('whs_count').val(),
                    // };
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
            var data = $("#dprov option:selected").val();
            $("#whs_dprov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#dcity').select2({
            placeholder: '|<?= lang('Location.whs_dcity'); ?>',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#whs_dcount").val(),                     
                        province_id: $("#whs_dprov").val()                     
                    };

                    // Query parameters will be ?search=[term]&type=public
                    return query;
                    // return {
                    //     q: params.term, // search term
                    //     country_id: $('whs_count').val(),
                    // };
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
            var data = $("#dcity option:selected").val();
            $("#whs_dcity").val(data);
            //alert("Data yang dipilih adalah "+data);
        });

    });
</script>

<?= $this->endSection() ?>  