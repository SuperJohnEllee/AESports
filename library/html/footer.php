<footer>
    <div class="container-fluid blk text-white">
       <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="about">
                         <span>About Us</span>    
                         <li>
                            <p>Our system will improve efficiency at court facilities and improve player services.</p>
                          </li>                              
                     </ul>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                    <ul class="court">
                         <span>Sports</span>    
                         <li>
                            <a href="#">Basketball</a>
                          </li>                               
                          <li>
                             <a href="#">Volleyball</a>
                          </li>                               
                          <li>
                            <a href="#">Badminton</a>
                          </li>                             
                          <li>
                             <a href="#">Tennis</a>
                          </li>
                    </ul>
                </div>
				        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <ul class="court">
                         <span>Contact Us</span>
                          <li><?php echo $contact_row['Address']; ?></li>        
                          <li><?php echo $contact_row['ContactEmail']; ?></li>                               
                          <li><?php echo $contact_row['ContactNumber']; ?></li>
                          <li><?php echo $contact_row['Schedule']; ?></li>                
                    </ul>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-12">
                    <ul class="court">
                         <span>Map</span>    
                        <div class="col-md-3 text-white">
                          <div id="ae_map" style="height: 250px; width: 350px;"></div>
                        </div>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhBuIWDfjqk26jnvuR95_-ZHXhFV7dcdA&libraries=places&callback=initMap"></script>
                    </ul>
                </div>
			     </div> 
		</div>
 </footer>
 
    <div style="background-color: #000;padding: 15px 0;" class=" text-center text-white">
        <h6 class="col-lg-12">Develop by AE Solutions &copy 2018. All Rights Reserved</h6>
    </div>