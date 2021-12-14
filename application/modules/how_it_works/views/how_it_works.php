<section class="az-hiw-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1>How It Works</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    
                </div>
            </div>
        </div>
    </section>
    <section class="hiw-sec1">
        <div class="container">
            <?php foreach($howworks_data as $works){?> 
            <h2><?php echo $works->heading_title;?></h2>
            <h6><?php echo $works->descrip;?></h6>
            <?php } ?>
            <!--Space For Video-->
            <div class="row">
                <?php foreach($howworks_data2 as $works2){?> 
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                     
                    <div class="hiw-features">
                        <h3><?php echo $works2->id;?></h3>
                        <h5><?php echo $works2->heading;?></h5>
                        <p><?php echo $works2->descrip;?></p>
                    </div>
                
                </div>
               
                <?php } ?>
            </div>
        
        </div>
    </section>
    <section class="az-find">
        <div class="container">
            <div class="az-find-wrapper">
                <h3>BOOK A MEETING WITH A TUTOR: </h3>
                <button onClick="window.location = '<?php echo base_url('findTutor');?>';">FIND A TUTOR</button>
            </div>
        </div>
    </section>
    <section class="hiw-sec2">
        <div class="container">
            <?php foreach($howworks_data as $works){?>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $works->image_src2; ?>"  />
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h4><?php echo $works->heading2;?></h4>
                    <p><?php echo $works->descrip2;?></p>
                </div>
            </div>
           
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <img src="<?php echo base_url();?>admin/uploads/pages_image/<?php echo $works->image_src3; ?>" />
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <h4><?php echo $works->heading3;?></h4>
                    <p><?php echo $works->descrip3;?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <h3><?php echo $works->heading4;?></h3>
                    <p><?php echo $works->descrip4;?></p>
                        <div class="hiw-fat-button">
                     <button onClick="window.location = '<?php echo base_url('findTutor');?>';">FIND A TUTOR</button>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12"></div>
            </div>
             <?php } ?>
        </div>
    </section>