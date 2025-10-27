<?php if($this->session->userdata('role_id') == SUPER_ADMIN){ ?>
<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="item form-group"> 
        <div><?php echo $this->lang->line('select_provincial'); ?> <span class="required"> *</span></div>
        <select class="form-control col-md-7 col-xs-12 fn_provincial_id" id="filter_provincial_id" name="provincial_id"  onchange="get_district_by_province(this.value, '');">
            <option value="">--<?php echo $this->lang->line('select_provincial'); ?>--</option>
            <?php foreach($provincial as $obj){ ?>
                <option value="<?php echo $obj->provincialid; ?>" <?php if(isset($filter_prov_id) && $filter_prov_id == $obj->provincialid){echo 'selected="selected"';} ?>>
                    <?php echo $obj->provincialname; ?>
                </option>
            <?php } ?>
        </select>       
    </div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="item form-group"> 
        <div><?php echo $this->lang->line('select_district'); ?> <span class="required"> *</span></div>
        <select class="form-control col-md-7 col-xs-12 fn_district_id"  id="filter_district_id" name="district_id"  onchange="get_zonal_by_district(this.value, '');">
            <option value="">--<?php echo $this->lang->line('select_district'); ?>--</option>
        </select>       
    </div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="item form-group"> 
        <div><?php echo $this->lang->line('select_zonal'); ?> <span class="required"> *</span></div>
        <select class="form-control col-md-7 col-xs-12 fn_zonal_id" id="filter_zonal_id" name="zonal_id"  onchange="get_edu_by_zonal(this.value, '');">
            <option value="">--<?php echo $this->lang->line('select_zonal'); ?>--</option>
        </select>       
    </div>
</div>

<div class="col-md-3 col-sm-3 col-xs-12">
    <div class="item form-group"> 
        <div><?php echo $this->lang->line('select_edu'); ?> <span class="required"> *</span></div>
        <select class="form-control col-md-7 col-xs-12 fn_edu_id" id="filter_edu_id" name="edu_id"  onchange="get_schooln_by_edu(this.value, '');">
            <option value="">--<?php echo $this->lang->line('select_edu'); ?>--</option>
        </select>       
    </div>
</div>


<?php }else{ ?>  
<input type="hidden" class="fn_school_id" name="school_id" id="filter_school_id" value="<?php echo $this->session->userdata('school_id'); ?>" />
<?php } ?>

<script type="text/javascript">

    

// Load Districts Based on Provincial Selection
<?php if (isset($filter_district_id)) { ?>
    get_district_by_province('<?php echo $filter_prov_id; ?>', '<?php echo $filter_district_id; ?>');
<?php } ?>

function get_district_by_province(provincial_id, district_id) {
    if (!provincial_id) return; // Guard clause for empty provincial_id
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('ajax/get_district_by_province'); ?>",
        data: {provincial_id: provincial_id, district_id: district_id},
        success: function (response) {
            $('#filter_district_id').html(response || '<option value="">--<?php echo $this->lang->line("select_district"); ?>--</option>');
        }
    });
}



// Load Zonal Areas Based on District Selection
<?php if (isset($filter_zonal_id)) { ?>
    get_zonal_by_district('<?php echo $filter_district_id; ?>', '<?php echo $filter_zonal_id; ?>');
<?php } ?>

function get_zonal_by_district(district_id, zonal_id) {
    if (!district_id) return; // Guard clause for empty district_id
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('ajax/get_zonal_by_district'); ?>",
        data: {district_id: district_id, zonal_id: zonal_id},
        success: function (response) {
            $('#filter_zonal_id').html(response || '<option value="">--<?php echo $this->lang->line("select_zonal"); ?>--</option>');
        }
    });
}

// Load Educational Divisions Based on Zonal Selection
<?php if (isset($filter_edu_id)) { ?>
    get_edu_by_zonal('<?php echo $filter_zonal_id; ?>', '<?php echo $filter_edu_id; ?>');
<?php } ?>

function get_edu_by_zonal(zonal_id, edu_id) {
    if (!zonal_id) return; // Guard clause for empty zonal_id
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('ajax/get_edu_by_zonal'); ?>",
        data: {zonal_id: zonal_id, edu_id: edu_id},
        success: function (response) {
            $('#filter_edu_id').html(response || '<option value="">--<?php echo $this->lang->line("select_edu"); ?>--</option>');
        }
    });
}

// Load Schools Based on Educational Division Selection
<?php if (isset($filtern_school_id)) { ?>
    get_schooln_by_edu('<?php echo $filter_edu_id; ?>', '<?php echo $filtern_school_id; ?>');
<?php } ?>

function get_schooln_by_edu(edu_id, schooln_id) {
    if (!edu_id) return; // Guard clause for empty edu_id
    $.ajax({
        type: "POST",
        url: "<?php echo site_url('ajax/get_school_by_edu'); ?>",
        data: {edu_id: edu_id, school_id: schooln_id},
        success: function (response) {
            $('#filtern_school_id').html(response || '<option value="">--<?php echo $this->lang->line("select_school"); ?>--</option>');
        }
    });
}

public function getfetchprovincial() {
        $class_id = $this->input->post('class_id');
        $data = $this->ajax->fetch_provincial($class_id);
        echo json_encode($data);
}
</script>




