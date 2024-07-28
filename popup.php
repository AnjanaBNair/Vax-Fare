  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>


<!-- Modal popup box -->
<div class="container">
<div id="mpopupBox" class="mpopup">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2 class='bx bxs-user'> &nbsp Update Profile</h2>
        </div>
        <div class="modal-body">
    <div class="content">
      <div class="right-side">
      <form id="form" method="post">
	  <div>
	     <div class="input-box">
          <input type="text"  name="fname" id="p1" value=" <?php echo $row['fname'] ; ?> " required/>
		  <p id="error1"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name </p><br>
        </div>
		  <div class="input-box">
          <input type="text" value=" <?php echo $row['lname'] ; ?> "  name="lname" id="p2" required/>
		  <p id="error2"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name </p><br>
        </div>
	  		<div class="input-box">
          <input type="email" value=" <?php echo $row1['username'] ; ?> "  name="mail" id="p3" required/>
		  <p id="error3"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Email </p><br>
        </div>
			<div class="input-box">
          <input type="text" value=" <?php echo $row['mobileno'] ; ?> "  name="mob" id="p4" required/>
		  <p id="error4"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Mobile Number</p><br>
        </div> 
		
		  <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
		</div>
	  </form>
        </div>
        
    </div>
</div>
</div>
<script>
// Select modal
var mpopup = document.getElementById('mpopupBox');

// Select trigger link
var mpLink = document.getElementById("mpopupLink");

// Select close action element
var close = document.getElementsByClassName("close")[0];

// Open modal once the link is clicked
mpLink.onclick = function() {
    mpopup.style.display = "block";
};

// Close modal once close element is clicked
close.onclick = function() {
    mpopup.style.display = "none";
};

// Close modal when user clicks outside of the modal box
window.onclick = function(event) {
    if (event.target == mpopup) {
        mpopup.style.display = "none";
    }
};
</script>













<script>
// Select modal
var mpopup = document.getElementById('mpopupBox');

// Select trigger link
var mpLink = document.getElementById("mpopupLink");

// Select close action element
var close = document.getElementsByClassName("close")[0];

// Open modal once the link is clicked
mpLink.onclick = function() {
    mpopup.style.display = "block";
};

// Close modal once close element is clicked
close.onclick = function() {
    mpopup.style.display = "none";
};

// Close modal when user clicks outside of the modal box
window.onclick = function(event) {
    if (event.target == mpopup) {
        mpopup.style.display = "none";
    }
};
$(document).ready(function(){	
	$("#form").submit(function(event){
		submitForm();
		return false;
	});
});
</script>
</body>
</html>
<?php
if(isset($_POST["sub"]))
	{
		$fna=$_POST["fname"];
		$lna=$_POST["lname"];
		$ma=$_POST["mail"];
		$mb=$_POST["mob"];
				
		$con=mysqli_connect("localhost","root","","vax_fare");
		$q="update tbl_user set fname='$fna',lname='$lna',mobileno='$mb' where lid='$lid'";
		$res=mysqli_query($con,$q);
		$q1="update tbl_login set username='$ma' where id='$lid'";
		$res1=mysqli_query($con,$q1);
		
			 if($res)
			 {
				 ?>
				   <script>
				      alert('Profile Updated Successfully');
					</script> <?php
			 }
			header('Location: demo.php');
		}
		mysqli_close($con);
	}  
	?>


  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>


<!-- Modal popup box -->
<div class="container">
<div id="mpopupBox" class="mpopup">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2 class='bx bxs-user'> &nbsp Update Profile</h2>
        </div>
        <div class="modal-body">
    <div class="content">
      <div class="right-side">
      <form id="form" method="post">
	  <div>
	     <div class="input-box">
          <input type="text"  name="fname" id="p1" value=" <?php echo $row['fname'] ; ?> " required/>
		  <p id="error1"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name </p><br>
        </div>
		  <div class="input-box">
          <input type="text" value=" <?php echo $row['lname'] ; ?> "  name="lname" id="p2" required/>
		  <p id="error2"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Name </p><br>
        </div>
	  		<div class="input-box">
          <input type="email" value=" <?php echo $row1['username'] ; ?> "  name="mail" id="p3" required/>
		  <p id="error3"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Email </p><br>
        </div>
			<div class="input-box">
          <input type="text" value=" <?php echo $row['mobileno'] ; ?> "  name="mob" id="p4" required/>
		  <p id="error4"><b style='font-family:cursive; font-size:12px; color:red;'> &nbsp;&nbsp;Enter Valid Mobile Number</p><br>
        </div> 
		
		  <div>
            <button name="sub" type="button" class="btn btn-primary">Save changes</button>
        </div>
		</div>
	  </form>
        </div>
        
    </div>
</div>
</div>
