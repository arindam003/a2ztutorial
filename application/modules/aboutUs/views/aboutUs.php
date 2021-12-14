<section class="az-about-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1>About Us</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    
                </div>
            </div>
        </div>
    </section>
    <section class="az-about-body">
        <div class="container">
            <?php foreach($about_data as $about){?>
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 az-about-wwa">
                    <h2><?php echo $about->heading_title;?></h2>
                    <p><?php echo $about->descrip;?></p>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
            </div>
            <div class="row">
                <h2>Our <span>Mission</span></h2>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $about->image_src2; ?>" alt="about-page1.jpg"/>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h4><?php echo $about->heading2;?></h4>
                    <p> <?php echo $about->descrip2;?></p>
                </div>
                </div>
                <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $about->image_src3; ?>" alt="about-page2.jpg" />
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h4><?php echo $about->heading3;?></h4>
                    <p> <?php echo $about->descrip3;?></p>
                </div>
            </div>
        <?php } ?>
        </div>
    </section>
    <section class="az-about-our-team">
        <div class="container">
            <h2>Our <span>Team</span></h2>
            <div class="row">
                <?php foreach($ourteam_data as $ourteam){?>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="about-our-team-img">
                        <img src="<?php echo base_url();?>admin/uploads/ourteam_image/<?php echo $ourteam->image_src; ?>" />
                    </div>
                        <h5><?php echo $ourteam->name;?></h5>
                        <p><?php echo $ourteam->designation;?></p>
                </div>
            <?php } ?>
                
            </div>
        </div>
        <div class="az-view-all">
            <button onClick="window.location = '<?php echo base_url('ourteam');?>';">
                VIEW ALL
            </button>
        </div>
    </section>