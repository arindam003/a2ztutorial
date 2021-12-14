 <section class="az-our-team-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1>Our Team</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    
                </div>
            </div>
        </div>
    </section>
    <section class="az-our-team-body">
        <div class="container">
            <h2>Meet <span>The Team</span></h2>
             <?php foreach($ourteam_data as $ourteam){?> 
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="az-our-team-img">
                        <img src="<?php echo base_url();?>admin/uploads/ourteam_image/<?php echo $ourteam->image_src; ?>"  />
                    </div>
                        <h4><?php echo $ourteam->name;?></h4>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <h5><?php echo $ourteam->designation;?></h5>
                    <h6>Location - <?php echo $ourteam->address;?></h6>
                    <p><?php echo $ourteam->descrip;?></p>
                </div>
            </div>
           <?php } ?>
        </div>
        <!-- <div class="az-pagination-wrapper">
            <div class="az-pagination">
                <a href="#">&laquo;</a>
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">&raquo;</a><center><?php echo $this->pagination->create_links();?></center> 
             </div>
        </div> -->
        <div class="az-pagination-wrapper">
            <div class="az-pagination">
                <?php echo $this->pagination->create_links();?>
               
            </div>
        </div> 
        
    </section>