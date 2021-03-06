<?php 
$title = "Home";

require('../services/ObituaryService.php');
 
 $obituaryService = new ObituaryService();
 $page_num = 1;
    
 $obituaryList = $obituaryService->getByLimit($page_num, 3);

?>
<?php require_once('header.php'); ?>      
<link rel="stylesheet" href="../assets/css/carousel.css">
<div class="container-fiuld">
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active moving">
                <div class="carousel-caption">
                  <h2 style="color: #830506;">Granting Relief in Times of Grief</h2> 
                </div>
            </div>
            <div class="item moving">
                <div class="carousel-caption">
                   <h2 > Every Life Deserved A Special Time of Honouring and Celebrating</h2> 
                   <h4> Let us at Garden of Paradise assist you </h4>
                </div>
            </div>
            <div class="item moving">
                <div class="carousel-caption">
                    <h2>Let Us Lend A Helping Hand</h2>
                   <h4>Helping Families and Friends Honour Thier Loved Ones</h4>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <!--<a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>-->
    </div>
</div>
<div class="container-fiuld home-content">
<div class="container">
    <div class="row welcome">
					<div class="col-md-10 wow slideInLeft">
							<h2>Welcome</h2>
							<img src="../assets/img/building.jpg" class="img-responsive"  width="400px" height="350px" style="margin-left:25px" alt="" align="right"> 
							<p>
									We understand that under the circumstances in which our services are needed, we aim to offer the best care to your loved ones and to ensure that you receive professional services in a calm and serene environment.
									We have created a home-like atmosphere for you to gather with family at the loss of your loved one. Strict attention is given to every detail of funeral services to ensure your satisfaction. We have expertise in all types of funeral services whether it is simple or elaborate. 
							</p>
							<p>
								"We welcome inquiries and will respond quickly with answers or services, as we strive to be the best funeral service providers in Jamaica.” 
								We have a dynamic team who is able to assist in any way possible during your time of bereavement or to lend an extra shoulder to cry on. We understand the pain of losing a loved one and are pleased to say we autograph our services with one word-Excellence! 
							</p>
					</div>
					<div class="col-md-4">
					</div>
        </div> 
      </div> 
   </div> 
  <div class="container-fiuld home-obituary gray-bg">
     <div class="container">
         <center><h1>Current Obituaries</h1></center>
         <div class="row">
            <?php foreach($obituaryList as $obituary) : ?>  
                    <div class="col-md-4 col-sm-4 col-xs-6 row wow fadeInDown">
                        <div class="col-md-5">
                            <br/>
                            <img src="<?=($obituary->getPath() == null)?'../assets/img/blank.png':$obituary->getPath()?>" width="120px" height="120px">
                        </div>
                        <div class="col-md-7">
                            <h2> <?= $obituary->getName() ?> </h2>
                            <?php $end= (strlen($obituary->getDetails()) > 70 )? 70 : strlen($obituary->getDetails());  ?>
                            <?= substr($obituary->getDetails(), 0, $end).'...'; ?>
                            <a class="btn" href="<?= 'obituary-view.php?id='.$obituary->getId() ?>">Read Life Story</a>
                        </div>
                    </div>
             <?php endforeach; ?>
        </div>
        <br />
         <?php if(count($obituaryList) < 1): ?>
             <center><h3>No obituary Listed </h3></center>
         <?php else : ?>
             <center><a href="./obituary.php" class="btn o-btn" >View All Obituaries</a></center>
        <?php endif; ?>
     </div>
</div>
 <div class="container-fiuld packages">
     <div class="container">
         <div class="row">
            <div class="col-md-3 col-sm-6 ">
            <div class="card card-hover wow slideInRight" data-wow-delay="0.2s">
                 <img src="../assets/img/leaf.png" class="img-responsive card-leaf-left"  width="50px" height="100px"style="" alt="" > 
            <img src="../assets/img/leaf.png" class="img-responsive card-leaf-right"  width="50px" height="100px" alt="" > 
		
                    <h3>Basic Package</h3>
                    <ul>
                        <li>Pick Up</li>
                        <li>Storage</li>
                        <li>Embalm & Preparation</li>
                        <li>Casket</li>
                        <li>Casket Spray</li>
                        <li>Hearse</li>
                        <li>100 Programs</li>
                        <li>100 Prayer Cards/Book Markers</li>
                        <li>TVJ's Death Announcement</li>
                    </ul>
                    <div class="custom-card-footer">
                       <center> <a href="./request-quote.php?type=bp" class="btn btn-primary">View All Basic Packages</a> </center>
                   </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
            <div class="card card-hover wow slideInRight" data-wow-delay="0.4s">
                
                 <img src="../assets/img/leaf.png" class="img-responsive card-leaf-left"  width="50px" height="100px"style="" alt="" > 
            <img src="../assets/img/leaf.png" class="img-responsive card-leaf-right"  width="50px" height="100px" alt="" > 
                    <h3>Garden Package</h3>
                    <ul>
                        <li>Pick Up</li>
                        <li>Storage</li>
                        <li>Embalm & Preparation</li>
                        <li>Regular or Semi-customized Casket</li>
                        <li>Casket Spray</li>
                        <li>Hearse</li>
                        <li>150 Programs</li>
                        <li>150 Prayer Cards/Book Markers</li>
                        <li>Two (2) TVJ's Death Announcement or One (1) Gleaner Advertisement</li>
                    </ul>
                    <div class="custom-card-footer">
                      <center> <a href="./request-quote.php?type=gp" class="btn btn-success">View All Garden Packages</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                 <div class="card card-hover wow slideInRight" data-wow-delay="0.6s">
                     
                 <img src="../assets/img/leaf.png" class="img-responsive card-leaf-left"  width="50px" height="100px"style="" alt="" > 
            <img src="../assets/img/leaf.png" class="img-responsive card-leaf-right"  width="50px" height="100px" alt="" > 
                    <h3>Paradise Package</h3>
                    <ul>
                        <li>Pick Up</li>
                        <li>Storage</li>
                        <li>Embalm & Preparation</li>
                        <li>Regular or Semi-customized Casket</li>
                        <li>Casket Spray</li>
                        <li>Hearse</li>
                        <li>Wreath</li>
                        <li>200 Programs</li>
                        <li>200 Prayer Cards/Book Markers</li>
                        <li>Two (2) TVJ's Death Announcement + One (1) Gleaner Advertisement</li>
                    </ul>
                    <div class="custom-card-footer">
                      <center> <a href="./request-quote.php?type=pp" class="btn btn-warning">View All Paradise Packages</a></center>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
            <div class="card card-hover wow slideInRight" data-wow-delay="0.8s">
                 <img src="../assets/img/leaf.png" class="img-responsive card-leaf-left"  width="50px" height="100px"style="" alt="" > 
                 <img src="../assets/img/leaf.png" class="img-responsive card-leaf-right"  width="50px" height="100px" alt="" > 
                    <h3>Customized Package</h3>
                    <br />
                    <h4>
                     Didn't find a package that suits you? </h4> <h4> customize a request. </h4>
    
                   <center> <a href="./customize-package.php" id="d" class="btn btn-custom" style="background-color:#eee">Click Here To Get Started</a></center>
                </div>
            </div>
        </div>
     </div>
 </div> 
</div>
<div class="contianer-fluid gray-bg">
<div class="container">
    <div class="row welcome">
        <div class="col-md-10 wow slideInLeft">
            <br />
            <h2>Pre-Arrangements</h2>
                <p>Garden of Paradise establish your wishes ahead of time. This considerate act can shield your family from the difficult decision & confusion that often occur when limited time prevents thoughtful planning.</p>
                <p> We will help to plan your funeral ahead of time for you or your family member. We will explain your options; best of all you can make choices with freedom from the usual urgencies that are created when a death occurs.</p>
            <a href="./prearrangements.php" class="btn btn-outline">Click for more information </a>
            <br />
            <br />
            <br />
        </div>
        <div class="col-md-4"></div>
    </div> 
</div> 
</div>
<?php require_once('footer.php'); ?>
<script>
    $('#carousel').carousel();
</script>