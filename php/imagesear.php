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
#resdoodle{font-size:30px;font-weight:700;margin-left:5px;margin-top:7px}#searchbx2{margin-top:12px;margin-left:60px}#bg{background:#f2f2f2}.result{margin-left:10%;margin-top:12px}.imgp{max-height:150px;max-width:150px;}ul{list-style-type:none;margin:0;padding:0;overflow:hidden}li a{float:left;display:block;font-weight:700;color:#0000cd;background-color:#f2f2f2;width:120px;text-align:center;padding:4px;text-transform:uppercase;text-decoration:none}.current{background-color:#fff;color:red}#myBtn{display:none;position:fixed;bottom:20px;right:30px;z-index:99;border:none;outline:none;background-color:#FE840E;color:#000000;height:50px;width:50px;cursor:pointer;padding:15px;border-radius:25px;font-size:18px;}#myBtn:hover{background-color:#FE840E;}.more{font-size:50px;font-style:italic;font-color:#000000;}.footer{position:fixed;bottom:0;}div.gallery{margin:5px;border: 1px solid transparent;float:left;width:180px;height:220px;margin-bottom:15px;}div.gallery:hover{border: 1px solid #777;}div.gallery img{width:100%;}div.desc{padding:15px;text-align:center;}div.imgt{font-size:12px;}div.imgd{font-size:9px;}.contp1{overflow:hidden;text-overflow:ellipsis;max-height:1.5em;line-height:1.5em;}.imgm{width:100%;height:500px;}.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
.imge{max-height:150px;max-width:150px;}
.dropdown {
  position: relative;
  display: inline-block;
}
</style>
<script type="text/javascript">function ld()
{
  document.search_box.search.focus();
}
</script>
<script type="text/javascript">
	/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 
</script>
            <div class="container-fluid" id="bg">
            	<form action="imagesear.php" method="get">
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
                    $_sql3="select * from websid where stitle like '%".$search."%' limit 0,5";
                    $rs=mysqli_query($_con,$_sql3);
                    echo "<nav>
                    <ul>
                    <li><font size='+1' color='#9999ff'><a href='resu.php?search=$search&search_btn=Scrap+Search'>All</a></font></li><li><font size='+1' color='#9999ff'><a class='current' href='imagesear.php?search=$search&search_btn=GO'>Images</a></font></li><li><font size='+1' color='#9999ff'><a href='videosear.php?search=$search&search_btn=GO'>Videos</a></font></li><li><font size='+1' color='#9999ff'><a href='newssear.php?search=$search&search_btn=GO'>News</a></font></li>
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
                $results_per_page=100;
              $_sql2="select * from websid where stitle like '%".$search."%'";
                $rs2=mysqli_query($_con,$_sql2);
                $number_of_results=mysqli_num_rows($rs2);
                     $number_of_pages=ceil($number_of_results/$results_per_page);
                     if(!isset($_GET['page'])){
                     	$page=1;
                     }
                     else{
                     	$page=$_GET['page'];
                     }
                     $this_page_first_result=($page-1)*$results_per_page;
                     $_sql4="select * from websid where stitle like '%".$search."%' limit ".$this_page_first_result.",".$results_per_page;
                     $rs4=mysqli_query($_con,$_sql4);
                if(mysqli_num_rows($rs2)<1)
                                 {
                                  echo "<center><h4><b>Oops! No result found for your query</b></h4></center>";
                                  exit();
                                 }

                while($resul2=mysqli_fetch_assoc($rs4))
                {       
                	if(@getimagesize($resul2['simg']))
                	{
                	echo "<div class='gallery'>
                	          <div class='imgp'>
                                  <img src='".$resul2['simg']."' onclick='myFunction()' class='dropbtn'>
                              </div>
                              <div class='desc'>
                                  <center><div class='imgt contp1'><a href=".$resul2['slink'].">".$resul2['stitle']."</a></div>
                                  <div class='imgd contp1'>".$resul2['slink']."</div></center>
                              </div>
                          </div>";
                      }
                }
                echo "<div class='dropdown'>
                <div id='myDropdown' class='dropdown-content'>
                          <div class='imge'>
                              <a href='#'><img src='".$resul2['simg']."'></a>
                          </div></div>
                      </div>";
                echo "<br><br><div class='footer'>";      
                echo "<br><br><div class='more'>Search more</div>";
                if($_GET['page']>1){
                     	$page=$page-1;
                     	echo "<a href='imagesear.php?search=$search&search_btn=GO&page=".$page."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Previous</a>";
                     }
                     for($page=1;$page<=$number_of_pages;$page++){
                     	echo "<a href='imagesear.php?search=$search&search_btn=GO&page=".$page."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$page."</a>";
                     }
                     if(!isset($_GET['page']))
                     {
                     	$page=1;
                     	$page=$page+1;
                     	echo "<a href='imagesear.php?search=$search&search_btn=GO&page=".$page."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Next</a>";
                     }
                     else if($_GET['page']!=13){
                     	$page=$_GET['page']+1;
                     	echo "<a href='imagesear.php?search=$search&search_btn=GO&page=".$page."'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Next</a>";
                     }
                echo "</div>";
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