<footer class="footer no-print">
    <div class="pull-right">
        <p class="white">
            <?php if ($this->session->userdata('role_id') != ADMIN || $this->session->userdata('role_id') != GUARDIAN || $this->session->userdata('role_id') != STUDENT || $this->session->userdata('role_id') != TEACHER || $this->session->userdata('role_id') != ACCOUNTANT || $this->session->userdata('role_id') != LIBRARIN || $this->session->userdata('role_id') != RECEPTIONIST || $this->session->userdata('role_id') != STAFF || $this->session->userdata('role_id') != PROVINCIAL || $this->session->userdata('role_id') != ZONAL) { ?> 

            <?php echo $this->global_setting->brand_footer ? $this->global_setting->brand_footer : 'Copyright © '. date('Y').' <a target="_blank" href="https://www.ramecats.lk">Rameca Team.</a> All rights reserved.'; ?> 
            
            
                
             <?php }else{ ?>
                <?php echo $this->school_setting->footer; ?>
             <?php } ?>
        </p>       
    </div>
    <div class="clearfix"></div>
</footer>