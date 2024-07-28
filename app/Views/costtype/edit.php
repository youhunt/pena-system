<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>costtype/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $costtype[0]->id; ?>" ?>

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
                                            <label for="type" class="col-sm-2 col-form-label"><?= lang('CostType.type'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.type')) : ?>is-invalid<?php endif ?>" id="type" placeholder="<?= lang('CostType.type'); ?>" name="type" value="<?= old('type') ? old('type') : $costtype[0]->type; ?>">
                                            </div>
                                            <label for="description" class="col-sm-2 col-form-label"><?= lang('CostType.description'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.description')) : ?>is-invalid<?php endif ?>" id="comp_code" placeholder="<?= lang('CostType.description'); ?>" name="description" value="<?= old('description') ? old('description') : $costtype[0]->description; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="group" class="col-sm-2 col-form-label"><?= lang('CostType.group'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.group')) : ?>is-invalid<?php endif ?>" id="group" placeholder="<?= lang('CostType.group'); ?>" name="group" value="<?= old('group') ? old('group') : $costtype[0]->group; ?>">
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