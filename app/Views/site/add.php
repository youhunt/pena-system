<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                    </div>

                    <?= view('\Myth\Auth\Views\_message_block') ?>
 
                    <form action="<?= base_url(); ?>site/save" class="user" method="post">
 
                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="country">Company</label>
                            </div>
                            <div class="col-4">
                                <select name="comp_code" id="country" class="form-control input-lg">
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
                                &nbsp;
                            </div>
                            <div class="col-4">
                                &nbsp;
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="site_code">Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-control-user <?php if(session('errors.site_code')) : ?>is-invalid<?php endif ?>"
                                name="site_code" value="<?= old('site_code') ?>" style="padding: .1rem .5rem .1rem .5rem;">
                            </div>
                            <div class="col-2">
                                <label for="site_name">PIC</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_pic')) : ?>is-invalid<?php endif ?>" name="site_pic" value="<?= old('site_pic') ?>">
                            </div>                                                    
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="site_name">Name</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_name')) : ?>is-invalid<?php endif ?>" name="site_name" value="<?= old('site_name') ?>">
                            </div>
                            <div class="col-2">
                                <label for="site_taxid">Site Tax ID</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_taxid')) : ?>is-invalid<?php endif ?>" name="site_taxid" value="<?= old('site_taxid') ?>">
                            </div>                            
                        </div>
 
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="site_add">Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.site_add')) : ?>is-invalid<?php endif ?>" id="site_add" rows="2" name="site_add"><?= old('site_add') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="country">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="site_count" id="country" class="form-control input-lg">
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
                                <select name="site_prov" id="state" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="city">City</label>
                            </div>
                            <div class="col-4">
                                <select name="site_city" id="city" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="city">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_post')) : ?>is-invalid<?php endif ?>" name="site_post" value="<?= old('site_post') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="city">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_phone1')) : ?>is-invalid<?php endif ?>" name="site_phone1" value="<?= old('site_phone1') ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="city">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_phone2')) : ?>is-invalid<?php endif ?>" name="site_phone1" value="<?= old('site_phone1') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="city">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_phone3')) : ?>is-invalid<?php endif ?>" name="site_phone3" value="<?= old('site_phone3') ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="site_badd">Billing Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.site_badd')) : ?>is-invalid<?php endif ?>" id="site_badd" rows="2" name="site_badd"><?= old('site_badd') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="bcountry">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="site_bcount" id="bcountry" class="form-control input-lg">
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
                                <select name="site_bprov" id="bstate" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="bcity">City</label>
                            </div>
                            <div class="col-4">
                                <select name="site_bcity" id="bcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="site_bpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_bpost')) : ?>is-invalid<?php endif ?>" name="site_bpost" value="<?= old('site_bpost') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="site_bphone2">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_bphone1')) : ?>is-invalid<?php endif ?>" name="site_bphone1" value="<?= old('site_bphone1') ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="site_bphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_bphone2')) : ?>is-invalid<?php endif ?>" name="site_bphone2" value="<?= old('site_bphone2') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="site_bphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_bphone3')) : ?>is-invalid<?php endif ?>" name="site_bphone3" value="<?= old('site_bphone3') ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="site_madd">Mailing Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.site_madd')) : ?>is-invalid<?php endif ?>" id="site_madd" rows="2" name="site_madd"><?= old('site_madd') ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="country">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="site_mcount" id="country" class="form-control input-lg">
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
                                <select name="site_mprov" id="state" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="city">City</label>
                            </div>
                            <div class="col-4">
                                <select name="site_mcity" id="mcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="site_mpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_mpost')) : ?>is-invalid<?php endif ?>" name="site_mpost" value="<?= old('site_mpost') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="site_mphone1">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_mphone1')) : ?>is-invalid<?php endif ?>" name="site_mphone1" value="<?= old('site_mphone1') ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="site_mphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_mphone2')) : ?>is-invalid<?php endif ?>" name="site_mphone2" value="<?= old('site_mphone2') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="site_mphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.site_mphone3')) : ?>is-invalid<?php endif ?>" name="site_mphone3" value="<?= old('site_mphone3') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                            </div>
                        </div>
                         
                    </form>
<!-- site_post
site_phone1site_post
site_phone2
site_phone3 -->
<?= $this->endSection() ?>

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
        $('#site_count').change(function(){

            var country_id = $('#site_count').val();
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
                        $('#site_prov').html(html);
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
                        $('#site_city').html(html);
                    }
                });
            }
            else
            {
                $('#site_prov').val('');
                $('#site_city').val('');
            }
        });

        $('#site_prov').change(function(){

            var state_id = $('#site_prov').val();
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
                        $('#site_city').html(html);
                    }
                });
            }
            else
            {
                $('#site_city').val('');
            }
        });

        $('#site_bcount').change(function(){

            var country_id = $('#site_bcount').val();
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
                        $('#site_bprov').html(html);
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
                        $('#site_bcity').html(html);
                    }
                });
            }
            else
            {
                $('#site_bprov').val('');
                $('#site_bcity').val('');
            }
        });

        $('#site_bprov').change(function(){

            var state_id = $('#site_bprov').val();
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
                        $('#site_bcity').html(html);
                    }
                });
            }
            else
            {
                $('#site_bcity').val('');
            }
        });

        $('#site_mcount').change(function(){

            var country_id = $('#site_mcount').val();
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
                        $('#site_mprov').html(html);
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
                        $('#site_mcity').html(html);
                    }
                });
            }
            else
            {
                $('#site_mprov').val('');
                $('#site_mcity').val('');
            }
        });

        $('#site_mprov').change(function(){

            var state_id = $('#site_mprov').val();
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
                        $('#site_mcity').html(html);
                    }
                });
            }
            else
            {
                $('#site_mcity').val('');
            }
        });

    });
</script>

<?= $this->endSection() ?>  