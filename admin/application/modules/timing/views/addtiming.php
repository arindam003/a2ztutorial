<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
		    <?php if($this->session->flashdata('err_msg')!="") { ?>
						 <div class="clearfix"></div>
            <div class="alert alert-danger">
              <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
            </div>
              <?php } ?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Add Timing <a href="<?php echo base_url('timing');?>" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							
                            <form role="form" method="POST" action="">

                                <!-- <div class="form-group">
                                    <label for="inputslidercaption">Days  </label><br>
                                    <input name="days" type="date" class="form-control" id="inputslidercaption" placeholder="Enter Days ">
                                    <input type="checkbox"  name="day[]" value="Mon">Mon
                                    <input type="checkbox"  name="day[]" value="Tues">Tues
                                </div> -->
                               
                                <div class="form-group">
                                    <label for="inputslidercaption">Timing  </label>
                                    <input name="timing" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Timing ">
                                </div>
                                

                            <!-- <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col"><span class="th-icon"><i class="fas fa-calendar-check"></i></span></th>
                                        <th scope="col">Mon</th>
                                        <th scope="col">Tue</th>
                                        <th scope="col">Wed</th>
                                        <th scope="col">Thu</th>
                                        <th scope="col">Fri</th>
                                        <th scope="col">Sat</th>
                                        <th scope="col">Sun</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">Pre 12pm</th>
                                        <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                        <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                        <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                        <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                        <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">12pm-5pm</th>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">After 5pm</th>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-yes"><i class="fas fa-check-circle"></i></span></td>
                                        <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                        <td><span class="az-no"><i class="fas fa-times-circle"></i></span></td>
                                      </tr>
                                    </tbody>
                                </table>
                            </div> -->
                               
                                
                                 
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
							
                        </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>




    <style>

    </style>