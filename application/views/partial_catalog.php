<style type="text/css">
  .image{   
    margin: 5px;
    display: inline-block;
    width:150px;
    height:150px;  
    border: 1px solid silver;
  }
</style>

<div class="col-xs-6 col-md-8">  
         <div class="row">
          <div class="col-md-8">
            <h3>
<?php      if($category == 0){
              echo "Showing all";
          }
          else{
            echo $imgs[0]['name'];
          }
?>          </h3></div>
          <div class="col-md-4">

            <ul sclass="list-inline list-unstyled ">
              <li>Pages:</li>
<?php
              // determine the pages for pagination
              $number_pages = intval($count_imgs['count_imgs'])/20;
              $pages = round($number_pages, 0, PHP_ROUND_HALF_UP);
              for($i=1; $i<=$pages; $i++)
              { 
?>
                 <li><a href="/customers/pages/<?=$i?>"><?= $i ?></a></li>
<?php
              }
?>
            </ul>            
          </div>  <!-- close pagination -->
        </div>  
         <div class="row">
<?php        
            echo intval($count_imgs['count_imgs']);
            for($i=1; $i<=20; $i++)
            {
?>
              <a href="/customers/product"><img class=" col-md-2 image" src=<?= "'".BASE_URL.$imgs[$i]['url']."'";?> alt="coming soon"></a>
<?php
            }
?>
       </div>
        </div>