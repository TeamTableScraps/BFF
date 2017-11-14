<?php 

require_once('header.php');

echo '
    
	<div id="vendors" class="container-fluid">
        
		<h2>Registered Vendors</h2>
        
		<table>
        
		<tr>
            
			<th>Name</th>
            
			<th>Vendor Type</th>
            
			<th>Number of Year Participating</th>
            
			<th>Email</th>
            
			<th>Phone Number</th>
        
		</tr>
       
		<tr>
            
			<!--Fill from database-->
        
		</tr>
        
		</table>
    
	</div>
    
    
	
	<div id="sponsors" class="container-fluid bg-fade">
        
		<h2>Registered Sponsors</h2>
        
		<table>
        
		<tr>
            
			<th>Name</th>
            
			<th>Sponsorship Level</th>
            
			<th>Number of Year Participating</th>
            
			<th>Email</th>
            
			<th>Phone Number</th>
        
		</tr>
        
		<tr>
            
			<!--Fill from database-->
        
		</tr>
        
		</table>
    
	</div>
    
    
	
	<div id="password_change" class="container-fluid">
        
		<h2>Change Password</h2>
        
		<form action="" method="post">
        
			Current Password: <br>
        
			<input name="currentpassword" type="text"><br>
        
			New Password: <br>
			<input name="newpassword" type="password"><br>
        
			Reenter New Password: <br>
        
			<input name="newpassword2> type="password"><br>
        
			<input type="submit" value="Change Password">
        
		</form>
    
	</div>
';

require_once('footer.php');

?>