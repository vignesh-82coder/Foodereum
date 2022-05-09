<?php 
SESSION_START(); 
include_once 'config/Database.php';
include_once 'class/Notification.php';
include_once 'class/User.php';
$database = new Database();
$db = $database->getConnection();
$notification = new Notification($db);
$user = new User($db);
include('inc/container.php');
?>

<style>
    .borderless tr td {
        border: none !important;
        padding: 2px !important;
    }
</style>
<div class="container">
    <br>
    <center>
      <div class="customalert">
          <div class="alertcontent"><i><b>Notifications</b></i>
              <div id="alertText"> &nbsp </div>
              <img id="qrious">
              <div id="bottomText" style="margin-top: 10px; margin-bottom: 15px;"> &nbsp </div>
              <button id="closebutton" class="formbtn"> OK </button>
          </div>
      </div>
  </center>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <h3 class="text-center">Add Notification</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table class="table table-hover table-dark rounded table-borderless">
                    <tr>
                        <td><b>Sender</b></td>
                        <td><input type="text" class="form-control" name="sender" value=<?php echo
                                $_SESSION['username']; ?> readonly></td>
                    </tr>
                    <tr>
                        <td><b>Title</b></td>
                        <td><input type="text" name="title" class="form-control" required></td>
                    </tr>
                    <tr>
                        <td><b>Message</b></td>
                        <td><textarea name="message" cols="50" rows="4" class="form-control" required></textarea></td>
                    </tr>
                    <tr>
                        <td><b>Broadcast Time</b></td>
                        <td><select name="ntime" class="form-control">
                                <option>Now</option>
                            </select> </td>
                    </tr>
                    <tr>
                        <td><b>For</b></td>
                        <td><select name="user" class="form-control">
                                <?php 		
						$allUser = $user->listAll(); 							
						while ($user = $allUser->fetch_assoc()) { 	
						?>
                                <option value="<?php echo $user['username'] ?>">
                                    <?php echo $user['username'] ?>
                                </option>
                                <?php } ?>
                            </select></td>
                    </tr>
                    
                    <tr>
                        <td colspan=1></td>
                        <td><button  name="submit" type="submit" class="searchBtn"><b>Send Message</b></button></td>
                    </tr>
                </table> 
                <table>
                    <tr>
                        <td><select style="display: none;" name="loops" class="form-control">
                                <?php 
							for ($i=1; $i<=6 ; $i++) { ?>
                                <option value="<?php echo $i ?>">
                                    <?php echo $i ?>
                                </option>
                                <?php } ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td><select style="display: none;" name="loop_every" class="form-control">
                                <?php 
						for ($i=1; $i<=60 ; $i++) { ?>
                                <option value="<?php echo $i ?>">
                                    <?php echo $i ?>
                                </option>
                                <?php } ?>
                            </select> </td>
                    </tr>
                </table>
            </form>
            <br>
        </div>
    </div>
    <?php 
	if (isset($_POST['submit'])) { 
		if(isset($_POST['message']) and isset($_POST['ntime']) and isset($_POST['loops']) and isset($_POST['loop_every']) and isset($_POST['user']) and isset($_POST['sender'])) {
			$notification->title = $_POST['title'];
			$notification->message = $_POST['message'];
			date_default_timezone_set("Asia/Calcutta");
			$notification->ntime = date('Y-m-d H:i:s'); 
			$notification->repeat = $_POST['loops']; 
			$notification->nloop = $_POST['loop_every']; 
			$notification->username = $_POST['user'];
			$notification->sender = $_POST['sender'];

			if($notification->saveNotification()) {
				echo '* save new notification success';
			} else {
				echo 'error save data';
			}
		} else {
			echo '* completed the parameter above';
		}
	} 
	?>
    <br>
    <h3><b>Recorded Notifications:</b></h3>
    <table class="table table-hover table-dark rounded table-borderless">
        <thead>
            <tr>
                <th>No</th>
                <th>Sender</th>
                <th>Title</th>
                <th>Message</th>
                <th>Receiver</th>
                <th>Timestamp</th>

            </tr>
        </thead>
        <tbody>
            <?php $notificationCount =1; 
			$notificationList = $notification->listNotification(); 			
			while ($notif = $notificationList->fetch_assoc()) { 	
			?>
            <tr>
                <td>
                    <?php echo $notificationCount ?>
                </td>
                <td>
                    <?php echo $notif['sender']; ?>
                </td>
                <td>
                    <?php echo $notif['title'] ?>
                </td>
                <td>
                    <?php echo $notif['message'] ?>
                </td>
                <td>
                    <?php echo $notif['username'] ?>
                </td>
                <td>
                    <?php echo $notif['publish_date'] ?>
                </td>
            </tr>
            <?php $notificationCount++; } ?>
        </tbody>
    </table>
    <br>
</div>
<script>
    
    $("#closebutton").on("click", function(){
        $(".customalert").hide("fast","linear");
    });
     function showAlert(message){
      $("#alertText").html(message);
      $("#qrious").hide();
      $("#bottomText").hide();
      $(".customalert").show("fast","linear");
    }
    $("#aboutbtn").on("click", function(){
      showAlert("Once the food products are sanctioned the details has to be notified to users. This feature allow users to communicate with one another and helps to capture a user's attention with a brief alert. It also records all messages with Timestamps and makes them available for everyone to see whenever necessary, additionally this feature acts a feedback system which can be used to rise any issues and can be addressed to anyone in the network.");
  });
    </script>
