<section class="az-faqs-banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                    <h1>FAQs</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                </div>
            </div>
        </div>
    </section>
    <section class="az-faq-body">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="faq-sidebar">
                    <h4><span>FAQ</span> Topics</h4>
                    
                    <ul>
                        <?php foreach($faqtopics_data as $topics){ ?> 
                        <li><a href="<?php echo $topics->id;?>"><?php echo $topics->topics_name;?></a></li> 

                        <!-- <li><a href="#faq1">Topic 1</a></li> -->
                       
                         <?php } ?>
                    </ul>
                   
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="faq-topics-wrapper">
                    <div class="faq-topics" id="faq1">
                        <h3> 
                           <?php foreach($faqtopics_data as $topics){ ?> 
                            <a href="<?php echo $topics->id;?>"><?php echo $topics->topics_name;?></a>
                              
                        </h3>
                        <div class="accordion">
                            <?php foreach($faqs_data as $faqs){?> 
                            <div class="accordion-item"> 
                                <div class="accordion-item-header">
                                    <?php echo $faqs->question;?>
                                </div>
                                <div class="accordion-item-body">
                                    <div class="accordion-item-body-content">
                                        <?php echo $faqs->answer;?>
                                    </div>
                                </div>
                            </div>
                           
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                   
                   
                    </div>
                </div>
            </div>
        </div>
    </section>