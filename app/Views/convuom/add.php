<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>convuom/save" class="user" method="post">

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
                                            <label for="fr_uom" class="col-sm-2 col-form-label"><?= lang('ConvUOM.fr_uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="fr_uom" name="fr_uom" value="" />
                                                <select class="form-control <?php if(session('errors.fr_uom')) : ?>is-invalid<?php endif ?>" name="fruom" id="fruom" ></select>
                                            </div>
                                            <label for="to_uom" class="col-sm-2 col-form-label"><?= lang('ConvUOM.to_uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="to_uom" name="to_uom" value="" />
                                                <select class="form-control <?php if(session('errors.to_uom')) : ?>is-invalid<?php endif ?>" name="touom" id="touom" ></select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="value" class="col-sm-2 col-form-label"><?= lang('ConvUOM.value'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control <?php if(session('errors.value')) : ?>is-invalid<?php endif ?>" id="value" placeholder="<?= lang('ConvUOM.value'); ?>" name="value" value="<?=  old('value'); ?>">
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