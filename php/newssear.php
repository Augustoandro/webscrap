<!DOCTYPE html>
<html>
      <head>
            <title>Webscrap</title>
      </head>
      <body onload="ld()">
        <?php header('X-Frame-Options: DENY'); header('X-XSS-Protection: 1; mode=block'); header('X-Content-Type-Options: nosniff'); header('Content-Security-Policy: upgrade-insecure-requests'); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css" src="../css/bootstrap.min.css"></style>
<style type="text/css">
#resdoodle{font-size:30px;font-weight:700;margin-left:5px;margin-top:7px}#searchbx2{margin-top:12px;margin-left:60px}#bg{background:#f2f2f2}.result{margin-left:10%;margin-right:25%;margin-top:12px}ul{list-style-type:none;margin:0;padding:0;overflow:hidden}li a{float:left;display:block;font-weight:700;color:#0000cd;background-color:#f2f2f2;width:120px;text-align:center;padding:4px;text-transform:uppercase;text-decoration:none}.current{background-color:#fff;color:red}.card{box-shadow:0 4px 8px 0 rgba(0,0,0,.2);border-radius:10px;width:85%}.contp1{width:85%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}.contp2{display:block;text-overflow:ellipsis;word-wrap: break-word;overflow:hidden;max-height:4.7em;line-height:1.5em;}#myBtn {display:none;position:fixed;bottom:20px;right:30px;z-index:99;border:none;outline:none;background-color:#FE840E;color:#000000;height:50px;width:50px;cursor:pointer;padding:15px;border-radius:25px;font-size:18px;}#myBtn:hover {background-color:#FE840E;}.more{font-size:50px;font-style:italic;font-color:#000000;}
</style>
<script type="text/javascript">function ld()
{
    document.search_box.search.focus();
}
</script>
            <div class="container-fluid" id="bg">
            	<form action="newssear.php" method="get">
                     <div class="row" id="bg">
                         <div class="col-sm-1" id="resdoodle">
                             <a href="../index.php"><font color="#FF0000">W</font><font color="#FFA500">e</font><font color="#008000">b</font><font color="#0000FF">s</font><font color="#0000FF">c</font><font color="#0000FF">r</font><font color="#0000FF">a</font><font color="#0000FF">p</font></a>
                         </div>
                         <div class="col-sm-6" id="searchbx2">
                             <div class="input-group">
                                 <input type="text" class="form-control" name="search" id="boxstyle2" required>
                                 <span class="input-group-btn">
                                      <input type="submit" class="btn btn-secondary" name="search_btn" value="GO" id="btnstyle2">
                                 </span>
                             </div>
                         </div>
                     </div>
                </form>
                <?php
                  $_con=mysqli_connect("ls-5169785d26a2280a235dbd400798b064d1e0d838.c6fyccngpxxf.ap-south-1.rds.amazonaws.com", "admin_augustus", "DemonHalfas1729");
                  mysqli_select_db($_con,"admin_webd");
                  if(isset($_GET['search_btn']))
                  {
                    $search=mysqli_real_escape_string($_con,$_GET['search']);
                    $_sql3="select * from websid where stitle like '%".$search."%'";
                    $rs=mysqli_query($_con,$_sql3);
                    echo "<nav>
                    <ul>
                    <li><font size='+1' color='#9999ff'><a href='resu.php?search=$search&search_btn=Scrap+Search'>All</a></font></li><li><font size='+1' color='#9999ff'><a href='imagesear.php?search=$search&search_btn=GO'>Images</a></font></li><li><font size='+1' color='#9999ff'><a href='videosear.php?search=$search&search_btn=GO'>Videos</a></font></li><li><font size='+1' color='#9999ff'><a class='current' href='newssear.php?search=$search&search_btn=GO'>News</a></font></li>
                    </ul>
                    </nav>";
                  }
                ?>
            </div>    
            <div class="result">
            	<?php
            	$_con=mysqli_connect("ls-5169785d26a2280a235dbd400798b064d1e0d838.c6fyccngpxxf.ap-south-1.rds.amazonaws.com","admin_augustus","DemonHalfas1729");
            	mysqli_select_db($_con,"admin_webd");
                $search=mysqli_real_escape_string($_con,$_GET['search']);
                $results_per_page=12;
            	$_sql1="select * from websid where stitle like '%".$search."%' and styp like 'article' limit 0,180";
                $rs=mysqli_query($_con,$_sql1);
                $number_of_results=mysqli_num_rows($rs);
                     $number_of_pages=ceil($number_of_results/$results_per_page);
                     if(!isset($_GET['page'])){
                     	$page=1;
                     }
                     else{
                     	$page=$_GET['page'];
                     }
                     $this_page_first_result=($page-1)*$results_per_page;
                     $_sql4="select * from websid where stitle like '%".$search."%' and styp like 'article' limit ".$this_page_first_result.",".$results_per_page;
                     $rs4=mysqli_query($_con,$_sql4);
                if(mysqli_num_rows($rs)<1)
                {
                 echo "<center><h4><b>Oops! No result found for your query</b></h4></center>";
                 exit();
                }
                while($resul=mysqli_fetch_assoc($rs4))
                {
                        echo "<div class='card'>";
                        echo "<div class='container'>";
                        echo "<a href='".$resul['slink']."'><font size='4' color='#0000cc'> <b>".$resul['stitle']."</b></font>";
                        echo "<div class='contp1'><font size='3' color='#006400'> <b>".$resul['slink']."</b></font></div>";
                        echo "<div class='contp2'><font size='3' color='#666666'> <b>".$resul['sdesc']."</b></font></div></a>";
                        echo "</div>";
                        echo "</div>";
                }
                echo "<br><div class='more'>Search more</div>";
                if($_GET['page']>1){
                     	$page=$page-1;
                     	echo "<a href='newssear.php?search=$search&search_btn=GO&page=".$page."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Previous</a>";
                     }
                     for($page=1;$page<=$number_of_pages;$page++){
                     	echo "<a href='newssear.php?search=$search&search_btn=GO&page=".$page."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$page."</a>";
                     }
                     if(!isset($_GET['page']))
                     {
                     	$page=1;
                     	$page=$page+1;
                     	echo "<a href='newssear.php?search=$search&search_btn=GO&page=".$page."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Next</a>";
                     }
                     else if($_GET['page']!=13){
                     	$page=$_GET['page']+1;
                     	echo "<a href='newssear.php?search=$search&search_btn=GO&page=".$page."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Next</a>";
                     }
                ?>
            </div>
            <script type="text/javascript">
            	window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
} 
            </script>
             <button onclick="topFunction()" id="myBtn" title="Go to top">^</button>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/tether.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
      </body>
</html>