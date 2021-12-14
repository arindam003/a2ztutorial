<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Teacher Management
                        
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
                                   <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url('teacher/add')?>">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                               
                            </div>
                        
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                  <tr>
                                      <th>SL No.</th>
                                      <th>Name</th>
                                      <th> Email</th>
                                      <th>Image</th>
                                      <th>Subjects</th>
                                      <th>Download CV</th>
                                      <th>Approval</th>
                                      <th>Online Lesson</th>
                                      <th>Qualified</th>
                                      <th>Added On</th>
                                      <th>Action</th>
                                      
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i=1; 
                                // echo '<pre>';
                                // print_r($alldata);die;
                                foreach($alldata as $all) { ?>
                                <tr class="">
                                
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $all->name;?></td>
                                    <td><?php echo $all->email;?></td>
                                     <td class="img_data"><img  src="<?php echo base_url()?>uploads/teacher_image/<?=$all->image_src;?>" height=100px;width=100px;></td>
                                    <td><?php  

                                    $subjects=$all->subject_offered;
                                   
                                    $sub=json_decode($subjects, true);
                                    echo implode(" , ",$sub);

                                    ?>
                                    </td>
                                    <td >
                                        <?php 
                                        if($all->file_src==''){ 
                                            echo 'No File Available';
                                        }else {
                                            ?>
                                       
                                        <a href="<?php echo base_url().'teacher/download/'.$all->id; ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download-alt"></a>

                                        <!-- <a class="edit_data" href="<?php //echo base_url();?>teacher/viewfile/<?php// echo $all->file_src;?>" target="_blank">View</a>   -->
                                       


                                         
                                         <!--  <a href="<?//=base_url('teacher/viewfile/'.$all->id)?>" >View </a>   -->
                                        <!-- <a class="edit_data" href="<?php //echo base_url();?>teacher/viewfile/<?php //echo $all->id;?>">View</a> --> 
                                          
                                           

                                    <?php } ?>
                                    </td>
                                    <td>
                                    <?php 
                                        
                                    if($all->status=="0") { ?>
                                    
                                    <a href="<?php echo base_url();?>teacher/status_active/<?php echo $all->id;?>" class="btn btn-success">YES </a>
                                     <?php } else if($all->status=="1"){?>
                                       <a href="<?php echo base_url();?>teacher/status_inactive/<?php echo $all->id;?>" class="btn btn-danger">NO </a>
                                     <?php } 
                                    ?></td>
                                    <td>
                                    <?php 
                                        
                                    if($all->online_lesson=="0") { ?>
                                    
                                    <a href="<?php echo base_url();?>teacher/onlinelesson_active/<?php echo $all->id;?>" class="btn btn-success">YES </a>
                                     <?php } else if($all->online_lesson=="1"){?>
                                       <a href="<?php echo base_url();?>teacher/onlinelesson_inactive/<?php echo $all->id;?>" class="btn btn-danger">NO </a>
                                     <?php } 
                                    ?></td>
                                    <td>
                                    <?php 
                                        
                                    if($all->qualified=="0") { ?>
                                    
                                    <a href="<?php echo base_url();?>teacher/qualified_active/<?php echo $all->id;?>" class="btn btn-success">Qualified </a>
                                     <?php } else if($all->qualified=="1"){?>
                                       <a href="<?php echo base_url();?>teacher/qualified_inactive/<?php echo $all->id;?>" class="btn btn-danger">Not Qualified </a>
                                     <?php } 
                                    ?></td>
                                    <td><?php echo $all->added_on;?></td>
                                    <td>
                                      <a class="edit_data" href="<?php echo base_url();?>teacher/edit/<?php echo $all->id;?>"><i class="fa fa-edit"></i></a> &nbsp;
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
    window.location.href = "<?php echo base_url()?>teacher/delete_data/"+dataid+'/'+dataimg;
    }
  }
</script>      

