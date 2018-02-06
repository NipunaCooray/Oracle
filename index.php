<?php
  session_start();
  if (empty($_SESSION['username'])) {
    //header('Refresh: 2; URL = login.php');
    header("Location: login.php");
  }

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>KODAMS</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



<script src="js/excanvas.min.js"></script> 

<script src="js/jquery.min.js"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {

   

    $.get("view_all_defects.php",function(all_defects){
      $("#all_defects").html(all_defects);
    });

    $.get("view_all_downtimes.php",function(all_downtimes){
      $("#all_downtimes").html(all_downtimes);
    });

     $.get("view_piece_status_under_machine.php",function(all_defects){
      $("#all_records_under_machine").html(all_defects);
    });

    $.get("view_common_defects_of_active_styles.php",function(common_defects){
      $("#common_defects").html(common_defects);
    });

  });

</script>

<!-- Charts js scripts are included below -->

<script src="charts/knittedToPlannedRatio.js"></script>

<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 



<script type="text/javascript">



</script>


</head>
<body>


<?php include 'nav.php';?>

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->


 <div class="container-fluid">

 <!--Action boxes-->
    
     <?php include 'action_boxes.php';?>
<!--End-Action boxes-->    

<!--Defect data-->    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Latest piece out information of styles</h5>
        </div>
        <div class="widget-content" >
          
             <div class="widget-content" id="all_defects">
                        

             </div>
          
        </div>
      </div>
    </div>
<!--End-Defect data--> 

<!--Chart data-->    
    <div class="row-fluid">

    <div class="span6">
        <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5> Active plans' good,rework,reject ratio</h5>
        </div>
        <div class="widget-content" >
                        
              <canvas  id="myChart" width="400" height="400"></canvas>

        </div>
      </div>


    </div>

    <div class="span6">
        <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5> Most common defect under active styles</h5>
        </div>
        <div class="widget-content" >
                        
          <div class="row-fluid" id="common_defects" >

          </div>

        </div>
      </div>


    </div>



    </div>
<!--End-Chart data-->  



<!--Defect data-->    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Latest piece out data under plan ongoing machines</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid" id="all_records_under_machine" >
      
      
          </div>
             
          
        </div>
      </div>
    </div>


<!--End-Defect data--> 


    
<!--Downtime data-->    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5> Downtime data</h5>
        </div>
        <div class="widget-content" >
          
            <div class="widget-content" id="all_downtimes">
                        

             </div>
          
        </div>
      </div>
    </div>
<!--End-Downtime data-->  

  </div>


</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; MAS Autonomation Group </div>
</div>

<!--end-Footer-part-->



<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}




</script>
</body>
</html>
