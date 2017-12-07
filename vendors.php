<?php
require_once("header.php");

echo '
    
	<div id="vendors" class="container-fluid bg-fade">
        
		<h2>Registered Vendors</h2>
        
		<table class="defaultbg fullwidth">
        
		<tr>
            
			<th class="info_table">Name</th>
			
			<th class="info_table">Booth</th>
			
			<th class="info_table">Description</th>
            
			<th class="info_table">Email</th>
            
			<th class="info_table">Phone Number</th>
			
			<th class="info_table">Website</th>
        
		</tr>    
';



echo'        
        
		</table>
    
	</div>';

echo "<div align='center' style='margin: 30px;'><img id='map' src='Images/Venue%20Map.jpg' style='max-width: 800px;'></div>";

require_once("footer.php");
?>