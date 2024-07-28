<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <form action="<?= base_url(); ?>transactioncode/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $transactioncode[0]->id; ?>" ?>

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
                                            <label for="company" class="col-sm-2 col-form-label"><?= lang('TransactionCode.company'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="company" name="company" value="<?= old('company') ? old('company') : $transactioncode[0]->company ; ?>" />
                                                <select class="form-control <?php if(session('errors.company')) : ?>is-invalid<?php endif ?>" name="comp_name" id="comp_name" >
                                                    <option selected="selected"><?= $comp_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="site" class="col-sm-2 col-form-label"><?= lang('TransactionCode.site'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="site" name="site" value="<?= old('site') ? old('site') : $transactioncode[0]->site ; ?>" />
                                                <select class="form-control <?php if(session('errors.site')) : ?>is-invalid<?php endif ?>" name="site_name" id="site_name" >
                                                    <option selected="selected"><?= $site_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="dept" class="col-sm-2 col-form-label"><?= lang('TransactionCode.dept'); ?></label>
                                            <div class="col-sm-6">
                                                <input type="hidden" id="dept" name="dept" value="<?= old('dept') ? old('dept') : $transactioncode[0]->dept ; ?>" />
                                                <select class="form-control <?php if(session('errors.dept')) : ?>is-invalid<?php endif ?>" name="dept_name" id="dept_name" >
                                                    <option selected="selected"><?= $dept_name ?></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="transcode" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transcode'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.transcode')) : ?>is-invalid<?php endif ?>" id="transcode" placeholder="<?= lang('TransactionCode.transcode'); ?>" name="transcode" value="<?= old('transcode') ? old('transcode') : $transactioncode[0]->transcode ; ?>">
                                            </div>
                                            <label for="transname" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transname'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.transname')) : ?>is-invalid<?php endif ?>" id="transname" placeholder="<?= lang('TransactionCode.transname'); ?>" name="transname" value="<?= old('transname') ? old('transname') : $transactioncode[0]->transname ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="module" class="col-sm-2 col-form-label"><?= lang('TransactionCode.module'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.module')) : ?>is-invalid<?php endif ?>" id="module" placeholder="<?= lang('TransactionCode.module'); ?>" name="module" value="<?= old('module') ? old('module') : $transactioncode[0]->module ; ?>">
                                            </div>
                                            <label for="transtype" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transtype'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="hidden" id="transtype" name="transtype" value="<?= old('transtype') ? old('transtype') : $transactioncode[0]->transtype ; ?>" />
                                                <select class="form-control <?php if(session('errors.transtype')) : ?>is-invalid<?php endif ?>" name="transtype" id="transtype" >
                                                    <option value="In">In</option>
                                                    <option value="Out">Out</option>
                                                    <option value="Adj">Adj</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="transnumber" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transnumber'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.transnumber')) : ?>is-invalid<?php endif ?>" id="transnumber" placeholder="<?= lang('TransactionCode.transnumber'); ?>" name="transnumber" value="<?= old('transnumber') ? old('transnumber') : $transactioncode[0]->transnumber ; ?>">
                                            </div>
                                            <label for="transdescription" class="col-sm-2 col-form-label"><?= lang('TransactionCode.transdescription'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.transdescription')) : ?>is-invalid<?php endif ?>" id="transdescription" placeholder="<?= lang('TransactionCode.transdescription'); ?>" name="transdescription" value="<?= old('transdescription') ? old('transdescription') : $transactioncode[0]->transdescription ; ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <label for="glcode" class="col-sm-2 col-form-label"><?= lang('TransactionCode.glcode'); ?></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control <?php if(session('errors.glcode')) : ?>is-invalid<?php endif ?>" id="glcode" placeholder="<?= lang('TransactionCode.glcode'); ?>" name="glcode" value="<?= old('glcode') ? old('glcode') : $transactioncode[0]->glcode ; ?>">
                                            </div>
                                            <label for="transdescription" class="col-sm-2 col-form-label">&nbsp;</label>
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
        $('#comp_name').select2({
            placeholder: '',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/company/getAll'); ?>',
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
            var data = $("#comp_name option:selected").val();
            $("#company").val(data);
        });

        $('#site_name').select2({
            placeholder: '',
            minimumInputLength: 1,
            ajax: {
                url: '<?= base_url('/site/getByCompany'); ?>',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        company_id: $("#company").val(),                   
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
            var data = $("#site_name option:selected").val();
            $("#company").val(data);
        });

        $('#dept_name').select2({
            placeholder: '',
            minimumInputLength: 1,
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
            }
        }).on('select2:select', function (evt) {
            var data = $("#dept_name option:selected").val();
            $("#dept").val(data);
        });

    });
</script>

<?= $this->endSection() ?>  