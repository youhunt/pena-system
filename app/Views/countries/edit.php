<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>countries/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $countries[0]->id; ?>" ?>

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
                                            <label for="country_code" class="col-sm-2 col-form-label"><?= lang('Countries.country_code'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.country_code')) : ?>is-invalid<?php endif ?>" id="country_code" placeholder="<?= lang('Countries.country_code'); ?>" name="country_code" value="<?= old('country_code') ? old('country_code') : $countries[0]->country_code; ?>">
                                            </div>
                                            <label for="country_name" class="col-sm-2 col-form-label"><?= lang('Countries.country_name'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.country_name')) : ?>is-invalid<?php endif ?>" id="country_name" placeholder="<?= lang('Countries.country_name'); ?>" name="country_name" value="<?= old('country_name') ? old('country_name') : $countries[0]->country_name; ?>">
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