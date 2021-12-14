<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Findmetutor Management
                        
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
                            <!-- <div class="clearfix">
                                <div class="btn-group">
                                   <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url('findmetutor')?>">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                               
                            </div> -->
                        
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                  <tr>
                                      <th>SL No.</th>
                                      <th>Name</th>
                                      <th>Phone</th>
                                      <th>Email</th>
                                      <th>Added On</th>
                                      <th>Action</th>
                                      
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i=1;
                                foreach($alldata as $all) { ?>
                                <?php  //print_r($all);die; ?>
     
                                <tr class="">
                                
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $all->fullname;?></td>
                                    <td><?php echo $all->phone;?></td>
                                    <td><?php echo $all->email;?></td>
                                    <td><?php echo $all->added_on;?></td>
                                    <td>

                                     <a class="delete_data" onclick="myJsFunc_comdel('<?php echo $all->find_id;?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>&nbsp;
                                     <a class="edit_data" href="<?php echo base_url();?>findmetutor/view_details/<?php echo $all->find_id;?>"><i class="fas fa-eye"></i></a>     
                                   
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
    if (confirm("Are you sure that you want to delete the data?"))
    {
    window.location.href = "<?php echo base_url()?>findmetutor/delete_data/"+dataid;
    }
  }
</script>      