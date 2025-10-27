<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

    <tbody>
    

        <tr>

            <td><?php echo $this->lang->line('month'); ?></td>

            <td><?php echo $route->monthname; ?></td>

        </tr>        



        <tr>



         <td colspan="2">

                <table style="width:100%;" class="fn_edit_stop_container responsive"> 

                    <tr>               
                        <td><?php echo $this->lang->line('proposed_date'); ?></td>
                        <td><?php echo $this->lang->line('prozon_start_time'); ?></td>
                        <td><?php echo $this->lang->line('prozon_end_time'); ?></td>
                         <td><?php echo $this->lang->line('subname'); ?></td>
                        <td><?php echo $this->lang->line('program_type'); ?></td>
                        <td><?php echo $this->lang->line('program'); ?></td>
                        <td><?php echo $this->lang->line('reason1'); ?></td>
                        <td><?php echo $this->lang->line('address1'); ?></td>
                        <td><?php echo $this->lang->line('expected_beneficiaries'); ?></td>
                        <td><?php echo $this->lang->line('expected_cost'); ?></td>
                        <td><?php echo $this->lang->line('cost_institution'); ?></td>
                    </tr>

                    <?php foreach ($prozo as $obj) { ?> 

                        <tr style="font-weight: 100; background-color: #ffffff; color: #000000;"> 

                            <td><?php echo $obj->proposed_date; ?></td>

                            <td><?php echo $obj->prozon_start_time; ?></td>

                            <td><?php echo $obj->prozon_end_time; ?></td>
                             <td><?php echo $obj->subject; ?></td>
                            <td><?php echo $obj->program_type; ?></td>
                            <td><?php echo $obj->program_name; ?></td>
                            <td><?php echo $obj->reason; ?></td>
                            <td><?php echo $obj->address; ?></td>
                            <td><?php echo $obj->expected_beneficiaries; ?></td>
                            <td><?php echo $obj->expected_cost; ?></td>
                            <td><?php echo $obj->cost_institution; ?></td>

                        </tr>

                    <?php } ?>

                </table>

            </td>

        </tr>

        <tr>

            <th><?php echo $this->lang->line('note'); ?></th>

            <td><?php echo $route->note; ?></td>

        </tr>             

    </tbody>
	
	<tr style="background-color:#e0e0e0">

            <th><?php echo $this->lang->line('cur_status'); ?></th>

            <td>

                <?php  if($route->cur_status == 1){ ?>

                    <a href="javascript:void(0);" class="btn bg-red btn-xs"> <?php echo $this->lang->line('just_created'); ?> </a>

                <?php  }elseif($route->cur_status == 2){ ?>

                    <a href="javascript:void(0);" class="btn bg-red btn-xs"><?php echo $this->lang->line('forwared_to_ministry'); ?> </a>  

                <?php  }elseif($route->cur_status == 3){ ?>

                    <a href="javascript:void(0);" class="btn bg-blue btn-xs"><?php echo $this->lang->line('min_approved'); ?> </a>  

                <?php  }elseif($route->cur_status == 4){ ?>

                    <a href="javascript:void(0);" class="btn bg-green btn-xs"><?php echo $this->lang->line('min_rejected'); ?> </a>  

                <?php  } ?>

            </td> 
	</tr>

</table>