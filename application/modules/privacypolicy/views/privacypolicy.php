<section class="az-privacy-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1>Privacy Policy</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                </div>
            </div>
        </div>
    </section>
    <section class="az-staticpage-body">
        <div class="container">
            <?php  foreach($privacypolicy_data as $privacypolicy){  ?>
            <h2>
                <?php echo $privacypolicy->heading_title;?>
            </h2>
            <p>
                <?php echo $privacypolicy->descrip;?>
            </p>
            <p>
                <?php echo $privacypolicy->descrip2;?>
            </p>
             <?php  }  ?>
        </div>
    </section>