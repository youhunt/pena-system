<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                    </div>

                    <?= view('\Myth\Auth\Views\_message_block') ?>
 
                    <form action="<?= base_url(); ?>location/save" class="user" method="post">
 
                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="country">Company</label>
                            </div>
                            <div class="col-4">
                                <select name="comp_code" id="comp_code" class="form-control input-lg <?php if(session('errors.comp_code')) : ?>is-invalid<?php endif ?>">
                                    <option value="">Choose Company</option>
                                    <?php
                                    foreach($company as $row)
                                    {
                                        echo '<option value="'.$row["comp_code"].'">'.$row["comp_name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="site">Site</label>
                            </div>
                            <div class="col-4">
                                <select name="site_code" id="site_code" class="form-control input-lg <?php if(session('errors.site_code')) : ?>is-invalid<?php endif ?>">
                                    <option value="">Choose Site</option>
                                    <?php
                                    foreach($sites as $row)
                                    {
                                        echo '<option value="'.$row["site_code"].'">'.$row["site_name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="dept_code">Department</label>
                            </div>
                            <div class="col-4">
                                <select name="dept_code" id="dept_code" class="form-control input-lg <?php if(session('errors.dept_code')) : ?>is-invalid<?php endif ?>">
                                    <option value="">Choose Department</option>
                                    <?php
                                    foreach($departments as $row)
                                    {
                                        echo '<option value="'.$row["dept_code"].'">'.$row["dept_name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="whs_code">Warehouse</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_code" id=whst_code" class="form-control input-lg <?php if(session('errors.whs_code')) : ?>is-invalid<?php endif ?>">
                                    <option value="">Choose Warehouse</option>
                                    <?php
                                    foreach($warehouses as $row)
                                    {
                                        echo '<option value="'.$row["whs_code"].'">'.$row["whs_name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="loc_code">Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-control-user <?php if(session('errors.loc_code')) : ?>is-invalid<?php endif ?>"
                                name="loc_code" value="<?= old('loc_code') ?>" style="padding: .1rem .5rem .1rem .5rem;">
                            </div>
                            <div class="col-2">
                                <label for="loc_name">PIC</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_pic')) : ?>is-invalid<?php endif ?>" name="loc_pic" value="<?= old('loc_pic') ?>">
                            </div>                                                    
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="loc_name">Name</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_name')) : ?>is-invalid<?php endif ?>" name="loc_name" value="<?= old('loc_name') ?>">
                            </div>
                            <div class="col-2">
                                &nbsp;
                            </div>
                            <div class="col-4">
                                &nbsp;
                            </div>                           
                        </div>
 
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="loc_add">Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.loc_add')) : ?>is-invalid<?php endif ?>" id="loc_add" rows="2" name="loc_add"><?= old('loc_add') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="loc_count">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="loc_count" id="loc_count" class="form-control input-lg">
                                    <option value="">Choose Country</option>
                                    <?php
                                    foreach($countries as $row)
                                    {
                                        echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="loc_prov">State</label>
                            </div>
                            <div class="col-4">
                                <select name="loc_prov" id="loc_prov" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="loc_city">City</label>
                            </div>
                            <div class="col-4">
                                <select name="loc_city" id="loc_city" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="loc_post">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_post')) : ?>is-invalid<?php endif ?>" name="loc_post" value="<?= old('loc_post') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="loc_phone1">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_phone1')) : ?>is-invalid<?php endif ?>" name="loc_phone1" value="<?= old('loc_phone1') ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="loc_phone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_phone2')) : ?>is-invalid<?php endif ?>" name="loc_phone1" value="<?= old('loc_phone1') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="loc_phone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_phone3')) : ?>is-invalid<?php endif ?>" name="loc_phone3" value="<?= old('loc_phone3') ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_dadd">Whs Delivery Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.whs_dadd')) : ?>is-invalid<?php endif ?>" id="whs_dadd" rows="2" name="whs_dadd"><?= old('whs_dadd') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="bcountry">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_dcount" id="bcountry" class="form-control input-lg">
                                    <option value="">Choose Country</option>
                                    <?php
                                    foreach($countries as $row)
                                    {
                                        echo '<option value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="bstate">State</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_dprov" id="bstate" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="bcity">City</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_dcity" id="bcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="whs_dpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_dpost')) : ?>is-invalid<?php endif ?>" name="whs_dpost" value="<?= old('whs_dpost') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_dphone2">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_dphone1')) : ?>is-invalid<?php endif ?>" name="whs_dphone1" value="<?= old('whs_dphone1') ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="whs_dphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_dphone2')) : ?>is-invalid<?php endif ?>" name="whs_dphone2" value="<?= old('whs_dphone2') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_dphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_dphone3')) : ?>is-invalid<?php endif ?>" name="whs_dphone3" value="<?= old('whs_dphone3') ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                            </div>
                        </div>
                         
                    </form>
<!-- loc_post
loc_phone1loc_post
loc_phone2
loc_phone3 -->
<?= $this->endSection() ?>

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
        $('#loc_count').change(function(){

            var country_id = $('#loc_count').val();
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
                        $('#loc_prov').html(html);
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
                        $('#loc_city').html(html);
                    }
                });
            }
            else
            {
                $('#loc_prov').val('');
                $('#loc_city').val('');
            }
        });

        $('#loc_prov').change(function(){

            var state_id = $('#loc_prov').val();
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
                        $('#loc_city').html(html);
                    }
                });
            }
            else
            {
                $('#loc_city').val('');
            }
        });

        $('#whs_dcount').change(function(){

            var country_id = $('#whs_dcount').val();
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
                        $('#whs_dprov').html(html);
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
                        $('#whs_dcity').html(html);
                    }
                });
            }
            else
            {
                $('#whs_dprov').val('');
                $('#whs_dcity').val('');
            }
        });

        $('#whs_dprov').change(function(){

            var state_id = $('#whs_dprov').val();
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
                        $('#whs_dcity').html(html);
                    }
                });
            }
            else
            {
                $('#whs_dcity').val('');
            }
        });

        $('#loc_mcount').change(function(){

            var country_id = $('#loc_mcount').val();
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
                        $('#loc_mprov').html(html);
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
                        $('#loc_mcity').html(html);
                    }
                });
            }
            else
            {
                $('#loc_mprov').val('');
                $('#loc_mcity').val('');
            }
        });

        $('#loc_mprov').change(function(){

            var state_id = $('#loc_mprov').val();
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
                        $('#loc_mcity').html(html);
                    }
                });
            }
            else
            {
                $('#loc_mcity').val('');
            }
        });

    });
</script>

<?= $this->endSection() ?>  