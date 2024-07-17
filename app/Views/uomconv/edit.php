<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>uomconv/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $uomconv[0]->id; ?>" ?>

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
                                            <label for="fr_uom" class="col-sm-2 col-form-label"><?= lang('UOM.fr_uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.fr_uom')) : ?>is-invalid<?php endif ?>" id="fr_uom" placeholder="<?= lang('UOM.fr_uom'); ?>" name="fr_uom" value="<?= old('fr_uom') ? old('fr_uom') : $uomconv[0]->fr_uom; ?>">
                                            </div>
                                            <label for="to_uom" class="col-sm-2 col-form-label"><?= lang('UOM.to_uom'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.to_uom')) : ?>is-invalid<?php endif ?>" id="comp_code" placeholder="<?= lang('UOM.to_uom'); ?>" name="to_uom" value="<?= old('to_uom') ? old('to_uom') : $uomconv[0]->to_uom; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="value" class="col-sm-2 col-form-label"><?= lang('UOM.value'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control <?php if(session('errors.value')) : ?>is-invalid<?php endif ?>" id="value" placeholder="<?= lang('UOM.value'); ?>" name="value" value="<?= old('value') ? old('value') : $uomconv[0]->value; ?>">
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