<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>routing/update" class="user" method="post">
                        <input type="hidden" name="id" class="routing_id" value="<?= $routing[0]->id; ?>" ?>
                        <input type="hidden" name="routing_id" class="routing_id" value="<?= $routing[0]->id; ?>" ?>

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
                                            <label for="site" class="col-sm-2 col-form-label"><?= lang('Routing.site'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="site" name="site" value="<?= old('site') ? old('site') : $routing[0]->site ; ?>" />
                                                <input type="hidden" id="site_name" name="site_name" value="<?= old('site_name') ? old('site_name') : $site_name ; ?>" />
                                                <select class="form-control <?php if(session('errors.site')) : ?>is-invalid<?php endif ?>" name="site_code" id="site_code" >
                                                    <option selected="selected"><?= $site_name ?></option>
                                                </select>
                                            </div>
                                        
                                            <label for="dept" class="col-sm-2 col-form-label"><?= lang('Routing.dept'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="dept" name="dept" value="<?= old('dept') ? old('dept') : $routing[0]->dept ; ?>" />
                                                <input type="hidden" id="dept_name" name="dept_name" value="<?= old('dept_name') ? old('dept_name') : $dept_name ; ?>" />
                                                <select class="form-control <?php if(session('errors.dept')) : ?>is-invalid<?php endif ?>" name="dept_code" id="dept_code" >
                                                    <option selected="selected"><?= $dept_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="whs" class="col-sm-2 col-form-label"><?= lang('Routing.whs'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="whs" name="whs" value="<?= old('whs') ? old('whs') : $routing[0]->whs ; ?>" />
                                                <input type="hidden" id="whs_name" name="whs_name" value="<?= old('whs_name') ? old('whs_name') : $whs_name ; ?>" />
                                                <select class="form-control <?php if(session('errors.whs')) : ?>is-invalid<?php endif ?>" name="whs_code" id="whs_code" >
                                                    <option selected="selected"><?= $whs_name ?></option>
                                                </select>
                                            </div>
                                            <label for="itemcode" class="col-sm-2 col-form-label"><?= lang('Routing.itemcode'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.itemcode')) : ?>is-invalid<?php endif ?>" id="itemcode" placeholder="<?= lang('Routing.itemcode'); ?>" name="itemcode" value="<?= old('itemcode') ? old('itemcode') : $routing[0]->itemcode ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label for="description" class="col-sm-2 col-form-label"><?= lang('Routing.description'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.description')) : ?>is-invalid<?php endif ?>" id="description" placeholder="<?= lang('Routing.description'); ?>" name="description" value="<?= old('description') ? old('description') : $routing[0]->description ; ?>">
                                            </div>
                                            <label for="transname" class="col-sm-2 col-form-label">&nbsp;</label>
                                            <div class="col-sm-4">&nbsp;</div>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm">
                                            <h4 class="card-title"><?= $title_child ?></h4>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-auto">
                                            <div class="text-sm-end">
                                                <a href="#" class="btn btn-success btn-rounded" data-id="<?= $routing[0]->id; ?>" id="addMachine-btn"><i class="mdi mdi-plus me-1"></i><?= lang('Files.AddNew'); ?></a>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTableMachine" width="1768px" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th><?= lang('Routing.no'); ?></th>
                                                        <th><?= lang('Routing.machine'); ?></th>
                                                        <th><?= lang('Routing.notes1'); ?></th>
                                                        <th><?= lang('Routing.speed'); ?></th>
                                                        <th><?= lang('Routing.capacity'); ?></th>
                                                        <th><?= lang('Routing.length'); ?></th>
                                                        <th><?= lang('Routing.luom'); ?></th>
                                                        <th><?= lang('Routing.width'); ?></th>
                                                        <th><?= lang('Routing.wuom'); ?></th>
                                                        <th><?= lang('Routing.height'); ?></th>
                                                        <th><?= lang('Routing.huom'); ?></th>
                                                        <th><?= lang('Routing.volume'); ?></th>
                                                        <th><?= lang('Routing.vuom'); ?></th>
                                                        <th><?= lang('Routing.qtylabor'); ?></th>
                                                        <th><?= lang('Routing.workhour'); ?></th>
                                                        <th style="width: 40px;"><?= lang('Files.active'); ?></th>
                                                        <th style="width: 45px;"></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><?= lang('Routing.no'); ?></th>
                                                        <th><?= lang('Routing.machine'); ?></th>
                                                        <th><?= lang('Routing.notes1'); ?></th>
                                                        <th><?= lang('Routing.speed'); ?></th>
                                                        <th><?= lang('Routing.capacity'); ?></th>
                                                        <th><?= lang('Routing.length'); ?></th>
                                                        <th><?= lang('Routing.luom'); ?></th>
                                                        <th><?= lang('Routing.width'); ?></th>
                                                        <th><?= lang('Routing.wuom'); ?></th>
                                                        <th><?= lang('Routing.height'); ?></th>
                                                        <th><?= lang('Routing.huom'); ?></th>
                                                        <th><?= lang('Routing.volume'); ?></th>
                                                        <th><?= lang('Routing.vuom'); ?></th>
                                                        <th><?= lang('Routing.qtylabor'); ?></th>
                                                        <th><?= lang('Routing.workhour'); ?></th>
                                                        <th style="width: 40px;"><?= lang('Files.active'); ?></th>
                                                        <th style="width: 45px;"></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col-sm">
                                            <h4 class="card-title"><?= $title_child2 ?></h4>
                                        </div>
                                        <!-- end col -->
                                        <div class="col-sm-auto">
                                            <div class="text-sm-end">
                                                <a href="#" class="btn btn-success btn-rounded" data-id="<?= $routing[0]->id; ?>" id="addCost-btn"><i class="mdi mdi-plus me-1"></i><?= lang('Files.AddNew'); ?></a>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTableCost" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th><?= lang('Routing.costtype'); ?></th>
                                                        <th><?= lang('Routing.costamount'); ?></th>
                                                        <th><?= lang('Routing.costuom'); ?></th>
                                                        <th><?= lang('Routing.notes2'); ?></th>
                                                        <th style="width: 40px;"><?= lang('Files.active'); ?></th>
                                                        <th style="width: 45px;"></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th><?= lang('Routing.costtype'); ?></th>
                                                        <th><?= lang('Routing.costamount'); ?></th>
                                                        <th><?= lang('Routing.costuom'); ?></th>
                                                        <th><?= lang('Routing.notes2'); ?></th>
                                                        <th style="width: 40px;"><?= lang('Files.active'); ?></th>
                                                        <th style="width: 45px;"></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?= $this->endSection() ?>

<?= $this->section('div-modal') ?>
    
    <form method="post" id="routingMachineForm">
    <div class="modal fade" id="routingMachineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="routingLabel">Routing Machine</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row mb-2">
                        <label for="no" class="col-sm-2 col-form-label"><?= lang('Routing.no'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.no')) : ?>is-invalid<?php endif ?>" id="no" placeholder="<?= lang('Routing.no'); ?>" name="no" value="<?= old('no'); ?>">
                        </div>
                        <label for="machine" class="col-sm-2 col-form-label"><?= lang('Routing.machine'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.machine')) : ?>is-invalid<?php endif ?>" id="machine" placeholder="<?= lang('Routing.machine'); ?>" name="machine" value="<?= old('machine'); ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="notes1" class="col-sm-2 col-form-label"><?= lang('Routing.notes1'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.notes1')) : ?>is-invalid<?php endif ?>" id="notes1" placeholder="<?= lang('Routing.notes1'); ?>" name="notes1" value="<?= old('notes1'); ?>">
                        </div>
                        <label for="speed" class="col-sm-2 col-form-label"><?= lang('Routing.speed'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.speed')) : ?>is-invalid<?php endif ?>" id="speed" placeholder="<?= lang('Routing.speed'); ?>" style="text-align:right;" name="speed" value="<?= number_format((float)(old('speed')), 5, '.', '')  ; ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="capacity" class="col-sm-2 col-form-label"><?= lang('Routing.capacity'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.capacity')) : ?>is-invalid<?php endif ?>" id="capacity" placeholder="<?= lang('Routing.capacity'); ?>" style="text-align:right;" name="capacity" value="<?= number_format((float)(old('capacity')), 5, '.', '')  ; ?>">
                        </div>
                        <label for="qtyused" class="col-sm-2 col-form-label">&nbsp;</label>
                        <div class="col-sm-4">
                            &nbsp;
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="length" class="col-sm-2 col-form-label"><?= lang('Routing.length'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.length')) : ?>is-invalid<?php endif ?>" id="length" placeholder="<?= lang('Routing.length'); ?>" style="text-align:right;" name="length" value="<?= number_format((float)(old('length')), 5, '.', '')  ; ?>">
                        </div>
                        <label for="luom" class="col-sm-2 col-form-label"><?= lang('Routing.luom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="luom" name="luom" value="<?= old('luom'); ?>" />
                            <input type="hidden" id="luom_desc" name="luom_desc" value="<?= old('luom_desc'); ?>" />
                            <select class="form-control <?php if(session('errors.luom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemluom" id="itemluom" >
                                <option selected="selected"><?= old('luom_desc'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="width" class="col-sm-2 col-form-label"><?= lang('Routing.width'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.width')) : ?>is-invalid<?php endif ?>" id="width" placeholder="<?= lang('Routing.width'); ?>" style="text-align:right;" name="width" value="<?= number_format((float)(old('width')), 5, '.', '')  ; ?>">
                        </div>
                        <label for="wuom" class="col-sm-2 col-form-label"><?= lang('Routing.wuom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="wuom" name="wuom" value="<?= old('wuom'); ?>" />
                            <input type="hidden" id="wuom_desc" name="wuom_desc" value="<?= old('wuom_desc'); ?>" />
                            <select class="form-control <?php if(session('errors.wuom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemwuom" id="itemwuom" >
                                <option selected="selected"><?= old('wuom_desc'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="height" class="col-sm-2 col-form-label"><?= lang('Routing.height'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.height')) : ?>is-invalid<?php endif ?>" id="height" placeholder="<?= lang('Routing.height'); ?>" style="text-align:right;" name="height" value="<?= number_format((float)(old('height')), 5, '.', '')  ; ?>">
                        </div>
                        <label for="huom" class="col-sm-2 col-form-label"><?= lang('Routing.huom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="huom" name="huom" value="<?= old('huom'); ?>" />
                            <input type="hidden" id="huom_desc" name="huom_desc" value="<?= old('huom_desc'); ?>" />
                            <select class="form-control <?php if(session('errors.huom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemhuom" id="itemhuom" >
                                <option selected="selected"><?= old('huom_desc'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="volume" class="col-sm-2 col-form-label"><?= lang('Routing.volume'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.volume')) : ?>is-invalid<?php endif ?>" id="volume" placeholder="<?= lang('Routing.volume'); ?>" style="text-align:right;" name="volume" value="<?= number_format((float)(old('volume')), 5, '.', '')  ; ?>">
                        </div>
                        <label for="vuom" class="col-sm-2 col-form-label"><?= lang('Routing.vuom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="vuom" name="vuom" value="<?= old('vuom'); ?>" />
                            <input type="hidden" id="vuom_desc" name="vuom_desc" value="<?= old('vuom_desc'); ?>" />
                            <select class="form-control <?php if(session('errors.vuom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemvuom" id="itemvuom" >
                                <option selected="selected"><?= old('vuom_desc'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="qtylabor" class="col-sm-2 col-form-label"><?= lang('Routing.qtylabor'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.qtylabor')) : ?>is-invalid<?php endif ?>" id="qtylabor" placeholder="<?= lang('Routing.qtylabor'); ?>" style="text-align:right;" name="qtylabor" value="<?= number_format((float)(old('qtylabor')), 5, '.', '')  ; ?>">
                        </div>
                        <label for="workhour" class="col-sm-2 col-form-label"><?= lang('Routing.workhour'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.workhour')) : ?>is-invalid<?php endif ?>" id="workhour" placeholder="<?= lang('Routing.workhour'); ?>" style="text-align:right;" name="workhour" value="<?= number_format((float)(old('workhour')), 5, '.', '')  ; ?>">
                        </div>
                    </div>

                </div>
                
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="routing_id" class="routing_id" value="<?= $routing[0]->id; ?>" ?>
                
                    <input type="hidden" name="status" class="status">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form action="<?= base_url(); ?>routing/saveCost" method="post" id="routingCostForm">
    <div class="modal fade" id="routingCostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="routingLabel">Routing Cost</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row mb-2">
                        <label for="costtype" class="col-sm-2 col-form-label"><?= lang('Routing.costtype'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="costtype" name="costtype" value="<?= old('costtype'); ?>" />
                            <input type="hidden" id="costtype_desc" name="costtype_desc" value="<?= old('costtype_desc'); ?>" />
                            <select class="form-control <?php if(session('errors.costtype')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemcosttype" id="itemcosttype" >
                                <option selected="selected"><?= old('costtype_desc'); ?></option>
                            </select>
                        </div>
                        <label for="costamount" class="col-sm-2 col-form-label"><?= lang('Routing.costamount'); ?></label>
                        <div class="col-sm-4">
                            <input type="number" step="0.00001" class="form-control <?php if(session('errors.costamount')) : ?>is-invalid<?php endif ?>" id="costamount" placeholder="<?= lang('Routing.costamount'); ?>" style="text-align:right;" name="costamount" value="<?= number_format((float)(old('costamount')), 5, '.', '')  ; ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label for="costuom" class="col-sm-2 col-form-label"><?= lang('Routing.costuom'); ?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="costuom" name="costuom" value="<?= old('costuom'); ?>" />
                            <input type="hidden" id="costuom_desc" name="costuom_desc" value="<?= old('costuom_desc'); ?>" />
                            <select class="form-control <?php if(session('errors.costuom')) : ?>is-invalid<?php endif ?>" style="width: 100%;" name="itemcostuom" id="itemcostuom" >
                                <option selected="selected"><?= old('costuom_desc'); ?></option>
                            </select>
                        </div>
                        <label for="notes2" class="col-sm-2 col-form-label"><?= lang('Routing.notes2'); ?></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control <?php if(session('errors.notes2')) : ?>is-invalid<?php endif ?>" id="notes2" placeholder="<?= lang('Routing.notes2'); ?>" name="notes2" value="<?= old('notes2'); ?>">
                        </div>
                    </div>

                </div>
                
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="routing_id" class="routing_id" value="<?= $routing[0]->id; ?>" ?>
                
                    <input type="hidden" name="status" class="status">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form id="routingMachineDeleteForm" method="post">
    <div class="modal fade" id="routingMachineDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemLabel">Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to delete</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="routing_id" class="routing_id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form id="routingMachineActiveForm" method="post">
    <div class="modal fade" id="routingMachineActiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemLabel">Delete</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to <span id="msgActive"></span>.</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="active" class="active">
                    <input type="hidden" name="routing_id" class="routing_id">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form id="routingCostDeleteForm" method="post">
    <div class="modal fade" id="routingCostDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemLabel">Delete</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to delete</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="routing_id" class="routing_id">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form id="routingCostActiveForm" method="post">
    <div class="modal fade" id="routingCostActiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemLabel">Delete</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Choose "Yes" to <span id="msgActive"></span>.</div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <input type="hidden" name="active" class="active">
                    <input type="hidden" name="routing_id" class="routing_id">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    </form>

<?= $this->endSection() ?> 

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
        $("#routingMachineDeleteForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#routingMachineDeleteForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>routing/deleteMachine',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        dataTableMachine.ajax.reload();
                        $('#routingMachineDeleteModal').modal('hide');
                        alert("Work Center Machine deleted.");

                    } else {
                        if (data.Counter = 9999) {
                            var err="";
                            $.each( data.errors, function( key, value ) {
                                err += value + "\n";
                            });
                            alert(err);
                        }
                    }
                }
            });

        });

        $("#routingMachineActiveForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#routingMachineActiveForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>routing/deleteMachine',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        dataTableMachine.ajax.reload();
                        $('#routingMachineActiveModal').modal('hide');
                        alert("Work Center Machine updated.");

                    } else {
                        if (data.Counter = 9999) {
                            var err="";
                            $.each( data.errors, function( key, value ) {
                                err += value + "\n";
                            });
                            alert(err);
                        }
                    }
                }
            });

        });

        $("#routingMachineForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#routingMachineForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>routing/saveMachine',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        dataTableMachine.ajax.reload();
                        $('#routingMachineModal').modal('hide');
                        alert("Work Center Machine saved.");

                    } else {
                        if (data.Counter = 9999) {
                            var err="";
                            $.each( data.errors, function( key, value ) {
                                err += value + "\n";
                            });
                            alert(err);
                        }
                    }
                }
            });

        });

         $("#routingCostDeleteForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#routingCostDeleteForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>routing/deleteCost',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        dataTableCost.ajax.reload();
                        $('#routingCostDeleteModal').modal('hide');
                        alert("Work Center Cost deleted.");

                    } else {
                        if (data.Counter = 9999) {
                            var err="";
                            $.each( data.errors, function( key, value ) {
                                err += value + "\n";
                            });
                            alert(err);
                        }
                    }
                }
            });

        });

        $("#routingCostActiveForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#routingCostActiveForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>routing/deleteCost',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        dataTableCost.ajax.reload();
                        $('#routingCostActiveModal').modal('hide');
                        alert("Work Center Cost updated.");

                    } else {
                        if (data.Counter = 9999) {
                            var err="";
                            $.each( data.errors, function( key, value ) {
                                err += value + "\n";
                            });
                            alert(err);
                        }
                    }
                }
            });

        });

        $("#routingCostForm").submit(function (e) {
            e.preventDefault();

            // var formData = new FormData(this);
            var form = $('#routingCostForm')[0];
            var formData = new FormData(form);

            $.ajax({
                url: '<?= base_url(); ?>routing/saveCost',
                type: "POST",
                cache: false,
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    console.log(data)
                    if (data.Success) {

                        dataTableCost.ajax.reload();
                        $('#routingCostModal').modal('hide');
                        alert("Work Center Cost saved.");

                    } else {
                        if (data.Counter = 9999) {
                            var err="";
                            $.each( data.errors, function( key, value ) {
                                err += value + "\n";
                            });
                            alert(err);
                        }
                    }
                }
            });

        });


        $('#dataTableMachine tbody').on('click', '.btn-delete-routing_machine', function() {
            const id = $(this).data('id');
            const routing_id = $(this).data('routing_id');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.routing_id').val(routing_id);

            // Call Modal Edit
            $('#routingMachineDeleteModal').modal('show');
        });

        $('#dataTableMachine tbody').on('click', '.btn-active-routing_machine', function() {
            const id = $(this).data('id');
            const routing_id = $(this).data('routing_id');
            const active = $(this).data('active');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.routing_id').val(routing_id);
            $('.active').val(active);
            if (active == "1") {
                $('#msgActive').text("Inactive");
            } else if (active == "0") {
                $('#msgActive').text("Active");
            }

            // Call Modal Edit
            $('#routingMachineActiveModal').modal('show');
        });

        $('#addMachine-btn').on('click', function() {
            const id = $(this).data('id');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.status').val('1');

            // Call Modal Edit
            $('#routingMachineForm')[0].reset();
            $('#routingMachineModal').modal('show');
        });

        $('#dataTableMachine tbody').on('click', '.btn-update-routing_machine', function() {
            const id = $(this).data('id');
            const routing_id = $(this).data('routing_id');
            
            $('.id').val(id);
            $('.routing_id').val(routing_id);
            $('.status').val('2');
            $.ajax({
                url: "<?php echo site_url('routing/getRoutingMachineById') ?>",
                type: "post",
                data: {
                    id : id, 
                } ,
                success: function (response) {
                    var data = $.parseJSON(response); //(jsonStringify);
                    $('#routing_id').val(data[0].routing_id);
                    $('#no').val(data[0].no);
                    $('#notes1').val(data[0].notes1);
                    $('#speed').val(data[0].speed);
                    $('#capacity').val(data[0].capacity);
                    $('#length').val(data[0].length);
                    $('#luom').val(data[0].luom);
                    var uomSelect = $('#itemluom');
                    option = new Option(data[0].luom_desc, data[0].luom, true, true);
                    uomSelect.append(option).trigger('change');
                    $('#width').val(data[0].width);
                    $('#wuom').val(data[0].wuom);
                    uomSelect = $('#itemluom');
                    option = new Option(data[0].luom_desc, data[0].luom, true, true);
                    uomSelect.append(option).trigger('change');
                    $('#height').val(data[0].height);
                    $('#huom').val(data[0].huom);
                    uomSelect = $('#itemluom');
                    option = new Option(data[0].luom_desc, data[0].luom, true, true);
                    uomSelect.append(option).trigger('change');
                    $('#volume').val(data[0].volume);
                    $('#vuom').val(data[0].vuom);
                    uomSelect = $('#itemluom');
                    option = new Option(data[0].luom_desc, data[0].luom, true, true);
                    uomSelect.append(option).trigger('change');
                    $('#qtylabor').val(data[0].qtylabor);
                    $('#workhour').val(data[0].workhour);
                    
                },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

            // Call Modal Edit
            $('#routingMachineModal').modal('show');
        });

        $('#dataTableCost tbody').on('click', '.btn-delete-routing_cost', function() {
            const id = $(this).data('id');
            const routing_id = $(this).data('routing_id');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.routing_id').val(routing_id);

            // Call Modal Edit
            $('#routingCostDeleteModal').modal('show');
        });

        $('#dataTableCost tbody').on('click', '.btn-active-routing_cost', function() {
            const id = $(this).data('id');
            const routing_id = $(this).data('routing_id');
            const active = $(this).data('active');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.routing_id').val(routing_id);
            $('.active').val(active);
            if (active == "1") {
                $('#msgActive').text("Inactive");
            } else if (active == "0") {
                $('#msgActive').text("Active");
            }

            // Call Modal Edit
            $('#routingCostActiveModal').modal('show');
        });

        $('#addCost-btn').on('click', function() {
            const id = $(this).data('id');
            
            // Set data to Form Edit
            $('.id').val(id);
            $('.status').val('1');

            // Call Modal Edit
            $('#routingCostForm')[0].reset();
            $('#routingCostModal').modal('show');
        });

        $('#dataTableCost tbody').on('click', '.btn-update-routing_cost', function() {
            const id = $(this).data('id');
            const routing_id = $(this).data('routing_id');
            
            $('.id').val(id);
            $('.routing_id').val(routing_id);
            $('.status').val('2');
            $.ajax({
                url: "<?php echo site_url('routing/getRoutingCostById') ?>",
                type: "post",
                data: {
                    id : id, 
                } ,
                success: function (response) {
                    var data = $.parseJSON(response); //(jsonStringify);
                    $('#routing_id').val(data[0].routing_id);
                    $('#costtype').val(data[0].costtype);
                    $('#costamount').val(data[0].costamount);
                    $('#costuom').val(data[0].costuom);
                    $('#notes2').val(data[0].notes2);
                    var uomSelect = $('#itemcostuom');
                    option = new Option(data[0].costuom_desc, data[0].costuom, true, true);
                    uomSelect.append(option).trigger('change');
                    
                },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

            // Call Modal Edit
            $('#routingCostModal').modal('show');
        });

        var dataTableMachine = $('#dataTableMachine').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('routing/getRoutingMachine') ?>",
                "type": "POST",
                data: {
                    routing_id: $(".routing_id").val(),
                },
            },
            "columns": [
                {
                    "data": "no",
                    "width": "40px",
                    "searchable": true,
                },
                {
                    "data": "machine",
                    "width": "100px",
                    "searchable": true,
                },                
                {
                    "data": "notes1",
                    "width": "140px",
                    "searchable": true,
                },
                {
                    "data": "speed",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "capacity",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "length",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "luom",
                    "autoWidth": true,
                    "searchable": true,
                },                
                {
                    "data": "width",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "wuom",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "height",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "huom",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "volume",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "vuom",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "qtylabor",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "workhour",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "active", 
                    "width": "40px",
                    "render": function (data, type, row) {
                        var retVal = "";
                        if (data === null) return "";
                        if (data === "1") {
                            retVal = '<a href="#" class="btn btn-primary btn-circle btn-sm btn-active-routing_machine" title="Click to delete or INACTIVE item" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" data-active="' + row.active + '"><i class="fas fa-check"></i></a>';
                        } else if (data === "0") {
                            retVal = '<a href="#" class="btn btn-danger btn-circle btn-sm btn-active-routing_machine" title="Click to ACTIVE Item" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" data-active="' + row.active + '"><i class="fas fa-times"></i></a>';
                        }

                        return retVal;
                    },
                }, 
                {
                    "data": "no", 
                    "width": "45px",
                    "render": function (data, type, row) {
                        return '<a href="#" class="btn btn-warning btn-circle btn-sm btn-update-routing_machine" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" title="Edit" ><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger btn-circle btn-sm btn-delete-routing-child" title="Delete" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" ><i class="fas fa-times"></i></a>';
                    }
                },
            ]
        });

        var dataTableCost = $('#dataTableCost').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('routing/getRoutingCost') ?>",
                "type": "POST",
                data: {
                    routing_id: $(".routing_id").val(),
                },
            },
            "columns": [
                {
                    "data": "costtype",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "costamount",
                    "autoWidth": true,
                    "searchable": true,
                },                
                {
                    "data": "costuom",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "notes2",
                    "autoWidth": true,
                    "searchable": true,
                },
                {
                    "data": "active", 
                    "render": function (data, type, row) {
                        var retVal = "";
                        if (data === null) return "";
                        if (data === "1") {
                            retVal = '<a href="#" class="btn btn-primary btn-circle btn-sm btn-active-routing_cost" title="Click to delete or INACTIVE item" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" data-active="' + row.active + '"><i class="fas fa-check"></i></a>';
                        } else if (data === "0") {
                            retVal = '<a href="#" class="btn btn-danger btn-circle btn-sm btn-active-routing_cost" title="Click to ACTIVE Item" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" data-active="' + row.active + '"><i class="fas fa-times"></i></a>';
                        }

                        return retVal;
                    },
                }, 
                {
                    data: "no", render: function (data, type, row) {
                        return '<a href="#" class="btn btn-warning btn-circle btn-sm btn-update-routing_cost" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" title="Edit" ><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger btn-circle btn-sm btn-delete-routing-child" title="Delete" data-id="' + row.id + '" data-routing_id="' + row.routing_id + '" ><i class="fas fa-times"></i></a>';
                    }
                },
            ]
        });

        $('#whs_code').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/whs/getByDepartment'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        dept_id: $("#dept").val(),                   
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
            var data = $("#whs_code option:selected").val();
            $("#whs").val(data);
            $("#whs_name").val($("#whs_code option:selected").text());
        });

        $('#site_code').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/site/getAll'); ?>',
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
            var data = $("#site_code option:selected").val();
            $("#site").val(data);
            $("#site_name").val($("#site_code option:selected").text());
        });

        $('#dept_code').select2({
            placeholder: '|',
            minimumInputLength: 0,
            ajax: {
                url: '<?= base_url('/department/getBySite'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        site_id: $("#site").val(),                   
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
            var data = $("#dept_code option:selected").val();
            $("#dept").val(data);
            $("#dept_name").val($("#dept_code option:selected").text());
        });

        $('#uom_code').select2({
            placeholder: '|',
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
            var data = $("#uom_code option:selected").val();
            $("#uom").val(data);
            $("#uom_desc").val($("#uom_code option:selected").text());
        });

        $('#itemcosttype').select2({
            placeholder: '|',
            minimumInputLength: 0,
            dropdownParent: $('#routingCostModal'),
            ajax: {
                url: '<?= base_url('/costtype/getAll'); ?>',
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
            var data = $("#itemcosttype option:selected").val();
            $("#costtype").val(data);
            $("#costtype_desc").val($("#itemcosttype option:selected").text());
        });

        $('#itemcostuom').select2({
            placeholder: '|',
            minimumInputLength: 0,
            dropdownParent: $('#routingCostModal'),
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
            $("#costuom_desc").val($("#itemcostuom option:selected").text());
            $("#costuom").val($("#itemcostuom option:selected").val());
        });

        $('#itemluom').select2({
            placeholder: '|',
            minimumInputLength: 0,
            dropdownParent: $('#routingMachineModal'),
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
            $("#luom_desc").val($("#itemluom option:selected").text());
            $("#luom").val($("#itemluom option:selected").val());
        });

        $('#itemwuom').select2({
            placeholder: '|',
            minimumInputLength: 0,
            dropdownParent: $('#routingMachineModal'),
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
            $("#wuom_desc").val($("#itemwuom option:selected").text());
            $("#wuom").val($("#itemwuom option:selected").val());
        });

        $('#itemhuom').select2({
            placeholder: '|',
            minimumInputLength: 0,
            dropdownParent: $('#routingMachineModal'),
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
            $("#huom_desc").val($("#itemhuom option:selected").text());
            $("#huom").val($("#itemhuom option:selected").val());
        });

        $('#itemvuom').select2({
            placeholder: '|',
            minimumInputLength: 0,
            dropdownParent: $('#routingMachineModal'),
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
            $("#vuom_desc").val($("#itemvuom option:selected").text());
            $("#vuom").val($("#itemvuom option:selected").val());
        });

    });
</script>

<?= $this->endSection() ?>  