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
    

    $.get("view_all_downtime_reasons.php",function(all_downtime_reasons){
      $("#all_downtimes").html(all_downtime_reasons);
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
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Add downtime reason</a> </div>
    
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
  
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="index.php"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> My Dashboard </a> </li>
        <li class="bg_lg span3"> <a href="charts.html"> <i class="icon-signal"></i> Charts</a> </li>
        <li class="bg_ly"> <a href="widgets.html"> <i class="icon-inbox"></i><span class="label label-success">101</span> Widgets </a> </li>
        <li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> Tables</a> </li>
        <li class="bg_ls"> <a href="grid.html"> <i class="icon-fullscreen"></i> Full width</a> </li>
        <li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
        <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
        <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
        <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>

      </ul>
    </div>
<!--End-Action boxes-->    


    <hr/>
    <div class="row-fluid">

    <div class="span12">

        <div class="widget-box">
          
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
              <h5>Add downtime reason</h5>
            </div>

            <div class="widget-content nopadding">
               <form class="form-horizontal" id="form1" >

                  <div class="control-group">
                      <label class="control-label">Downtime ID:</label>
                      <div class="controls">
                        <input type="text" class="span3" placeholder="Downtime ID" id="downtimeid" name="downtimeid" />
                      </div>
                  </div>

                  <div class="control-group">
                      <label class="control-label">Description:</label>
                      <div class="controls">
                        <input type="text" class="span10" placeholder="Downtime reason " id="downtimereason" name="downtimereason" />
                      </div>
                  </div>

                  
                  <div class="control-group">
                    <label class="control-label">Select downtime type:</label>
                    <div class="controls">
                     <select name="downtimetype" class="form-control" id="downtimetype">

					    <option value="Technical">Technical</option>
					    <option value="Operational">Operational</option>
					    <option value="Changeover">Changeover</option>
					    <option value="Other">Other</option>
				    
					</select>

                    </div>
                  </div>
                 

                  <div class ="row-fluid">
                    <div class="span6"> 
                      <div class="control-group">
                        <label class="control-label">Notifying user - 1:</label>
                        <div class="controls">
                          <?php

                              $query = "SELECT * FROM `notifyingusers`";
                              $res = mysql_query($query,$link);
                              echo '<select name = "userlist1" class="form-control" id="userlist1" >';
                              while (($row = mysql_fetch_assoc($res)) != null)
                              { 
                                  echo '<option value = "'.$row['notifyinguserid'].'" ';
                                  echo ">{$row['username']}</option>";          
                              }
                              echo '</select>';

                          ?>

                        </div>
                      </div>
                    </div>

                    <div class="span6"> 
                        <div class="control-group">
                            <label class="control-label">Downtime notify time :</label>
                            <div class="controls">
                              <input type="text" class="span10" placeholder="Time in minutes" id= "downtimenotifytime1" name="downtimenotifytime1" />
                            </div>
                        </div>
                    </div>

                  </div>

                  <div class ="row-fluid">
                    <div class="span6"> 
                      <div class="control-group">
                        <label class="control-label">Notifying user - 2:</label>
                        <div class="controls">
                          <?php

                              $query = "SELECT * FROM `notifyingusers`";
                              $res = mysql_query($query,$link);
                              echo '<select name = "userlist2" class="form-control" id="userlist2" >';
                              while (($row = mysql_fetch_assoc($res)) != null)
                              { 
                                  echo '<option value = "'.$row['notifyinguserid'].'" ';
                                  echo ">{$row['username']}</option>";          
                              }
                              echo '</select>';

                          ?>

                        </div>
                      </div>
                    </div>

                    <div class="span6"> 
                        <div class="control-group">
                            <label class="control-label">Downtime notify time :</label>
                            <div class="controls">
                              <input type="text" class="span10" placeholder="Time in minutes" id= "downtimenotifytime2" name="downtimenotifytime2" />
                            </div>
                        </div>
                    </div>

                  </div>

                  <div class ="row-fluid">
                    <div class="span6"> 
                      <div class="control-group">
                        <label class="control-label">Notifying user - 3:</label>
                        <div class="controls">
                          <?php

                              $query = "SELECT * FROM `notifyingusers`";
                              $res = mysql_query($query,$link);
                              echo '<select name = "userlist3" class="form-control" id="userlist3" >';
                              while (($row = mysql_fetch_assoc($res)) != null)
                              { 
                                  echo '<option value = "'.$row['notifyinguserid'].'" ';
                                  echo ">{$row['username']}</option>";          
                              }
                              echo '</select>';

                          ?>

                        </div>
                      </div>
                    </div>

                   <div class="span6"> 
                        <div class="control-group">
                            <label class="control-label">Downtime notify time :</label>
                            <div class="controls">
                              <input type="text" class="span10" placeholder="Time in minutes" id= "downtimenotifytime3" name="downtimenotifytime3" />
                            </div>
                        </div>
                    </div>

                  </div>

                  <div class ="row-fluid">
                    <div class="span6"> 
                      <div class="control-group">
                        <label class="control-label">Notifying user - 4:</label>
                        <div class="controls">
                          <?php

                              $query = "SELECT * FROM `notifyingusers`";
                              $res = mysql_query($query,$link);
                              echo '<select name = "userlist4" class="form-control" id="userlist4" >';
                              while (($row = mysql_fetch_assoc($res)) != null)
                              { 
                                  echo '<option value = "'.$row['notifyinguserid'].'" ';
                                  echo ">{$row['username']}</option>";          
                              }
                              echo '</select>';

                          ?>

                        </div>
                      </div>
                    </div>

                    <div class="span6"> 
                        <div class="control-group">
                            <label class="control-label">Downtime notify time :</label>
                            <div class="controls">
                              <input type="text" class="span10" placeholder="Time in minutes" id= "downtimenotifytime4" name="downtimenotifytime4" />
                            </div>
                        </div>
                    </div>

                  </div>

                  <div class="form-actions">
                      <button id="btnSave" type="submit" class="btn btn-success">Save new defect type</button>
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
                      <div class="widget-content" id="all_downtimes">
                        

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

	var request;

	$("#btnSave").click(function(event){

		event.preventDefault();

		// Abort any pending request
	    if (request) {
	        request.abort();
	    }

		$(".alert").hide();

		// setup some local variables
    	var $form = $("#form1");

    	
    	// Let's select and cache all the fields
    	var $inputs = $form.find("input, select, button, textarea");

    	// Serialize the data in the form
    	var serializedData = $form.serialize();

    	//alert(serializedData);

    	// Let's disable the inputs for the duration of the Ajax request.
	    // Note: we disable elements AFTER the form data has been serialized.
	    // Disabled form elements will not be serialized.
	    $inputs.prop("disabled", true);

		if(($("#downtimeid").val() != "") && ($("#downtimereason").val())  && ($("#downtimetype").val())){
			

			// Fire off the request to /form.php
		    request = $.ajax({
		        url: "add_downtime_reason.php",
		        type: "post",
		        data: serializedData
		    });

		    // Callback handler that will be called on success
		    request.done(function (response, textStatus, jqXHR){
		        // Log a message to the console
		        console.log("Hooray, it worked!");
		        $("#success").html(response).fadeIn();

		        $.get("view_all_downtime_reasons.php",function(all_downtimes){
						$("#all_downtimes").html(all_downtimes);
				});

		    });

		     // Callback handler that will be called on failure
		    request.fail(function (jqXHR, textStatus, errorThrown){
		        // Log the error to the console
		        console.error(
		            "The following error occurred: "+
		            textStatus, errorThrown
		        );
		    });

		    // Callback handler that will be called regardless
		    // if the request failed or succeeded
		    request.always(function () {
		        // Reenable the inputs
		        $inputs.prop("disabled", false);
		    });


		}else{
			//alert("Please enter valid city name ");
			$("#noValues").fadeIn();
		}

		
	});

	$("#btnRefresh").click(function(event){
		location.reload();
	});

	





</script>



</body>
</html>
