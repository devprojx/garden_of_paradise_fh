<?php 
$title = "Obituary";

require('../services/ObituaryService.php');
 
 $obituaryService = new ObituaryService();
    $page_num = 1;
    $album = null;

    if(isset($_GET['page_num'])){
         if($_GET['page_num'] > 1 && $_GET['page_num'] > $obituaryService->getCount()){
             $page_num = 1;
         }
         else if($_GET['page_num']>1){
            $page_num = $_GET['page_num'];
         }
    }
    if(isset($_GET["q"])){
       $obituaryList = $obituaryService->getByLimit($page_num, 10, $_GET["q"]);
    }else{
       $obituaryList = $obituaryService->getByLimit($page_num, 10);
    }
    $numberOfPages = $obituaryService->getNumberOfPages();
?>
<?php require_once('header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 obituary-content">
            <div id="search-wrapper">
                <input type="search" placeholder="Search Obituary">
                <br>
            </div>
            <div class="search-result">  
               <?php foreach($obituaryList as $obituary) : ?>  
                    <div class="row search-item">
                        <div class="col-md-2">
                            <br/>
                        <img src="<?=($obituary->getPath() == null)?'../assets/img/blank.png':$obituary->getPath()?>" width="120px" height="125px">
                        </div>
                        <div class="col-md-10">
                            <h2> <?= $obituary->getName() ?> </h2>
                            <?php $end= (strlen($obituary->getDetails()) > 200 )? 200 : strlen($obituary->getDetails());  ?>
                            <?= substr($obituary->getDetails(), 0, $end).'...'; ?>
                            <br>
                            <a href="<?= 'obituary-view.php?id='.$obituary->getId() ?>">Read Life Story</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <?php if(count($obituaryList) < 1): ?>
                  <center><h3>No obituary Listed </h3></center>
                <?php endif; ?>
            </div>
            <div class="row text-center">
                <!--Pagination -->
                <nav aria-label="..." style=" position: relative; margin: auto 0;">
                <ul class="pagination pagination-sm">
                    <?php if($page_num != 1): ?>
                        <li class="page-item">
                        <a class="page-link" href="obituary.php?page_num=<?=$page_num - 1?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php for( $i =1; $i <= $numberOfPages; $i++):?>
                    
                    <li class="page-item <?=($page_num == $i)?'active':''?>"><a class="page-link" <?=($page_num == $i)?' ':"href= 'obituary.php?page_num=$i'"?> > <?=$i ?></a></li>
                        
                    <?php endfor;?>
                    

                    <?php if($page_num != $obituaryService->getNumberOfPages() &&  $obituaryService->getNumberOfPages() != 0): ?>
                        <li class="page-item">
                        <a class="page-link" href="obituary.php?page_num=<?=$page_num + 1?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    <?php endif; ?>
                </ul>
                </nav>
                <!--end Pagination -->
              </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>