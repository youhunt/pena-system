<?= $this->extend('template/index') ?>            
 
<?= $this->section('page-content') ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
                    </div>

                    <?= view('\Myth\Auth\Views\_message_block') ?>
 
                    <form action="<?= base_url(); ?>warehouse/update" class="user" method="post">
                        <input type="hidden" name="id" value="<?= $whs[0]->id; ?>" ?>
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
                                        echo '<option value="'.$row["comp_code"].'" '.($row["comp_code"]===$whs[0]->comp_code ? "selected" :  "").' >'.$row["comp_name"].'</option>';
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
                                        echo '<option value="'.$row["site_code"].'" '.($row["site_code"]===$whs[0]->site_code ? "selected" :  "").'>'.$row["site_name"].'</option>';
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
                                <select name="dept_code" id="deparment" class="form-control input-lg">
                                    <option value="">Choose Department</option>
                                    <?php
                                    foreach($departments as $row)
                                    {
                                        echo '<option value="'.$row["dept_code"].'" '.($row["dept_code"]===$whs[0]->dept_code ? "selected" :  "").' >'.$row["dept_name"].'</option>';
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
                                name="whs_code" value="<?= $whs[0]->whs_code ? $whs[0]->whs_code : old('whs_code'); ?>" style="padding: .1rem .5rem .1rem .5rem;">
                            </div>
                            <div class="col-2">
                                <label for="whs_name">PIC</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_pic')) : ?>is-invalid<?php endif ?>" name="whs_pic" value="<?= $whs[0]->whs_pic ? $whs[0]->whs_pic :  old('whs_pic'); ?>">
                            </div>                                                    
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_name">Name</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_name')) : ?>is-invalid<?php endif ?>" name="whs_name" value="<?=  $whs[0]->whs_name ? $whs[0]->whs_name :  old('whs_name'); ?>">
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
                                <textarea class="form-control <?php if(session('errors.whs_add')) : ?>is-invalid<?php endif ?>" id="whs_add" name="whs_add" rows="2"><?= $whs[0]->whs_add ? $whs[0]->whs_add :  old('whs_add'); ?></textarea>
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
                                        echo '<option '.($row["id"]===$whs[0]->whs_count ? "selected" :  "").' value="'.$row["id"].'">'.$row["name"].'</option>';
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
                                    <?php
                                    foreach($states as $row)
                                    {
                                        echo '<option '.($row->id===$whs[0]->whs_prov ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
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
                                    <?php
                                    foreach($cities as $row)
                                    {
                                        echo '<option '.($row->id===$whs[0]->whs_city ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="whs_post">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_post')) : ?>is-invalid<?php endif ?>" name="whs_post" value="<?=  $whs[0]->whs_post ? $whs[0]->whs_post :  old('whs_post'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_mphone1">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_phone1')) : ?>is-invalid<?php endif ?>" name="whs_phone1" value="<?=  $whs[0]->whs_phone1 ? $whs[0]->whs_pic :  old('whs_phone1'); ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="whs_phone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_phone2')) : ?>is-invalid<?php endif ?>" name="whs_phone2" value="<?=  $whs[0]->whs_phone2 ? $whs[0]->whs_phone2 :  old('whs_phone2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_phone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_phone3')) : ?>is-invalid<?php endif ?>" name="whs_phone3" value="<?=  $whs[0]->whs_phone3 ? $whs[0]->whs_phone3 :  old('whs_phone3'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_badd">Billing Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.whs_badd')) : ?>is-invalid<?php endif ?>" id="whs_badd" rows="2" name="whs_badd"><?=  $whs[0]->whs_badd ? $whs[0]->whs_badd :  old('whs_badd'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="whs_bcount">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_bcount" id="whs_bcount" class="form-control input-lg">
                                    <option value="">Choose Country</option>
                                    <?php
                                    foreach($countries as $row)
                                    {
                                        echo '<option '.($row["id"]===$whs[0]->whs_bcount ? "selected" :  "").' value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="whs_bprov">State</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_bprov" id="whs_bprov" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                    <?php
                                    foreach($bstates as $row)
                                    {
                                        echo '<option '.($row->id===$whs[0]->whs_bprov ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_bcity">City</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_bcity" id="whs_bcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                    <?php
                                    foreach($bcities as $row)
                                    {
                                        echo '<option '.($row->id===$whs[0]->whs_bcity ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="whs_bpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_bpost')) : ?>is-invalid<?php endif ?>" name="whs_bpost" value="<?=  $whs[0]->whs_bpost ? $whs[0]->whs_bpost :  old('whs_bpost'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_bphone2">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_bphone1')) : ?>is-invalid<?php endif ?>" name="whs_bphone1" value="<?=  $whs[0]->whs_phone1 ? $whs[0]->whs_phone1 :  old('whs_phone1'); ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="whs_bphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_bphone2')) : ?>is-invalid<?php endif ?>" name="whs_bphone2" value="<?=  $whs[0]->whs_phone2 ? $whs[0]->whs_phone2 :  old('whs_phone2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_bphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_bphone3')) : ?>is-invalid<?php endif ?>" name="whs_bphone3" value="<?=  $whs[0]->whs_phone3 ? $whs[0]->whs_phone3 :  old('whs_phone3'); ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_madd">Mailing Address</label>
                            </div>
                            <div class="col-10">
                                <textarea class="form-control <?php if(session('errors.whs_madd')) : ?>is-invalid<?php endif ?>" id="whs_madd" rows="2" name="whs_madd"><?=  $whs[0]->whs_madd ? $whs[0]->whs_madd :  old('whs_madd'); ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">    
                            <div class="col-2">
                                <label for="whs_mcount">Country</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_mcount" id="whs_mcount" class="form-control input-lg">
                                    <option value="">Choose Country</option>
                                    <?php
                                    foreach($countries as $row)
                                    {
                                        echo '<option '.($row["id"]===$whs[0]->whs_mcount ? "selected" :  "").' value="'.$row["id"].'">'.$row["name"].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-2">
                                <label for="whs_mprov">State</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_mprov" id="whs_mprov" class="form-control input-lg">
                                    <option value="">Choose State</option>
                                    <?php
                                    foreach($mstates as $row)
                                    {
                                        echo '<option '.($row->id===$whs[0]->whs_mprov ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_mcity">City</label>
                            </div>
                            <div class="col-4">
                                <select name="whs_mcity" id="whs_mcity" class="form-control input-lg">
                                    <option value="">Choose City</option>
                                    <?php
                                    foreach($mcities as $row)
                                    {
                                        echo '<option '.($row->id===$whs[0]->whs_mcity ? "selected" :  "").' value="'.$row->id.'">'.$row->name.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        
                            <div class="col-2">
                                <label for="whs_mpost">Postal Code</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_mpost')) : ?>is-invalid<?php endif ?>" name="whs_mpost" value="<?=  $whs[0]->whs_mpost ? $whs[0]->whs_mpost :  old('whs_mpost'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-2">
                                <label for="whs_mphone1">Phone 1</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_mphone1')) : ?>is-invalid<?php endif ?>" name="whs_mphone1" value="<?=  $whs[0]->whs_mphone1 ? $whs[0]->whs_mphone1 :  old('whs_mphone1'); ?>">
                            </div>
                       
                            <div class="col-2">
                                <label for="whs_mphone2">Phone 2</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_mphone2')) : ?>is-invalid<?php endif ?>" name="whs_mphone2" value="<?=  $whs[0]->whs_mphone2 ? $whs[0]->whs_mphone2 :  old('whs_mphone2'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <div class="col-2">
                                <label for="whs_mphone3">Phone 3</label>
                            </div>
                            <div class="col-4">
                                <input type="text" style="padding: .1rem .5rem .1rem .5rem;" class="form-control form-control-user <?php if(session('errors.whs_mphone3')) : ?>is-invalid<?php endif ?>" name="whs_mphone3" value="<?=  $whs[0]->whs_mphone3 ? $whs[0]->whs_mphone3 :  old('whs_mphone3'); ?>">
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