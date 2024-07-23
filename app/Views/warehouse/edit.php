<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>warehouse/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $whs[0]->id; ?>" ?>

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
                                            <label for="comp_code" class="col-sm-2 col-form-label"><?= lang('Warehouse.comp_code'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="comp_code" name="comp_code" value="<?= old('comp_code') ? old('comp_code') : $whs[0]->comp_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.comp_code')) : ?>is-invalid<?php endif ?>" name="company" id="company" >
                                                    <option selected="selected"><?= $comp_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site_code" class="col-sm-2 col-form-label"><?= lang('Warehouse.site_code'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="site_code" name="site_code" value="<?= old('site_code') ? old('site_code') : $whs[0]->site_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.site_code')) : ?>is-invalid<?php endif ?>" name="site" id="site" >
                                                    <option selected="selected"><?= $site_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept_code" class="col-sm-2 col-form-label"><?= lang('Warehouse.dept_code'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="dept_code" name="dept_code" value="<?= old('dept_code') ? old('dept_code') : $whs[0]->dept_code ; ?>" />
                                                <select class="form-control <?php if(session('errors.dept_code')) : ?>is-invalid<?php endif ?>" name="dept" id="dept" >
                                                    <option selected="selected"><?= $dept_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_code" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_code')) : ?>is-invalid<?php endif ?>" id="whs_code" placeholder="<?= lang('Warehouse.whs_code'); ?>" name="whs_code" value="<?= old('whs_code') ? old('whs_code') : $whs[0]->whs_code ; ?>">
                                            </div>
                                            <label for="whs_pic" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_pic'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_pic')) : ?>is-invalid<?php endif ?>" id="whs_pic" placeholder="<?= lang('Warehouse.whs_pic'); ?>" name="whs_pic" value="<?= old('whs_pic') ? old('whs_pic') : $whs[0]->whs_pic ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_name" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_name'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_name')) : ?>is-invalid<?php endif ?>" id="whs_name" placeholder="<?= lang('Warehouse.whs_name'); ?>" name="whs_name" value="<?= old('whs_name') ? old('whs_name') : $whs[0]->whs_name ; ?>">
                                            </div>
                                            <label for="whs_taxid" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">&nbsp;</div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_add" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_add'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.whs_add')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Warehouse.whs_add'); ?>" name="whs_add"><?= old('whs_add') ? old('whs_add') : $whs[0]->whs_add ; ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="whs_count" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_count'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_count" name="whs_count" value="" />
                                                <select class="form-control <?php if(session('errors.whs_count')) : ?>is-invalid<?php endif ?>" name="country" id="country" >
                                                    <option selected="selected"><?= $count_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs_prov" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_prov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_prov" name="whs_prov" value="" />
                                                <select class="form-control <?php if(session('errors.whs_prov')) : ?>is-invalid<?php endif ?>" name="prov" id="prov" >
                                                    <option selected="selected"><?= $prov_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_city" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_city'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_city" name="whs_city" value="" />
                                                <select class="form-control <?php if(session('errors.whs_city')) : ?>is-invalid<?php endif ?>" name="city" id="city" >
                                                    <option selected="selected"><?= $city_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs_post" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_post'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_post')) : ?>is-invalid<?php endif ?>" id="whs_post" placeholder="<?= lang('Warehouse.whs_post'); ?>" name="whs_post" value="<?= old('whs_post') ? old('whs_post') : $whs[0]->whs_post ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_phone1" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_phone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_phone1')) : ?>is-invalid<?php endif ?>" id="whs_phone1" placeholder="<?= lang('Warehouse.whs_phone1'); ?>" name="whs_phone1" value="<?= old('whs_phone1') ? old('whs_phone1') : $whs[0]->whs_phone1 ; ?>">
                                            </div>
                                            <label for="whs_phone2" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_phone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_phone2')) : ?>is-invalid<?php endif ?>" id="whs_phone2" placeholder="<?= lang('Warehouse.whs_phone2'); ?>" name="whs_phone2" value="<?= old('whs_phone2') ? old('whs_phone2') : $whs[0]->whs_phone2 ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_phone3" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_phone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_phone3')) : ?>is-invalid<?php endif ?>" id="whs_phone3" placeholder="<?= lang('Warehouse.whs_phone3'); ?>" name="whs_phone3" value="<?= old('whs_phone3') ? old('whs_phone3') : $whs[0]->whs_phone3 ; ?>">
                                            </div>
                                            <label for="whs_phone2" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_badd" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_badd'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.whs_badd')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Warehouse.whs_badd'); ?>" name="whs_badd"><?= old('whs_badd') ? old('whs_badd') : $whs[0]->whs_badd ; ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="whs_bcount" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_bcount'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_bcount" name="whs_bcount" value="" />
                                                <select class="form-control <?php if(session('errors.whs_bcount')) : ?>is-invalid<?php endif ?>" name="bcountry" id="bcountry" >
                                                    <option selected="selected"><?= $bcount_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs_bprov" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_bprov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_bprov" name="whs_bprov" value="" />
                                                <select class="form-control <?php if(session('errors.whs_bprov')) : ?>is-invalid<?php endif ?>" name="bprov" id="bprov" >
                                                    <option selected="selected"><?= $bprov_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_bcity" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_bcity'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_bcity" name="whs_bcity" value="" />
                                                <select class="form-control <?php if(session('errors.whs_bcity')) : ?>is-invalid<?php endif ?>" name="bcity" id="bcity" >
                                                    <option selected="selected"><?= $bcity_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs_bpost" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_bpost'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_bpost')) : ?>is-invalid<?php endif ?>" id="whs_bpost" placeholder="<?= lang('Warehouse.whs_bpost'); ?>" name="whs_bpost" value="<?= old('whs_bpost') ? old('whs_bpost') : $whs[0]->whs_bpost ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_bphone1" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_bphone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_bphone1')) : ?>is-invalid<?php endif ?>" id="whs_bphone1" placeholder="<?= lang('Warehouse.whs_bphone1'); ?>" name="whs_bphone1" value="<?= old('whs_bphone1') ? old('whs_bphone1') : $whs[0]->whs_bphone1 ; ?>">
                                            </div>
                                            <label for="whs_bphone2" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_bphone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_bphone2')) : ?>is-invalid<?php endif ?>" id="whs_bphone2" placeholder="<?= lang('Warehouse.whs_bphone2'); ?>" name="whs_bphone2" value="<?= old('whs_bphone2') ? old('whs_bphone2') : $whs[0]->whs_bphone2 ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_bphone3" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_bphone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_bphone3')) : ?>is-invalid<?php endif ?>" id="whs_bphone3" placeholder="<?= lang('Warehouse.whs_bphone3'); ?>" name="whs_bphone3" value="<?= old('whs_bphone3') ? old('whs_bphone3') : $whs[0]->whs_bphone3 ; ?>">
                                            </div>
                                            <label for="whs_bphone2" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_madd" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_madd'); ?></label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control <?php if(session('errors.whs_madd')) : ?>is-invalid<?php endif ?>" rows="3" placeholder="<?= lang('Warehouse.whs_madd'); ?>" name="whs_madd"><?= old('whs_madd') ? old('whs_madd') : $whs[0]->whs_madd ; ?></textarea>
                                            </div>
                                        </div>
                        
                                        <div class="row mb-4">
                                            <label for="whs_mcount" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_mcount'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_mcount" name="whs_mcount" value="" />
                                                <select class="form-control <?php if(session('errors.whs_mcount')) : ?>is-invalid<?php endif ?>" name="mcountry" id="mcountry" >
                                                    <option selected="selected"><?= $mcount_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs_mprov" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_mprov'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_mprov" name="whs_mprov" value="" />
                                                <select class="form-control <?php if(session('errors.whs_mprov')) : ?>is-invalid<?php endif ?>" name="mprov" id="mprov" >
                                                    <option selected="selected"><?= $mprov_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_mcity" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_mcity'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs_mcity" name="whs_mcity" value="" />
                                                <select class="form-control <?php if(session('errors.whs_mcity')) : ?>is-invalid<?php endif ?>" name="mcity" id="mcity" >
                                                    <option selected="selected"><?= $mcity_name ?></option>
                                                </select>
                                            </div>
                                            <label for="whs_mpost" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_mpost'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_mpost')) : ?>is-invalid<?php endif ?>" id="whs_mpost" placeholder="<?= lang('Warehouse.whs_mpost'); ?>" name="whs_mpost" value="<?= old('whs_mpost') ? old('whs_mpost') : $whs[0]->whs_mpost ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_mphone1" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_mphone1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_mphone1')) : ?>is-invalid<?php endif ?>" id="whs_mphone1" placeholder="<?= lang('Warehouse.whs_mphone1'); ?>" name="whs_mphone1" value="<?= old('whs_mphone1') ? old('whs_mphone1') : $whs[0]->whs_mphone1 ; ?>">
                                            </div>
                                            <label for="whs_mphone2" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_mphone2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_mphone2')) : ?>is-invalid<?php endif ?>" id="whs_mphone2" placeholder="<?= lang('Warehouse.whs_mphone2'); ?>" name="whs_mphone2" value="<?= old('whs_mphone2') ? old('whs_mphone2') : $whs[0]->whs_mphone2 ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="whs_mphone3" class="col-sm-2 col-form-label"><?= lang('Warehouse.whs_mphone3'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.whs_mphone3')) : ?>is-invalid<?php endif ?>" id="whs_mphone3" placeholder="<?= lang('Warehouse.whs_mphone3'); ?>" name="whs_mphone3" value="<?= old('whs_mphone3') ? old('whs_mphone3') : $whs[0]->whs_mphone3 ; ?>">
                                            </div>
                                            <label for="whs_mphone2" class="col-sm-2 col-form-label">&nbsp;</label>
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

        $('#country').select2({
            placeholder: '<?= lang('Warehouse.whs_count'); ?>',
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
            $("#whs_count").val(data);
        });

        $('#prov').select2({
            placeholder: '<?= lang('Warehouse.whs_prov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#whs_count").val()                     
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#prov option:selected").val();
            $("#whs_prov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#city').select2({
            placeholder: '<?= lang('Warehouse.whs_city'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#whs_count").val(),                     
                        province_id: $("#whs_prov").val()                     
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#city option:selected").val();
            $("#whs_city").val(data);
            //alert("Data yang dipilih adalah "+data);
        });

        $('#bcountry').select2({
            placeholder: '<?= lang('Warehouse.whs_bcount'); ?>',
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
            $("#whs_bcount").val(data);
        });

        $('#bprov').select2({
            placeholder: '<?= lang('Warehouse.whs_bprov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#whs_bcount").val()                     
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#bprov option:selected").val();
            $("#whs_bprov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#bcity').select2({
            placeholder: '<?= lang('Warehouse.whs_bcity'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#whs_bcount").val(),                     
                        province_id: $("#whs_bprov").val()                     
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#bcity option:selected").val();
            $("#whs_bcity").val(data);
            //alert("Data yang dipilih adalah "+data);
        });

        $('#mcountry').select2({
            placeholder: '<?= lang('Warehouse.whs_mcount'); ?>',
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
            $("#whs_mcount").val(data);
        });

        $('#mprov').select2({
            placeholder: '<?= lang('Warehouse.whs_mprov'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#whs_mcount").val()                     
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#mprov option:selected").val();
            $("#whs_mprov").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
        
        $('#mcity').select2({
            placeholder: '<?= lang('Warehouse.whs_mcity'); ?>',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/cities/getByCountryAndProvince'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        q: params.term,
                        country_id: $("#whs_mcount").val(),                     
                        province_id: $("#whs_mprov").val()                     
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#mcity option:selected").val();
            $("#whs_mcity").val(data);
            //alert("Data yang dipilih adalah "+data);
        });
    });
</script>

<?= $this->endSection() ?>  