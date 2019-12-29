<h1>Userdata</h1>
<?php //var_dump($profileData); 
print_r($_SESSION['userProfile']['email']);?>
<p>
	ID:  <?php echo $profileData['id']; ?>
</p>
<p>
	Email:  <?php echo $profileData['email']; ?>
</p>
<p>
	Verified Email:  <?php   echo $profileData['verified_email']; ?>
</p>
<p>
	Name:  <?php echo $profileData['name']; ?>
</p>
<p>
	Profile Picture:  <img src="<?php echo $profileData['picture']; ?>" style="width:50px; hight:50px;" />
</p>
<p>
	<a href="logout">Logout</a>
</p>