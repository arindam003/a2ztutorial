<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Availability Management
                        
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span></h3>
                       
                    </header>
                    <!-- start message  -->
                    <div class="panel-body" style="display: block;">
                     <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
                      
                       <?php if($this->session->flashdata('err_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Error!</strong> <?=$this->session->flashdata('err_msg');?>
                    </div>
                      <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                   <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url('availability/add')?>">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                               
                            </div>
                        
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                  <tr>
                                      <th>SL No.</th>
                                      <th>Teacher Name</th>
                                      <th>Timing</th>
                                      <th>Mon</th>
                                      <th>Tue</th>
                                      <th>Wed</th>
                                      <th>Thu</th>
                                      <th>Fri</th>
                                      <th>Sat</th>
                                      <th>Sun</th>
                                      <th>Added On</th>
                                      <th>Action</th>
                                      
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i=1;
                                foreach($alldata as $all) { ?>
                                <tr class="">
                                
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $all->name;?></td>
                                    <td><?php echo $all->timing;?></td>
                                    <td><?php 

                                    if($all->mon == 'on'){ ?>
                                            <span class="az-yes" style="color: #3ad524"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no" style="color: #e21717"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?>
                                        
                                    </td>
                                    <td><?php 
                                    if($all->tue == 'on'){ ?>
                                            <span class="az-yes" style="color: #3ad524"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no" style="color: #e21717"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?>
                                    </td>
                                    <td><?php 
                                        if($all->wed == 'on'){ ?>
                                            <span class="az-yes" style="color: #3ad524"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no" style="color: #e21717"><i class="fas fa-times-circle"></i></span>
                                    <?php  }?>
                                    </td>
                                    <td><?php 
                                        if($all->thu == 'on'){ ?>
                                            <span class="az-yes" style="color: #3ad524"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no" style="color: #e21717"><i class="fas fa-times-circle"></i></span>
                                    <?php  }?>
                                    </td>
                                    <td><?php 
                                        if($all->fri == 'on'){ ?>
                                            <span class="az-yes" style="color: #3ad524"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no" style="color: #e21717"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?></td>
                                    <td><?php 
                                        if($all->sat == 'on'){ ?>
                                            <span class="az-yes" style="color: #3ad524"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no" style="color: #e21717"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?></td>
                                    <td><?php
                                        if($all->sun == 'on'){ ?>
                                            <span class="az-yes" style="color: #3ad524"><i class="fas fa-check-circle"></i></span>
                                    <?php     } else { ?>
                                        <span class="az-no" style="color: #e21717"><i class="fas fa-times-circle"></i></span>
                                    <?php  } ?>
                                    </td>
                                    <td><?php echo $all->added_on;?></td>
                                    <td>
                                      <a class="edit_data" href="<?php echo base_url();?>availability/edit/<?php echo $all->days_id;?>"><i class="fa fa-edit"></i></a> &nbsp;  
                                     <a class="delete_data" onclick="myJsFunc_comdel('<?php echo $all->days_id;?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                          
                                   
                                    </td>
                                   
                                   
                                   
                                </tr>
                                <?php $i++; } ?>    
                                
                                </tbody>
                            </table> 

                             
                            
                           
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
    
<script type="text/javascript">
  function myJsFunc_comdel(dataid)
  {
    if (confirm("Are you sure that you want to update the data?"))
    {
    window.location.href = "<?php echo base_url()?>availability/delete_data/"+dataid;
    }
  }
</script>      