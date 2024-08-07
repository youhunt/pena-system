<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>provinces/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $provinces[0]->id; ?>" ?>

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
                                            <label for="Country" class="col-sm-2 col-form-label"><?= lang('Provinces.Country'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="country_id" name="country_id" value="<?= old('country_id') ? old('country_id') : $provinces[0]->country_id  ; ?>" />
                                                <select class="form-control <?php if(session('errors.country_id')) : ?>is-invalid<?php endif ?>" name="country" id="country" >
                                                    <option selected="selected"><?= old('country') ? old('country') : $provinces[0]->country  ; ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="province_code" class="col-sm-2 col-form-label"><?= lang('Provinces.province_code'); ?></label>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control <?php if(session('errors.province_code')) : ?>is-invalid<?php endif ?>" id="province_code" placeholder="<?= lang('Provinces.province_code'); ?>" name="province_code" value="<?= old('province_code') ? old('province_code') : $provinces[0]->province_code; ?>">
                                            </div>
                                            <label for="province_name" class="col-sm-2 col-form-label"><?= lang('Provinces.province_name'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control <?php if(session('errors.province_name')) : ?>is-invalid<?php endif ?>" id="province_name" placeholder="<?= lang('Provinces.province_name'); ?>" name="province_name" value="<?= old('province_name') ? old('province_name') : $provinces[0]->province_name; ?>">
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
            placeholder: '<?= lang('Provinces.Country'); ?>',
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
            $("#country_id").val(data);
        });

    });
</script>

<?= $this->endSection() ?>  