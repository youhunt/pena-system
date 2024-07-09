<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                    </div>

                    <?= view('\Myth\Auth\Views\_message_block') ?>
 
                    <form action="<?= base_url(); ?>location/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $loc[0]->id; ?>" ?>
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
                                        echo '<option value="'.$row["comp_code"].'" '.($row["comp_code"]===$loc[0]->comp_code ? "selected" :  "").' >'.$row["comp_name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="site">Site</label>
                            </div>
                            <div class="col-4">
                                <select name="site_code" id="site_code" class="form-control input-lg">
                                    <option value="">Choose Site</option>
                                    <?php
                                    foreach($sites as $row)
                                    {
                                        echo '<option value="'.$row["site_code"].'" '.($row["site_code"]===$loc[0]->site_code ? "selected" :  "").'>'.$row["site_name"].'</option>';
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
                                <select name="dept_code" id="dept_code" class="form-control input-lg">
                                    <option value="">Choose Department</option>
                                    <?php
                                    foreach($departments as $row)
                                    {
                                        echo '<option value="'.$row["dept_code"].'" '.($row["dept_code"]===$loc[0]->dept_code ? "selected" :  "").' >'.$row["dept_name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="whs_code">Warehouse</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_code" id="Warehouse" class="form-control input-lg">
                                    <option value="">Choose Warehouse</option>
                                    <?php
                                    foreach($warehouses as $row)
                                    {
                                        echo '<option value="'.$row["whs_code"].'" '.($row["whs_code"]===$loc[0]->whs_code ? "selected" :  "").' >'.$row["whs_name"].'</option>';
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
                                name="loc_code" value="<?= $loc[0]->loc_code ? $loc[0]->loc_code : old('loc_code'); ?>" style="padding: .1rem .5rem .1rem .5rem;">
                            </div>
                            <div class="col-2">
                                <label for="loc_name">PIC</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_pic')) : ?>is-invalid<?php endif ?>" name="loc_pic" value="<?= $loc[0]->loc_pic ? $loc[0]->loc_pic :  old('loc_pic'); ?>">
                            </div>                                                    
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="loc_name">Name</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_name')) : ?>is-invalid<?php endif ?>" name="loc_name" value="<?=  $loc[0]->loc_name ? $loc[0]->loc_name :  old('loc_name'); ?>">
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
                                <textarea class="form-control <?php if(session('errors.loc_add')) : ?>is-invalid<?php endif ?>" id="loc_add" name="loc_add" rows="2"><?= $loc[0]->loc_add ? $loc[0]->loc_add :  old('loc_add'); ?></textarea>
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
                                        echo '<option '.($row["id"]===$loc[0]->loc_count ? "selected" :  "").' value="'.$row["id"].'">'.$row["name"].'</option>';
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
                                    <?php
                                    foreach($states as $row)
                                    {
                                        echo '<option '.($row->id===$loc[0]->loc_prov ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
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
                                    <?php
                                    foreach($cities as $row)
                                    {
                                        echo '<option '.($row->id===$loc[0]->loc_city ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="loc_post">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_post')) : ?>is-invalid<?php endif ?>" name="loc_post" value="<?=  $loc[0]->loc_post ? $loc[0]->loc_post :  old('loc_post'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="loc_mphone1">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_phone1')) : ?>is-invalid<?php endif ?>" name="loc_phone1" value="<?=  $loc[0]->loc_phone1 ? $loc[0]->loc_pic :  old('loc_phone1'); ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="loc_phone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_phone2')) : ?>is-invalid<?php endif ?>" name="loc_phone2" value="<?=  $loc[0]->loc_phone2 ? $loc[0]->loc_phone2 :  old('loc_phone2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="loc_phone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.loc_phone3')) : ?>is-invalid<?php endif ?>" name="loc_phone3" value="<?=  $loc[0]->loc_phone3 ? $loc[0]->loc_phone3 :  old('loc_phone3'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_dadd">Whs Delivery Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.whs_dadd')) : ?>is-invalid<?php endif ?>" id="whs_dadd" rows="2" name="whs_dadd"><?=  $loc[0]->whs_dadd ? $loc[0]->whs_dadd :  old('whs_dadd'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="whs_dcount">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_dcount" id="whs_dcount" class="form-control input-lg">
                                    <option value="">Choose Country</option>
                                    <?php
                                    foreach($countries as $row)
                                    {
                                        echo '<option '.($row["id"]===$loc[0]->whs_dcount ? "selected" :  "").' value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="whs_dprov">State</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_dprov" id="whs_dprov" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                    <?php
                                    foreach($bstates as $row)
                                    {
                                        echo '<option '.($row->id===$loc[0]->whs_dprov ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_dcity">City</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_dcity" id="whs_dcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                    <?php
                                    foreach($bcities as $row)
                                    {
                                        echo '<option '.($row->id===$loc[0]->whs_dcity ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="whs_dpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_dpost')) : ?>is-invalid<?php endif ?>" name="whs_dpost" value="<?=  $loc[0]->whs_dpost ? $loc[0]->whs_dpost :  old('whs_dpost'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_dphone2">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_dphone1')) : ?>is-invalid<?php endif ?>" name="whs_dphone1" value="<?=  $loc[0]->loc_phone1 ? $loc[0]->loc_phone1 :  old('loc_phone1'); ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="whs_dphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_dphone2')) : ?>is-invalid<?php endif ?>" name="whs_dphone2" value="<?=  $loc[0]->loc_phone2 ? $loc[0]->loc_phone2 :  old('loc_phone2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_dphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_dphone3')) : ?>is-invalid<?php endif ?>" name="whs_dphone3" value="<?=  $loc[0]->loc_phone3 ? $loc[0]->loc_phone3 :  old('loc_phone3'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                            </div>
                        </div>
                         
                    </form>
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

    });
</script>

<?= $this->endSection() ?>  