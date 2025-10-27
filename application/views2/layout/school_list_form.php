<?php if ($this->session->userdata('role_id') == SUPER_ADMIN) { ?>

    <?php $schools = get_school_list(); ?>

    <div class="item form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="provincial"><?php echo $this->lang->line('provincial'); ?> <span class="required">*</span></label>

        <div class="col-md-6 col-sm-6 col-xs-12">

            <select  class="form-control col-md-7 col-xs-12" name="provincial" id="add_provincial" required="required">

                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>



                <?php foreach ($listprovincial as $key => $value) {
                    ?>
                    <option value="<?php echo $value["provincialid"] ?>" <?php echo set_select('provincial', $value['provincialid'], set_value('provincial')); ?>><?php echo $value["provincialname"] ?></option>
                <?php }
                ?>

            </select>

            <div class="help-block"><?php echo form_error('provincial'); ?></div>

        </div>

    </div>
    <div class="item form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="district_id"><?php echo $this->lang->line('district'); ?> <span class="required">*</span></label>

        <div class="col-md-6 col-sm-6 col-xs-12">

            <select  class="form-control col-md-7 col-xs-12" name="district_id" id="add_district_id" required="required">

               <option value="select"><?php echo $this->lang->line('select') ?></option>

            </select>

            <div class="help-block"><?php echo form_error('district_id'); ?></div>

        </div>

    </div>
 <div class="item form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="zonal_id"><?php echo $this->lang->line('zonal'); ?> <span class="required">*</span></label>

        <div class="col-md-6 col-sm-6 col-xs-12">

            <select  class="form-control col-md-7 col-xs-12" name="zonal_id" id="add_zonal_id" required="required">

               <option value="select"><?php echo $this->lang->line('select') ?></option>

            </select>

            <div class="help-block"><?php echo form_error('zonal_id'); ?></div>

        </div>

    </div>
 <div class="item form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="educational_id"><?php echo $this->lang->line('educational'); ?> <span class="required">*</span></label>

        <div class="col-md-6 col-sm-6 col-xs-12">

            <select  class="form-control col-md-7 col-xs-12" name="educational_id" id="add_educational_id" required="required">

               <option value="select"><?php echo $this->lang->line('select') ?></option>

            </select>

            <div class="help-block"><?php echo form_error('educational_id'); ?></div>

        </div>

    </div>
    <div class="item form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"><?php echo $this->lang->line('school_name'); ?> <span class="required">*</span></label>

        <div class="col-md-6 col-sm-6 col-xs-12">

           <select  class="form-control col-md-7 col-xs-12 fn_school_id" name="school_id" id="add_school_id" required="required">

               <option value="select"><?php echo $this->lang->line('select') ?></option>

            </select>


            <div class="help-block"><?php echo form_error('school_id'); ?></div>

        </div>

    </div>

<!--    <div class="item form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"><?php echo $this->lang->line('school_name'); ?> <span class="required">*</span></label>

        <div class="col-md-6 col-sm-6 col-xs-12">

            <select  class="form-control col-md-7 col-xs-12 fn_school_id" name="school_id" id="add_school_id" required="required">

                <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option>

                <?php foreach ($schools as $obj) { ?>

                    <option value="<?php echo $obj->id; ?>" <?php if (isset($school_id) && $school_id == $obj->id) {
                echo 'selected="selected"';
            } ?>><?php echo $obj->school_name; ?></option>

    <?php } ?>

            </select>

            <div class="help-block"><?php echo form_error('school_id'); ?></div>

        </div>

    </div>-->
    <!--<div class="item form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"><?php echo $this->lang->line('school_name'); ?> <span class="required">*</span></label>

        <div class="col-md-6 col-sm-6 col-xs-12">

            <select  class="form-control col-md-7 col-xs-12 fn_school_id" name="school_id" id="add_school_id" required="required">

                <option value="">--<?php echo $this->lang->line('select_school'); ?>--</option>

    <?php foreach ($schools as $obj) { ?>

                        <option value="<?php echo $obj->id; ?>" <?php if (isset($school_id) && $school_id == $obj->id) {
            echo 'selected="selected"';
        } ?>><?php echo $obj->school_name; ?></option>

    <?php } ?>

            </select>

            <div class="help-block"><?php echo form_error('school_id'); ?></div>

        </div>

    </div>-->

<?php } else { ?>

    <div class="item form-group">

        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id"></label>

        <div class="col-md-6 col-sm-6 col-xs-12">

            <input class="fn_school_id" type="hidden" name="school_id" id="add_school_id" value="<?php echo $this->session->userdata('school_id'); ?>" />

        </div>

    </div>

<?php } ?>

<script type="text/javascript">
    $(document).on('focus', '.time', function () {
        var $this = $(this);
        $this.datetimepicker({
            format: 'LT'
        });
    });
    var tot_count = 0;
    var provincial = $('#provincial').val();
    var district = '<?php echo set_value('district_id') ?>';
    var section_id = '<?php echo set_value('section_id') ?>';
    // var subject_group_id = '<?php echo set_value('subject_group_id') ?>';
    $(document).ready(function () {

        //$('#myTabs a:first').tab('show') // Select first tab
//        getSectionByClass(provincial, district);
//        getGroupByClassandSection(provincial, district);




        $(document).on('change', '#add_provincial', function (e) {
            $('#add_district_id').html("");
            var provincial_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ajax/getfetchprovincial'); ?>",
                data: {'class_id': provincial_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.districtname + "</option>";
                    });

                    $('#add_district_id').append(div_data);
                }
            });
        });


        $(document).on('change', '#add_district_id', function (e) {
            $('#add_zonal_id').html("");
            var dist_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchzonal",
                url: "<?php echo site_url('ajax/getfetchzonal'); ?>",
                data: {'dist_id': dist_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.zoneid + ">" + obj.zonename + "</option>";
                    });

                    $('#add_zonal_id').append(div_data);
                }
            });
        });

        $(document).on('change', '#add_zonal_id', function (e) {
            $('#add_educational_id').html("");
            var zonal_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchzoneblock",
                url: "<?php echo site_url('ajax/getfetchzoneblock'); ?>",
                data: {'zonal_id': zonal_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.zoneblockid + ">" + obj.zoneblock + "</option>";
                    });

                    $('#add_educational_id').append(div_data);
                }
            });
        });


    $(document).on('change', '#add_educational_id', function (e) {
            $('#add_school_id').html("");
            var educational_id = $(this).val();
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';

            $.ajax({
                type: "POST",
//                            url: base_url + "sections/getfetchzoneblock",
                url: "<?php echo site_url('ajax/getfetchschool'); ?>",
                data: {'educational_id': educational_id},
                dataType: "json",
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        div_data += "<option value=" + obj.id + ">" + obj.school_name +"-"+"(" + obj.cencus_number +")" +"</option>";
                    });

                    $('#add_school_id').append(div_data);
                }
            });
        });


//        $(document).on('change', '#section_id', function (e) {
//            $('#subject_group_id').html("");
//            var section_id = $(this).val();
//            var class_id = $('#class_id').val();
//            var base_url = '<?php echo base_url() ?>';
//            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
//            $.ajax({
//                type: "POST",
//                url: base_url + "admin/subjectgroup/getGroupByClassandSection",
//                data: {'class_id': class_id, 'section_id': section_id},
//                dataType: "json",
//                success: function (data) {
//                    $.each(data, function (i, obj)
//                    {
//                        div_data += "<option value=" + obj.subject_group_id + ">" + obj.name + "</option>";
//                    });
//
//                    $('#subject_group_id').append(div_data);
//                }
//            });
//        });
    });




</script>
