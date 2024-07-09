<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                    </div>

                    <?= view('\Myth\Auth\Views\_message_block') ?>
 
                    <form action="<?= base_url(); ?>warehouse/save" class="user" method="post">
 
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
                                &nbsp;
                            </div>
                            <div class="col-4">
                                &nbsp;
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_code">Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-control-user <?php if(session('errors.whs_code')) : ?>is-invalid<?php endif ?>"
                                name="whs_code" value="<?= old('whs_code') ?>" style="padding: .1rem .5rem .1rem .5rem;">
                            </div>
                            <div class="col-2">
                                <label for="whs_name">PIC</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_pic')) : ?>is-invalid<?php endif ?>" name="whs_pic" value="<?= old('whs_pic') ?>">
                            </div>                                                    
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_name">Name</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_name')) : ?>is-invalid<?php endif ?>" name="whs_name" value="<?= old('whs_name') ?>">
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
                                <label for="whs_add">Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.whs_add')) : ?>is-invalid<?php endif ?>" id="whs_add" rows="2" name="whs_add"><?= old('whs_add') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="whs_count">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_count" id="whs_count" class="form-control input-lg">
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
                                <label for="whs_prov">State</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_prov" id="whs_prov" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_city">City</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_city" id="whs_city" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="whs_post">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_post')) : ?>is-invalid<?php endif ?>" name="whs_post" value="<?= old('whs_post') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_phone1">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_phone1')) : ?>is-invalid<?php endif ?>" name="whs_phone1" value="<?= old('whs_phone1') ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="whs_phone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_phone2')) : ?>is-invalid<?php endif ?>" name="whs_phone1" value="<?= old('whs_phone1') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_phone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_phone3')) : ?>is-invalid<?php endif ?>" name="whs_phone3" value="<?= old('whs_phone3') ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_badd">Billing Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.whs_badd')) : ?>is-invalid<?php endif ?>" id="whs_badd" rows="2" name="whs_badd"><?= old('whs_badd') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="bcountry">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_bcount" id="bcountry" class="form-control input-lg">
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
                                <select name="whs_bprov" id="bstate" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="bcity">City</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_bcity" id="bcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="whs_bpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_bpost')) : ?>is-invalid<?php endif ?>" name="whs_bpost" value="<?= old('whs_bpost') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_bphone2">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_bphone1')) : ?>is-invalid<?php endif ?>" name="whs_bphone1" value="<?= old('whs_bphone1') ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="whs_bphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_bphone2')) : ?>is-invalid<?php endif ?>" name="whs_bphone2" value="<?= old('whs_bphone2') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_bphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_bphone3')) : ?>is-invalid<?php endif ?>" name="whs_bphone3" value="<?= old('whs_bphone3') ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_madd">Mailing Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.whs_madd')) : ?>is-invalid<?php endif ?>" id="whs_madd" rows="2" name="whs_madd"><?= old('whs_madd') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="country">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_mcount" id="country" class="form-control input-lg">
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
                                <label for="state">State</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_mprov" id="state" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="city">City</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_mcity" id="mcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="whs_mpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_mpost')) : ?>is-invalid<?php endif ?>" name="whs_mpost" value="<?= old('whs_mpost') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_mphone1">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_mphone1')) : ?>is-invalid<?php endif ?>" name="whs_mphone1" value="<?= old('whs_mphone1') ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="whs_mphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_mphone2')) : ?>is-invalid<?php endif ?>" name="whs_mphone2" value="<?= old('whs_mphone2') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_mphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_mphone3')) : ?>is-invalid<?php endif ?>" name="whs_mphone3" value="<?= old('whs_mphone3') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                            </div>
                        </div>
                         
                    </form>
<!-- whs_post
whs_phone1whs_post
whs_phone2
whs_phone3 -->
<?= $this->endSection() ?>

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
        $('#whs_count').change(function(){

            var country_id = $('#whs_count').val();
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
                        $('#whs_prov').html(html);
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
                        $('#whs_city').html(html);
                    }
                });
            }
            else
            {
                $('#whs_prov').val('');
                $('#whs_city').val('');
            }
        });

        $('#whs_prov').change(function(){

            var state_id = $('#whs_prov').val();
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
                        $('#whs_city').html(html);
                    }
                });
            }
            else
            {
                $('#whs_city').val('');
            }
        });

        $('#whs_bcount').change(function(){

            var country_id = $('#whs_bcount').val();
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
                        $('#whs_bprov').html(html);
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
                        $('#whs_bcity').html(html);
                    }
                });
            }
            else
            {
                $('#whs_bprov').val('');
                $('#whs_bcity').val('');
            }
        });

        $('#whs_bprov').change(function(){

            var state_id = $('#whs_bprov').val();
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
                        $('#whs_bcity').html(html);
                    }
                });
            }
            else
            {
                $('#whs_bcity').val('');
            }
        });

        $('#whs_mcount').change(function(){

            var country_id = $('#whs_mcount').val();
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
                        $('#whs_mprov').html(html);
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
                        $('#whs_mcity').html(html);
                    }
                });
            }
            else
            {
                $('#whs_mprov').val('');
                $('#whs_mcity').val('');
            }
        });

        $('#whs_mprov').change(function(){

            var state_id = $('#whs_mprov').val();
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
                        $('#whs_mcity').html(html);
                    }
                });
            }
            else
            {
                $('#whs_mcity').val('');
            }
        });

    });
</script>

<?= $this->endSection() ?>  