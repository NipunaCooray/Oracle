<?php
  session_start();
  if (empty($_SESSION['username'])) {
    //header('Refresh: 2; URL = login.php');
    header("Location: login.php");
  }

  include("connect.php");   
  
  $link=Connection();

 
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


 <style type="text/css">

    
    .alert{
      display: none;
    }

  
</style>


<script src="js/excanvas.min.js"></script> 

<script src="js/jquery.min.js"></script> 

<script type="text/javascript">
   $(document).ready(function() {
    

    $.get("#",function(all_defects){
      $("#defect_types").html(all_defects);
    });
  });

</script>


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
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Add plan data</a> </div>
    
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
  
    <?php include 'action_boxes.php';?>
    
<!--End-Action boxes-->    


    <hr/>
    <div class="row-fluid">

    <div class="span12">

        <div class="widget-box">
          
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Add plan data</h5>
            </div>

            <div class="widget-content nopadding">
               <form class="form-horizontal">

                   
                    
                      <div class="control-group">
                        <label class="control-label">Style number:</label>
                        <div class="controls">
                          <?php

                              $query = "SELECT * FROM `styledata` Order By  styledata.styleID ASC ";
                              $res = mysql_query($query,$link);
                              echo '<select name = "styleNumber" class="form-control" id="styleNumber" >';
                              while (($row = mysql_fetch_assoc($res)) != null)
                              { 
                                  echo '<option value = "'.$row['styleNumber'].'" ';
                                  echo ">{$row['styleNumber']}</option>";          
                              }
                              echo '</select>';

                          ?>

                        </div>
                      </div>


                  <div class="control-group">
                      <label class="control-label">Machine number:</label>
                      <div class="controls">
                        <input type="text" class="span3" placeholder="Enter machine number " id="machineNumber" name="machineNumber" />
                      </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label">Order start date:</label>
                      <div class="controls">
                        <input type="text" class="span3" placeholder="Enter order start date " id="defectname" name="defectname" />
                      </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label">Order end date:</label>
                      <div class="controls">
                        <input type="text" class="span3" placeholder="Select order end date " id="defectname" name="defectname" />
                      </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label">Planned quantity:</label>
                      <div class="controls">
                        <input type="text" class="span3" placeholder="Enter planned quantity " id="plannedQuantity" name="plannedQuantity" />
                      </div>
                  </div>


                  <div class="form-actions">
                      <button id="btnSave" type="submit" class="btn btn-success">Save plan data</button>
                      <button id="btnRefresh" type="reset" class="btn btn-success">Refresh</button>
                  </div>

                  


                </form>  

                <!-- Error message area -->

                <div class ="row-fluid">
                    <div class="span12"> 
                      <div class="widget-content">
                        <div id="success" class="alert alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
                          
                        </div>

                        <div id="noValues" class="alert alert-error"> <a class="close" data-dismiss="alert" href="#">×</a>
                          Fill all the values
                        </div>

                      </div>

 
                    </div>
                </div> 

                <div class ="row-fluid">
                    <div class="span12"> 
                      <div class="widget-content" id="#">
                        

                      </div>

 
                    </div>
                </div>    


            </div>
            
           


        </div>

    </div>
</div>
</div>
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; MAS Autonomation Group </div>
</div>

<!--end-Footer-part-->

<!-- Custom js to save data -->

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



<script type="text/javascript">

  


  $("#btnSave").click(function(event){

    event.preventDefault();
    $(".alert").hide();

    if(($("#defectid").val() != "") && ($("#defectname").val()) && ($("#userlist1").val()) && ($("#defectcountmargin1").val()) && ($("#userlist2").val()) && ($("#defectcountmargin2").val()) && ($("#userlist3").val()) && ($("#defectcountmargin3").val()) && ($("#userlist4").val()) && ($("#defectcountmargin4").val())  ){
      $.get("add_defect_types.php?defectid="+ $("#defectid").val()+"&defectname="+ $("#defectname").val() +"&userlist1="+ $("#userlist1").val() +"&defectcountmargin1="+ $("#defectcountmargin1").val() +"&userlist2="+ $("#userlist2").val() +"&defectcountmargin2="+ $("#defectcountmargin2").val()+"&userlist3="+ $("#userlist3").val()+"&defectcountmargin3="+ $("#defectcountmargin3").val()+"&userlist4="+ $("#userlist4").val()+"&defectcountmargin4="+ $("#defectcountmargin4").val(),function(data){
        //alert(data);
        

        if(data==""){
          
          //$("#fail").fadeIn();
          $("#fail").html(data).fadeIn();

        } else{
          
          //$("#success").fadeIn();
          $("#success").html(data).fadeIn();

          $.get("view_all_defect_types.php",function(all_defects){
            $("#defect_types").html(all_defects);
          });

        }
      });
    }else{
      //alert("Please enter valid city name ");
      $("#noValues").fadeIn();
    }

    
  });

  $("#btnRefresh").click(function(event){
    location.reload();

    //  $.get("view_all_defect_types.php",function(all_defects){
    //   $("#defect_types").html(all_defects);
    // });


  });

 





</script>


</body>
</html>
