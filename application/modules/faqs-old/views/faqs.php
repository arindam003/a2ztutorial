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
                        
                        <?php foreach($faqtopics_data as $topics){?>
                            
                        <li><a href="#faq_<?=$topics->id;?>"><?php echo $topics->topics_name;?></a></li> 
                        
                        <?php } ?>
                        <!-- <li><a href="#faq1">Topic 1</a></li> -->
                       
                        
                    </ul>
                   
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="faq-topics-wrapper">
                      <?php foreach($faqtopics_data as $topics){?>  
                       <div class="faq-topics" id="faq_<?=$topics->id;?>">
                        <h3> 
                           
                            <?php echo $topics->topics_name;?>
                              
                        </h3>
                        <?php $faq_data = get_faq($topics->id);?>
                        <div class="accordion">
                           <?php foreach($faq_data as $faqs){  ?>   
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
                        
                    </div>
                   <?php }  ?>
                   
                    </div>
                </div>
                 
            </div> 
        </div>
    </section>