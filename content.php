<?php
session_start();
if(!isset($_SESSION["Email"])){
header("location:index.php");
}
?>
<style> 
    .div-1 {   
      background-color: #ABBAEA; 
    } 
</style> 

<?php  
include("db.php"); 
include("header.php");  
include("menu.php");    
//ambil data setting 
$setting = mysqli_query($con, "select * from setting");
while($rowSetting = mysqli_fetch_array($setting)){ 
	$Nama = $rowSetting[1]; 
	$Alamat = $rowSetting[2];   
	$Telepon = $rowSetting[3]; 
	$Email = $rowSetting[4];
	$Logo = $rowSetting["Logo"];
}  
?>      
<div id="page-wrapper" style="background-image: url(images/7953.jpg)";>   
 <div class="container-fluid">  
<?php echo "<br>"; ?>   
                <!-- Page Heading --> 
                <div class="row">   
                    <div class="col-lg-12">  
                        <h1 class="page-header"> 
                            Beranda
                        </h1>            
                    </div>          
               </div>  
                   
<div class="row">  
<div class="col-lg-3 col-md-6">  
 <div class="panel panel-green">  
   <div class="panel-heading"> 
     <div class="row">       
       <div class="col-xs-3">   
         <i class="fa fa-newspaper-o fa-5x"></i>  
       </div>                       
       <div class="col-xs-9 text-right">  
         <div class="huge">       
         <?php                    
          $x=mysqli_query($con, "select count(*) as jumlah from jenis_sertifikasi");    
          while($rx = mysqli_fetch_array($x)){                
            $total = $rx["jumlah"];        
          } 
          echo $total; 
          ?>  
         </div>  
         <div>Jenis Sertifikasi</div>   
       </div>   
      </div>   
     </div>    
     <a href="listjenis_sertifikasi.php">  
       <div class="panel-footer">  
         <span class="pull-left">View Details</span> 
         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>  
         <div class="clearfix"></div>    
       </div>                   
     </a>                  
    </div>                      
   </div>                     
<div class="col-lg-3 col-md-6">  
 <div class="panel panel-red">  
   <div class="panel-heading"> 
     <div class="row">       
       <div class="col-xs-3">   
         <i class="fa fa-history fa-5x"></i>  
       </div>                       
       <div class="col-xs-9 text-right">  
         <div class="huge">       
         <?php                    
          $x=mysqli_query($con, "select count(*) as jumlah from logtw");    
          while($rx = mysqli_fetch_array($x)){                
            $total = $rx["jumlah"];        
          } 
          echo $total; 
          ?>  
         </div>  
         <div>History</div>   
       </div>   
      </div>   
     </div>    
     <a href="listlogtw.php">  
       <div class="panel-footer">  
         <span class="pull-left">View Details</span> 
         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>  
         <div class="clearfix"></div>    
       </div>                   
     </a>                  
    </div>                      
   </div>                     
<div class="col-lg-3 col-md-6">  
 <div class="panel panel-yellow">  
   <div class="panel-heading"> 
     <div class="row">       
       <div class="col-xs-3">   
         <i class="fa fa-user fa-5x"></i>  
       </div>                       
       <div class="col-xs-9 text-right">  
         <div class="huge">       
         <?php                    
          $x=mysqli_query($con, "select count(*) as jumlah from mahasiswa");    
          while($rx = mysqli_fetch_array($x)){                
            $total = $rx["jumlah"];        
          } 
          echo $total; 
          ?>  
         </div>  
         <div>Mahasiswa</div>   
       </div>   
      </div>   
     </div>    
     <a href="listmahasiswa.php">  
       <div class="panel-footer">  
         <span class="pull-left">View Details</span> 
         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>  
         <div class="clearfix"></div>    
       </div>                   
     </a>                  
    </div>                      
   </div>                     
<div class="col-lg-3 col-md-6">  
 <div class="panel panel-primary">  
   <div class="panel-heading"> 
     <div class="row">       
       <div class="col-xs-3">   
         <i class="fa fa-graduation-cap fa-5x"></i>  
       </div>                       
       <div class="col-xs-9 text-right">  
         <div class="huge">       
         <?php                    
          $x=mysqli_query($con, "select count(*) as jumlah from program_studi");    
          while($rx = mysqli_fetch_array($x)){                
            $total = $rx["jumlah"];        
          } 
          echo $total; 
          ?>  
         </div>  
         <div>Program Studi</div>   
       </div>   
      </div>   
     </div>    
     <a href="listprogram_studi.php">  
       <div class="panel-footer">  
         <span class="pull-left">View Details</span> 
         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>  
         <div class="clearfix"></div>    
       </div>                   
     </a>                  
    </div>                      
   </div>                     
<div class="col-lg-3 col-md-6">  
 <div class="panel panel-success">  
   <div class="panel-heading"> 
     <div class="row">       
       <div class="col-xs-3">   
         <i class="fa fa-archive fa-5x"></i>  
       </div>                       
       <div class="col-xs-9 text-right">  
         <div class="huge">       
         <?php                    
          $x=mysqli_query($con, "select count(*) as jumlah from sertifikasi");    
          while($rx = mysqli_fetch_array($x)){                
            $total = $rx["jumlah"];        
          } 
          echo $total; 
          ?>  
         </div>  
         <div>Sertifikasi</div>   
       </div>   
      </div>   
     </div>    
     <a href="listsertifikasi.php">  
       <div class="panel-footer">  
         <span class="pull-left">View Details</span> 
         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>  
         <div class="clearfix"></div>    
       </div>                   
     </a>                  
    </div>                      
   </div>                     
<div class="col-lg-3 col-md-6">  
 <div class="panel panel-info">  
   <div class="panel-heading"> 
     <div class="row">       
       <div class="col-xs-3">   
         <i class="fa fa-cog fa-5x"></i>  
       </div>                       
       <div class="col-xs-9 text-right">  
         <div class="huge">       
         <?php                    
          $x=mysqli_query($con, "select count(*) as jumlah from setting");    
          while($rx = mysqli_fetch_array($x)){                
            $total = $rx["jumlah"];        
          } 
          echo $total; 
          ?>  
         </div>  
         <div>Setting</div>   
       </div>   
      </div>   
     </div>    
     <a href="listsetting.php">  
       <div class="panel-footer">  
         <span class="pull-left">View details</span> 
         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>  
         <div class="clearfix"></div>    
       </div>                   
     </a>                  
    </div>                      
   </div>                     
           <!-- /.container-fluid -->   
</div>      
 
<?php   
include("chart.php");  
echo "<hr>";   
?> 
 
<?php   
include("footer.php");  
?>        
