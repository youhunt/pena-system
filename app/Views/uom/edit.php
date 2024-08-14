<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>uom/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $uom[0]->id; ?>" ?>

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
                                            <label for="uom_code" class="col-sm-2 col-form-label"><?= lang('UOM.uom_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.uom_code')) : ?>is-invalid<?php endif ?>" id="uom_code" placeholder="<?= lang('UOM.uom_code'); ?>" name="uom_code" value="<?= old('uom_code') ? old('uom_code') : $uom[0]->uom_code; ?>">
                                            </div>
                                            <label for="uom_desc" class="col-sm-2 col-form-label"><?= lang('UOM.uom_desc'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.uom_desc')) : ?>is-invalid<?php endif ?>" id="comp_code" placeholder="<?= lang('UOM.uom_desc'); ?>" name="uom_desc" value="<?= old('uom_desc') ? old('uom_desc') : $uom[0]->uom_desc; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="uomdec" class="col-sm-2 col-form-label"><?= lang('UOM.uomdec'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" step="0.00001" class="form-control <?php if(session('errors.uomdec')) : ?>is-invalid<?php endif ?>" id="uomdec" placeholder="<?= lang('UOM.uomdec'); ?>" name="uomdec" value="<?= number_format((float)(old('uomdec') ? old('uomdec') : $uom[0]->uomdec), 5, '.', ''); ?>">
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