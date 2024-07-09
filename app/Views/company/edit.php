<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                    </div>

                    <?= view('\Myth\Auth\Views\_message_block') ?>
 
                    <form action="<?= base_url(); ?>company/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $company[0]->id; ?>" ?>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="comp_code">Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-control-user <?php if(session('errors.comp_code')) : ?>is-invalid<?php endif ?>"
                                name="comp_code" value="<?= $company[0]->comp_code ? $company[0]->comp_code : old('comp_code'); ?>" style="padding: .1rem .5rem .1rem .5rem;">
                            </div>
                            <div class="col-2">
                                <label for="comp_name">PIC</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.comp_pic')) : ?>is-invalid<?php endif ?>" name="comp_pic" value="<?= $company[0]->comp_pic ? $company[0]->comp_pic :  old('comp_pic'); ?>">
                            </div>                                                    
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="comp_name">Name</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.comp_name')) : ?>is-invalid<?php endif ?>" name="comp_name" value="<?=  $company[0]->comp_name ? $company[0]->comp_name :  old('comp_name'); ?>">
                            </div>
                            <div class="col-2">
                                <label for="comp_taxid">Company Tax ID</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.comp_taxid')) : ?>is-invalid<?php endif ?>" name="comp_taxid" value="<?=  $company[0]->comp_pic ? $company[0]->comp_pic :  old('comp_pic'); ?>">
                            </div>                            
                        </div>
 
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="comp_add">Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.comp_add')) : ?>is-invalid<?php endif ?>" id="comp_add" name="comp_add" rows="2"><?= $company[0]->comp_add ? $company[0]->comp_add :  old('comp_add'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="country">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="comp_count" id="country" class="form-control input-lg">
                                    <option value="">Choose Country</option>
                                    <?php
                                    foreach($countries as $row)
                                    {
                                        echo '<option '.($row["id"]===$company[0]->comp_count ? "selected" :  "").' value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="state">State</label>
                            </div>
                            <div class="col-4">
                                <select name="comp_prov" id="state" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                    <?php
                                    foreach($states as $row)
                                    {
                                        echo '<option '.($row->id===$company[0]->comp_prov ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="city">City</label>
                            </div>
                            <div class="col-4">
                                <select name="comp_city" id="city" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                    <?php
                                    foreach($cities as $row)
                                    {
                                        echo '<option '.($row->id===$company[0]->comp_city ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="city">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.comp_post')) : ?>is-invalid<?php endif ?>" name="comp_post" value="<?=  $company[0]->comp_post ? $company[0]->comp_post :  old('comp_post'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="city">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.comp_phone1')) : ?>is-invalid<?php endif ?>" name="comp_phone1" value="<?=  $company[0]->comp_phone1 ? $company[0]->comp_pic :  old('comp_phone1'); ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="city">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.comp_phone2')) : ?>is-invalid<?php endif ?>" name="comp_phone2" value="<?=  $company[0]->comp_phone2 ? $company[0]->comp_phone2 :  old('comp_phone2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="city">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.comp_phone3')) : ?>is-invalid<?php endif ?>" name="comp_phone3" value="<?=  $company[0]->comp_phone3 ? $company[0]->comp_phone3 :  old('comp_phone3'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                            </div>
                        </div>
                         
                    </form>
<!-- comp_post
comp_phone1comp_post
comp_phone2
comp_phone3 -->
<?= $this->endSection() ?>

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
        $('#country').change(function(){

            var country_id = $('#country').val();
            if(country_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url('/states/ByCountry/'); ?>"+country_id,
                    method:"get",
                    dataType:"JSON",
                    success:function(data)
                    {
                        var html = '<option value="">Choose State</option>';

                        for(var count = 0; count < data.length; count++)
                        {

                            html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';

                        }
                        $('#state').html(html);
                    }
                });
                $.ajax({
                    url:"<?php echo base_url('/cities/ByCountry/'); ?>"+country_id,
                    method:"get",
                    dataType:"JSON",
                    success:function(data)
                    {
                        var html = '<option value="">Choose City</option>';

                        for(var count = 0; count < data.length; count++)
                        {

                            html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';

                        }
                        $('#city').html(html);
                    }
                });
            }
            else
            {
                $('#state').val('');
                $('#city').val('');
            }
        });

        $('#state').change(function(){

            var state_id = $('#state').val();
            if(state_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url('/cities/ByState/'); ?>"+state_id,
                    method:"get",
                    dataType:"JSON",
                    success:function(data)
                    {
                        var html = '<option value="">Choose City</option>';

                        for(var count = 0; count < data.length; count++)
                        {

                            html += '<option value="'+data[count].id+'">'+data[count].name+'</option>';

                        }
                        $('#city').html(html);
                    }
                });
            }
            else
            {
                $('#city').val('');
            }
        });

    });
</script>

<?= $this->endSection() ?>  