<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
 
                    <form action="<?= base_url(); ?>item/save" class="user" method="post">

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
                                            <label for="item_code" class="col-sm-2 col-form-label"><?= lang('Item.item_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_code')) : ?>is-invalid<?php endif ?>" id="item_code" placeholder="<?= lang('Item.item_code'); ?>" name="item_code" value="<?= old('item_code') ?>">
                                            </div>
                                            <label for="item_name_1" class="col-sm-2 col-form-label"><?= lang('Item.item_name_1'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_name_1')) : ?>is-invalid<?php endif ?>" id="item_code" placeholder="<?= lang('Item.item_name_1'); ?>" name="item_name_1" value="<?= old('item_name_1') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="item_name_2" class="col-sm-2 col-form-label"><?= lang('Item.item_name_2'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_name_2')) : ?>is-invalid<?php endif ?>" id="item_name_2" placeholder="<?= lang('Item.item_name_2'); ?>" name="item_name_2" value="<?= old('item_name_2') ?>">
                                            </div>
                                            <label for="item_code_additional" class="col-sm-2 col-form-label"><?= lang('Item.item_code_additional'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_code_additional')) : ?>is-invalid<?php endif ?>" id="item_code_additional" placeholder="<?= lang('Item.item_code_additional'); ?>" name="item_code_additional" value="<?= old('item_code_additional') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="item_name_additional" class="col-sm-2 col-form-label"><?= lang('Item.item_name_additional'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_name_additional')) : ?>is-invalid<?php endif ?>" id="item_name_additional" placeholder="<?= lang('Item.item_name_additional'); ?>" name="item_name_additional" value="<?= old('item_name_additional') ?>">
                                            </div>
                                            <label for="item_add" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">
                                                &nbsp;
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="shelf_life" class="col-sm-2 col-form-label"><?= lang('Item.shelf_life'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" step="0.01"class="form-control <?php if(session('errors.shelf_life')) : ?>is-invalid<?php endif ?>" id="shelf_life" placeholder="<?= lang('Item.shelf_life'); ?>" style="text-align:right;" name="shelf_life" value="<?= old('shelf_life') ?>">
                                            </div>
                                            <label for="stockuom" class="col-sm-2 col-form-label"><?= lang('Item.stockuom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="stockuom" name="stockuom" value="" />
                                                <select class="form-control <?php if(session('errors.stockuom')) : ?>is-invalid<?php endif ?>" name="uom" id="uom" ></select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="stockwhs" class="col-sm-2 col-form-label"><?= lang('Item.stockwhs'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="stockwhs" name="stockwhs" value="" />
                                                <select class="form-control <?php if(session('errors.stockwhs')) : ?>is-invalid<?php endif ?>" name="whs" id="whs" ></select>
                                            </div>
                                            <label for="item_price" class="col-sm-2 col-form-label"><?= lang('Item.item_price'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" step="0.01"class="form-control <?php if(session('errors.item_price')) : ?>is-invalid<?php endif ?>" id="item_price" placeholder="<?= lang('Item.item_price'); ?>" name="item_price" style="text-align:right;" value="<?= old('item_price') ?>">
                                            </div>
                                        </div>
                                        
                                        <h5 class="card-title mb-2"><?= lang('Item.Dimension'); ?></h5>

                                        <div class="row mb-1">
                                            <label for="item_length" class="col-sm-1 col-form-label"><?= lang('Item.item_length'); ?></label>
                                            <div class="col-sm-2">
                                                <input type="number" step="0.01"class="form-control <?php if(session('errors.item_length')) : ?>is-invalid<?php endif ?>" id="item_length" placeholder="<?= lang('Item.item_length'); ?>" name="item_length" style="text-align:right;" value="<?= old('item_length') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <label for="item_width" class="col-sm-1 col-form-label"><?= lang('Item.item_width'); ?></label>
                                            <div class="col-sm-2">
                                                <input type="number" step="0.01"class="form-control <?php if(session('errors.item_width')) : ?>is-invalid<?php endif ?>" id="item_width" placeholder="<?= lang('Item.item_width'); ?>" name="item_width" style="text-align:right;" value="<?= old('item_width') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <label for="item_height" class="col-sm-1 col-form-label"><?= lang('Item.item_height'); ?></label>
                                            <div class="col-sm-2">
                                                <input type="number" step="0.01"class="form-control <?php if(session('errors.item_height')) : ?>is-invalid<?php endif ?>" id="item_height" placeholder="<?= lang('Item.item_height'); ?>" name="item_height" style="text-align:right;" value="<?= old('item_height') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-1">
                                            <label for="item_diameter" class="col-sm-1 col-form-label"><?= lang('Item.item_diameter'); ?></label>
                                            <div class="col-sm-2">
                                                <input type="number" step="0.01"class="form-control <?php if(session('errors.item_diameter')) : ?>is-invalid<?php endif ?>" id="item_diameter" placeholder="<?= lang('Item.item_diameter'); ?>" name="item_diameter" value="<?= old('item_diameter') ?>">
                                            </div>
                                        </div>
                                        <h5 class="card-title mb-2"><?= lang('Item.Grouping'); ?></h5>

                                        <div class="row mb-2">
                                            <label for="item_group" class="col-sm-2 col-form-label"><?= lang('Item.item_group'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_group')) : ?>is-invalid<?php endif ?>" id="item_group" placeholder="<?= lang('Item.item_group'); ?>" name="item_group" value="<?= old('item_group') ?>">
                                            </div>
                                            <label for="item_subgroup" class="col-sm-2 col-form-label"><?= lang('Item.item_subgroup'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_subgroup')) : ?>is-invalid<?php endif ?>" id="item_subgroup" placeholder="<?= lang('Item.item_subgroup'); ?>" name="item_subgroup" value="<?= old('item_subgroup') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="item_class" class="col-sm-2 col-form-label"><?= lang('Item.item_class'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_class')) : ?>is-invalid<?php endif ?>" id="item_class" placeholder="<?= lang('Item.item_class'); ?>" name="item_class" value="<?= old('item_class') ?>">
                                            </div>
                                            <label for="item_subclass" class="col-sm-2 col-form-label"><?= lang('Item.item_subclass'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_subclass')) : ?>is-invalid<?php endif ?>" id="item_subclass" placeholder="<?= lang('Item.item_subclass'); ?>" name="item_subclass" value="<?= old('item_subclass') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="item_type" class="col-sm-2 col-form-label"><?= lang('Item.item_type'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_type')) : ?>is-invalid<?php endif ?>" id="item_type" placeholder="<?= lang('Item.item_type'); ?>" name="item_type" value="<?= old('item_type') ?>">
                                            </div>
                                            <label for="item_subtype" class="col-sm-2 col-form-label"><?= lang('Item.item_subtype'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_subtype')) : ?>is-invalid<?php endif ?>" id="item_subtype" placeholder="<?= lang('Item.item_subtype'); ?>" name="item_subtype" value="<?= old('item_subtype') ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="item_atribute" class="col-sm-2 col-form-label"><?= lang('Item.item_atribute'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.item_atribute')) : ?>is-invalid<?php endif ?>" id="item_atribute" placeholder="<?= lang('Item.item_atribute'); ?>" name="item_atribute" value="<?= old('item_atribute') ?>">
                                            </div>
                                            <label for="item_add" class="col-sm-2 col-form-label">&nbsp;</label>
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
        
        $('#uom').select2({
            placeholder: '|<?= lang('Item.stockuom'); ?>',
            minimumInputLength: 0,
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
            var data = $("#uom option:selected").val();
            $("#stockuom").val(data);
        });

        $('#whs').select2({
            placeholder: '|<?= lang('Item.stockwhs'); ?>',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/warehouse/getAll'); ?>',
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
            var data = $("#whs option:selected").val();
            $("#stockwhs").val(data);
        });

    });
</script>

<?= $this->endSection() ?>  