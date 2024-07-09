<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                    </div>

                    <?= view('\Myth\Auth\Views\_message_block') ?>
 
                    <form action="<?= base_url(); ?>uom/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $uom[0]->id; ?>" ?>
 
                        <div class="form-group row">
                            <div class="col-1">
                                <label for="uom_code">Code</label>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control form-control-user <?php if(session('errors.uom_code')) : ?>is-invalid<?php endif ?>" name="uom_code" value="<?= $uom[0]->uom_code ? $uom[0]->uom_code : old('uom_code'); ?>" style="padding: .1rem .5rem .1rem .5rem;">
                            </div>
                            <div class="col-2">
                                <label for="uom_desc">Description</label>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control form-control-user <?php if(session('errors.uom_desc')) : ?>is-invalid<?php endif ?>" name="uom_desc" value="<?= $uom[0]->uom_desc ? $uom[0]->uom_desc : old('uom_desc'); ?>" style="padding: .1rem .5rem .1rem .5rem;">
                            </div>
                        </div>
 
                        <br>
 
                        <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                         
                    </form>
 
<?= $this->endSection() ?>   