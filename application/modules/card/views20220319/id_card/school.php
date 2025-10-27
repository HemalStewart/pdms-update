<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-barcode"></i><small>  <?php echo $this->lang->line('manage_id_card_setting'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
          
            <div class="x_content quick-link">
                <?php $this->load->view('quick-link'); ?>    
            </div>
            
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="active"><a href="#tab_setting_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-gears"></i> <?php echo $this->lang->line('id_card_setting'); ?> </a> </li>
                    </ul>
                    <br/>
                    
                    <div class="tab-content">                    

                        <div  class="tab-pane fade in <?php if(empty($setting)){ echo 'active'; }?>" id="tab_add_setting">
                     