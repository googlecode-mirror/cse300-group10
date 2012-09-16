<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<?php foreach($css as $cssfile):?>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/css/".$cssfile);?>"/>
	<?php endforeach; ?>
	<title>Hostel Allocation - Backend</title>
</head>
<body>

<div class="admin-container">
	<div class="admin-topbar"> <?php echo $top_menu?> </div>
	<div class="admin-contentbar">
	
	<!--USING HELPER TO generate a FORM and passing "Admin/modify" as action, with Current, New
		and Confirm New PASSWORD PLUS CHANGE PASSWORD BUTTON as form elements aka $form_elem-->
	<div >
			<?php echo generate_form('Admin/pass_change', $form_elem);?>
		</div>
	
	
	<!--
	<form action=# method="post">
	Current Password: <input type="password" name="current_password"  /> <br /> <br />
	New Password: <input type="password" name="new_password" /> <br /> <br />
	Confirm New Password: <input type="password" name="confirm_new_password" /><br /><br />
	<input type="submit" value="Change Password" />
	</form>
	-->	
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
	</div>
</div>
</body>
</html>