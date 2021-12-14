<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Student Google Login Management
                        
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
                                   <a id="editable-sample_new" class="btn btn-primary" href="<?php //echo base_url('student/add')?>">
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
                                      <th>Email</th>
                                      <th>Usertype</th>
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
                                    <td><?php echo $all->f_name;?></td>
                                    <td><?php echo $all->email;?></td>
                                    <td><?php 
                                    foreach($usertype_data as $usertype) {
                                        if($usertype->type_id==$all->usertype_id){
                                            echo $usertype->type_name;
                                        }
                                     }
                                    ?></td>
                                    <td><?php echo $all->added_on;?></td>
                                    <td>
                                      <a class="edit_data" href="<?php echo base_url();?>studentgoogle/view/<?php echo $all->id;?>"><i class="fas fa-eye"></i></a>
                                       &nbsp;
                                     <a class="delete_data" onclick="myJsFunc_comdel('<?php echo $all->id;?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a> 
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
  function myJsFunc_comdel(dataid,dataimg)
  {
    if (confirm("Are you sure that you want to delete the data?"))
    {
    window.location.href = "<?php echo base_url()?>studentgoogle/delete_data/"+dataid+'/'+dataimg;
    }
  }
</script>      