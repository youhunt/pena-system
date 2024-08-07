<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>cities/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $cities[0]->id; ?>" ?>

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
                                            <label for="Country" class="col-sm-2 col-form-label"><?= lang('Cities.Country'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="country_id" name="country_id" value="<?= old('country_id') ? old('country_id') : $cities[0]->country_id  ; ?>" />
                                                <select class="form-control <?php if(session('errors.country_id')) : ?>is-invalid<?php endif ?>" name="country" id="country" >
                                                    <option selected="selected"><?= old('country') ? old('country') : $cities[0]->country  ; ?></option>
                                                </select>
                                            </div>
                                            <label for="Province" class="col-sm-2 col-form-label"><?= lang('Cities.Province'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="province_id" name="province_id" value="" />
                                                <select class="form-control <?php if(session('errors.province_id')) : ?>is-invalid<?php endif ?>" name="province" id="province" >
                                                    <option selected="selected"><?= old('province') ? old('province') : $cities[0]->province  ; ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="city_code" class="col-sm-2 col-form-label"><?= lang('Cities.city_code'); ?></label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control <?php if(session('errors.city_code')) : ?>is-invalid<?php endif ?>" id="city_code" placeholder="<?= lang('Cities.city_code'); ?>" name="city_code" value="<?= old('city_code') ? old('city_code') : $cities[0]->city_code; ?>">
                                            </div>
                                            <label for="city_name" class="col-sm-2 col-form-label"><?= lang('Cities.city_name'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control <?php if(session('errors.city_name')) : ?>is-invalid<?php endif ?>" id="city_name" placeholder="<?= lang('Cities.city_name'); ?>" name="city_name" value="<?= old('city_name') ? old('city_name') : $cities[0]->city_name; ?>">
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
            placeholder: '|<?= lang('Cities.Country'); ?>',
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
            $("#country_id").val(data);
        });

        $('#province').select2({
            placeholder: '|<?= lang('Cities.Province'); ?>',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/provinces/getByCountry'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        country_id: $("#country_id").val(),                    
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
            var data = $("#province option:selected").val();
            $("#province_id").val(data);
        });

    });
</script>

<?= $this->endSection() ?>  