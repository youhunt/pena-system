<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                    </div>

                    <?= view('\Myth\Auth\Views\_message_block') ?>
 
                    <form action="<?= base_url(); ?>department/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $dept[0]->id; ?>" ?>
                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="comp_code">Company</label>
                            </div>
                            <div class="col-4">
                                <select name="comp_code" id="comp_code" class="form-control input-lg">
                                    <option value="">Choose Company</option>
                                    <?php
                                    foreach($company as $row)
                                    {
                                        echo '<option value="'.$row["comp_code"].'" '.($row["comp_code"]===$dept[0]->comp_code ? "selected" :  "").' >'.$row["comp_name"].'</option>';
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
                                        echo '<option value="'.$row["site_code"].'" '.($row["site_code"]===$dept[0]->site_code ? "selected" :  "").'>'.$row["site_name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="dept_code">Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" class="form-control form-control-user <?php if(session('errors.dept_code')) : ?>is-invalid<?php endif ?>"
                                name="dept_code" value="<?= $dept[0]->dept_code ? $dept[0]->dept_code : old('dept_code'); ?>" style="padding: .1rem .5rem .1rem .5rem;">
                            </div>
                            <div class="col-2">
                                <label for="dept_name">PIC</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_pic')) : ?>is-invalid<?php endif ?>" name="dept_pic" value="<?= $dept[0]->dept_pic ? $dept[0]->dept_pic :  old('dept_pic'); ?>">
                            </div>                                                    
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="dept_name">Name</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_name')) : ?>is-invalid<?php endif ?>" name="dept_name" value="<?=  $dept[0]->dept_name ? $dept[0]->dept_name :  old('dept_name'); ?>">
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
                                <label for="dept_add">Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.dept_add')) : ?>is-invalid<?php endif ?>" id="dept_add" name="dept_add" rows="2"><?= $dept[0]->dept_add ? $dept[0]->dept_add :  old('dept_add'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="dept_count">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="dept_count" id="dept_count" class="form-control input-lg">
                                    <option value="">Choose Country</option>
                                    <?php
                                    foreach($countries as $row)
                                    {
                                        echo '<option '.($row["id"]===$dept[0]->dept_count ? "selected" :  "").' value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="state">State</label>
                            </div>
                            <div class="col-4">
                                <select name="dept_prov" id="dept_prov" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                    <?php
                                    foreach($states as $row)
                                    {
                                        echo '<option '.($row->id===$dept[0]->dept_prov ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
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
                                <select name="dept_city" id="dept_city" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                    <?php
                                    foreach($cities as $row)
                                    {
                                        echo '<option '.($row->id===$dept[0]->dept_city ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="dept_post">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_post')) : ?>is-invalid<?php endif ?>" name="dept_post" value="<?=  $dept[0]->dept_post ? $dept[0]->dept_post :  old('dept_post'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="dept_mphone1">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_phone1')) : ?>is-invalid<?php endif ?>" name="dept_phone1" value="<?=  $dept[0]->dept_phone1 ? $dept[0]->dept_pic :  old('dept_phone1'); ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="dept_phone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_phone2')) : ?>is-invalid<?php endif ?>" name="dept_phone2" value="<?=  $dept[0]->dept_phone2 ? $dept[0]->dept_phone2 :  old('dept_phone2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="dept_phone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_phone3')) : ?>is-invalid<?php endif ?>" name="dept_phone3" value="<?=  $dept[0]->dept_phone3 ? $dept[0]->dept_phone3 :  old('dept_phone3'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="dept_badd">Billing Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.dept_badd')) : ?>is-invalid<?php endif ?>" id="dept_badd" rows="2" name="dept_badd"><?=  $dept[0]->dept_badd ? $dept[0]->dept_badd :  old('dept_badd'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="bcountry">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="dept_bcount" id="dept_bcount" class="form-control input-lg">
                                    <option value="">Choose Country</option>
                                    <?php
                                    foreach($countries as $row)
                                    {
                                        echo '<option '.($row["id"]===$dept[0]->dept_bcount ? "selected" :  "").' value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="bstate">State</label>
                            </div>
                            <div class="col-4">
                                <select name="dept_bprov" id="dept_bprov" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                    <?php
                                    foreach($bstates as $row)
                                    {
                                        echo '<option '.($row->id===$dept[0]->dept_bprov ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="bcity">City</label>
                            </div>
                            <div class="col-4">
                                <select name="dept_bcity" id="dept_bcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                    <?php
                                    foreach($bcities as $row)
                                    {
                                        echo '<option '.($row->id===$dept[0]->dept_bcity ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="dept_bpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_bpost')) : ?>is-invalid<?php endif ?>" name="dept_bpost" value="<?=  $dept[0]->dept_bpost ? $dept[0]->dept_bpost :  old('dept_bpost'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="dept_bphone2">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_bphone1')) : ?>is-invalid<?php endif ?>" name="dept_bphone1" value="<?=  $dept[0]->dept_phone1 ? $dept[0]->dept_phone1 :  old('dept_phone1'); ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="dept_bphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_bphone2')) : ?>is-invalid<?php endif ?>" name="dept_bphone2" value="<?=  $dept[0]->dept_phone2 ? $dept[0]->dept_phone2 :  old('dept_phone2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="dept_bphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_bphone3')) : ?>is-invalid<?php endif ?>" name="dept_bphone3" value="<?=  $dept[0]->dept_phone3 ? $dept[0]->dept_phone3 :  old('dept_phone3'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="dept_madd">Mailing Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.dept_madd')) : ?>is-invalid<?php endif ?>" id="dept_madd" rows="2" name="dept_madd"><?=  $dept[0]->dept_madd ? $dept[0]->dept_madd :  old('dept_madd'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="country">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="dept_mcount" id="dept_mcount" class="form-control input-lg">
                                    <option value="">Choose Country</option>
                                    <?php
                                    foreach($countries as $row)
                                    {
                                        echo '<option '.($row["id"]===$dept[0]->dept_mcount ? "selected" :  "").' value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="state">State</label>
                            </div>
                            <div class="col-4">
                                <select name="dept_mprov" id="dept_mprov" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                    <?php
                                    foreach($mstates as $row)
                                    {
                                        echo '<option '.($row->id===$dept[0]->dept_mprov ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
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
                                <select name="dept_mcity" id="dept_mcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                    <?php
                                    foreach($mcities as $row)
                                    {
                                        echo '<option '.($row->id===$dept[0]->dept_mcity ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="dept_mpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_mpost')) : ?>is-invalid<?php endif ?>" name="dept_mpost" value="<?=  $dept[0]->dept_mpost ? $dept[0]->dept_mpost :  old('dept_mpost'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="dept_mphone1">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_mphone1')) : ?>is-invalid<?php endif ?>" name="dept_mphone1" value="<?=  $dept[0]->dept_mphone1 ? $dept[0]->dept_mphone1 :  old('dept_mphone1'); ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="dept_mphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_mphone2')) : ?>is-invalid<?php endif ?>" name="dept_mphone2" value="<?=  $dept[0]->dept_mphone2 ? $dept[0]->dept_mphone2 :  old('dept_mphone2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="dept_mphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.dept_mphone3')) : ?>is-invalid<?php endif ?>" name="dept_mphone3" value="<?=  $dept[0]->dept_mphone3 ? $dept[0]->dept_mphone3 :  old('dept_mphone3'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                            </div>
                        </div>
                         
                    </form>
<!-- dept_post
dept_phone1dept_post
dept_phone2
dept_phone3 -->
<?= $this->endSection() ?>

<?= $this->section('script-js') ?>    

<script type="text/javascript">
    $(document).ready(function(){
        $('#dept_count').change(function(){

            var country_id = $('#dept_count').val();
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
                        $('#dept_prov').html(html);
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
                        $('#dept_city').html(html);
                    }
                });
            }
            else
            {
                $('#dept_prov').val('');
                $('#dept_city').val('');
            }
        });

        $('#dept_prov').change(function(){

            var state_id = $('#dept_prov').val();
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
                        $('#dept_city').html(html);
                    }
                });
            }
            else
            {
                $('#dept_city').val('');
            }
        });

        $('#dept_bcount').change(function(){

            var country_id = $('#dept_bcount').val();
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
                        $('#dept_bprov').html(html);
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
                        $('#dept_bcity').html(html);
                    }
                });
            }
            else
            {
                $('#dept_bprov').val('');
                $('#dept_bcity').val('');
            }
        });

        $('#dept_bprov').change(function(){

            var state_id = $('#dept_bprov').val();
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
                        $('#dept_bcity').html(html);
                    }
                });
            }
            else
            {
                $('#dept_bcity').val('');
            }
        });

        $('#dept_mcount').change(function(){

            var country_id = $('#dept_mcount').val();
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
                        $('#dept_mprov').html(html);
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
                        $('#dept_mcity').html(html);
                    }
                });
            }
            else
            {
                $('#dept_mprov').val('');
                $('#dept_mcity').val('');
            }
        });

        $('#dept_mprov').change(function(){

            var state_id = $('#dept_mprov').val();
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
                        $('#dept_mcity').html(html);
                    }
                });
            }
            else
            {
                $('#dept_mcity').val('');
            }
        });
    });
</script>

<?= $this->endSection() ?>  