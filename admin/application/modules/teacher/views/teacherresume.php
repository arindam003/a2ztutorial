<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Teacher resume
                        
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
                            
                        
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                  <tr>
                                      <th>SL No.</th>
                                      
                                      <th>Download CV</th>
                                      
                                      
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i=1; 
                                // echo '<pre>';
                                // print_r($alldata);die;
                                foreach($teacher_data as $all) { ?>
                                <tr class="">
                                
                                    <td><?php echo $i;?></td>
                                    
                                    <td >
                                        <?php if($all->file_src== ''){ 
                                            echo 'No File Available';
                                        }else {
                                            ?>
                                       
                                       
                                           <!-- <a href="<?//=base_url('teacher/viewfile/'.$all->id)?>" >View </a>  -->
                                        <a class="edit_data" href="<?php echo base_url();?>teacher/viewfile/<?php echo $all->id;?>">View</a> 
                                          
                                           

                                    <?php } ?>
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

