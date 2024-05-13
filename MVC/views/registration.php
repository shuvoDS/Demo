<?php 

$firstnameErrMsg = "";
$lastnameErrMsg = "";
$genderErrMsg = "";
$fatherNameErrMsg = "";
$motherNameErrMsg = "";
$bloodGroupErrMsg = "";
$religionErrMsg = "";
$emailErrMsg = "";
$phoneErrMsg = "";
$websiteErrMsg = "";
$countryErrMsg = "";
$stateErrMsg = "";
$addressLine1ErrMsg = "";
$postCodeErrMsg = "";
$usernameErrMsg = "";
$passwordErrMsg = "";
$confirmPasswordErrMsg = "";	

$firstname = "";
$lastname = "";
$gender = "";
$fatherName = "";
$motherName = "";
$bloodGroup = "";
$religion = "";
$email = "";
$phone = "";
$website = "";
$country = "";
$state = "";
$addressLine1 = "";
$postCode = "";
$username = "";
$password = "";
$confirmPassword = "";	

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$firstname = sanitize($_POST['firstname']);
	$lastname = sanitize($_POST['lastname']);
	$gender = isset($_POST['gender']) ? sanitize($_POST['gender']) : "";
	$fatherName = sanitize($_POST['father_name']);
	$motherName = sanitize($_POST['mother_name']);
	$bloodGroup = sanitize($_POST['blood_group']);
	$religion = sanitize($_POST['religion']);
	$email = sanitize($_POST['email']);
	$phone = sanitize($_POST['phone']);
	$website = sanitize($_POST['website']);
	$country = sanitize($_POST['country']);
	$state = sanitize($_POST['state']);
	$addressLine1 = sanitize($_POST['address_line_1']);
	$postCode = sanitize($_POST['post_code']);
	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);
	$confirmPassword = sanitize($_POST['confirm_password']);	


	if (empty($firstname)) $firstnameErrMsg = "First Name is empty";
	if (empty($lastname)) $lastnameErrMsg = "Last Name is empty";
	if (empty($gender)) $genderErrMsg = "Gender is empty";
	if (empty($fatherName)) $fatherNameErrMsg = "Father Name is empty";
	if (empty($motherName)) $motherNameErrMsg = "Mother Name is empty";
	if (empty($bloodGroup)) $bloodGroupErrMsg = "Blood Group is empty";
	if (empty($religion)) $religionErrMsg = "Religion is empty";
	if (empty($email)) $emailErrMsg = "Email is empty";
	if (empty($phone)) $phoneErrMsg = "Phone is empty";
	if (empty($website)) $websiteErrMsg = "Website is empty";
	if (empty($country)) $countryErrMsg = "Country is empty";
	if (empty($state)) $stateErrMsg = "State is empty";
	if (empty($addressLine1)) $addressLine1ErrMsg = "Address is empty";
	if (empty($postCode)) $postCodeErrMsg = "Post Code is empty";
	if (empty($username)) $usernameErrMsg = "Username is empty";
	if (empty($password)) $passwordErrMsg = "Password is empty";
	if (empty($confirmPassword)) $confirmPasswordErrMsg = "Confirm Password is empty";

	if (!empty($password) and !empty($confirmPassword)) 
		if ($password !== $confirmPassword) $confirmPasswordErrMsg = "Password and confirm password does not match";

	if (empty($firstnameErrMsg) and empty($lastnameErrMsg) and empty($genderErrMsg) and empty($fatherNameErrMsg) and empty($motherNameErrMsg) and empty($bloodGroupErrMsg) and empty($religionErrMsg) and empty($emailErrMsg) and empty($phoneErrMsg) and empty($websiteErrMsg) and empty($countryErrMsg) and empty($stateErrMsg) and empty($addressLine1ErrMsg) and empty($postCodeErrMsg) and empty($usernameErrMsg) and empty($passwordErrMsg) and empty($confirmPasswordErrMsg)) 
		header("Location: Welcome.php");
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

	<h1>Registration</h1>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" novalidate>
		<table>
			<tr>
				<td>
					<fieldset>
						<legend>General Information:</legend>
						<div>
							<table>
								<tr>
									<td>
										<table>
											<tr>
												<th>
													<label for="fname">First Name</label>
												</th>
												<td>:</td>
												<td>
													<p><input type="text" name="firstname" id="fname" value="<?php echo $firstname; ?>">
														<?php echo $firstnameErrMsg; ?></p>
												</td>
											</tr>
											<tr>
												<th>
													<label for="lname">Last Name</label>
												</th>
												<td>:</td>
												<td>
													<p><input type="text" name="lastname" id="lname" value="<?php echo $lastname; ?>">
														<?php echo $lastnameErrMsg; ?></p>
												</td>
											</tr>
											<tr>
												<th>
													<label for="male">Gender</label>
												</th>
												<td>:</td>
												<td>
													<p><input type="radio" name="gender" value="Male" id="male" <?php echo $gender == 'Male' ? 'checked' : ''; ?>><label for="male">Male</label>
														<input type="radio" name="gender" value="Female" id="female" <?php echo $gender == 'Female' ? 'checked' : ''; ?>><label for="female">Female</label>
														<?php echo $genderErrMsg; ?></p>
												</td>
											</tr>
											<tr>
												<th>
													<label for="fatherName">Father's Name</label>
												</th>
												<td>:</td>
												<td>
													<p><input type="text" name="father_name" id="fatherName" value="<?php echo $fatherName; ?>">
														<?php echo $fatherNameErrMsg; ?></p>
												</td>
											</tr>
											<tr>
												<th>
													<label for="motherName">Mother's Name</label>
												</th>
												<td>:</td>
												<td>
													<p><input type="text" name="mother_name" id="motherName" value="<?php echo $motherName; ?>">
														<?php echo $motherNameErrMsg; ?></p>
												</td>
											</tr>
											<tr>
												<th>
													<label for="bloodGroup">Blood Group</label>
												</th>
												<td>:</td>
												<td>
													<p>
														<select id="bloodGroup" name="blood_group">
															<option value="Apos" <?php echo $bloodGroup == 'Apos' ? 'selected' : ""; ?>>A+</option>
															<option value="Aneg" <?php echo $bloodGroup == 'Aneg' ? 'selected' : ""; ?>>A-</option>
															<option value="Bpos" <?php echo $bloodGroup == 'Bpos' ? 'selected' : ""; ?>>B+</option>
															<option value="Bneg" <?php echo $bloodGroup == 'Bneg' ? 'selected' : ""; ?>>B-</option>
															<option value="Opos" <?php echo $bloodGroup == 'Opos' ? 'selected' : ""; ?>>O+</option>
															<option value="Oneg" <?php echo $bloodGroup == 'Oneg' ? 'selected' : ""; ?>>O-</option>
														</select> 
														<?php echo $bloodGroupErrMsg; ?>
													</p>
												</td>
											</tr>
											<tr>
												<th>
													<label for="religion">Religion</label>
												</th>
												<td>:</td>
												<td>
													<p><select id="religion" name="religion">
															<option value="Islam" <?php echo $religion == 'Islam' ? 'selected' : ""; ?>>Islam</option>
															<option value="Hindu" <?php echo $religion == 'Hindu' ? 'selected' : ""; ?>>Hindu</option>
														</select> 
														<?php echo $religionErrMsg; ?>
													</p>
												</td>
											</tr>
										</table>
									</td>
									<td rowspan="2">
										<input type="file" name="profile_picture">
									</td>
								</tr>
							</table>
						</div>
					</fieldset>
				</td>
				<td>
					<fieldset>
						<legend>Contact Information:</legend>
						<div>
							<table>
								<tr>
									<th>
										<label for="email">Email</label>
									</th>
									<td>:</td>
									<td>
										<p><input type="email" name="email" id="email" value="<?php echo $email; ?>">
											<?php echo $emailErrMsg; ?></p>
									</td>
								</tr>
								<tr>
									<th>
										<label for="phone">Phone/Mobile</label>
									</th>
									<td>:</td>
									<td>
										<p><input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>">
											<?php echo $phoneErrMsg; ?></p>
									</td>
								</tr>

								<tr>
									<th>
										<label for="website">Website</label>
									</th>
									<td>:</td>
									<td>
										<p><input type="url" name="website" id="website" value="<?php echo $website; ?>">
											<?php echo $websiteErrMsg; ?></p>
									</td>
								</tr>

								<tr>
									<th>
										<label>Address</label>
									</th>
									<td>:</td>
									<td>
										<p>
											<fieldset>
												<legend>Present Address</legend>
												<table>
													<tr>
														<td>
															<select id="country" name="country">
															<option value="bangladesh" <?php echo $country == 'bangladesh' ? 'selected' : ""; ?>>Bangladesh</option>
															<option value="india" <?php echo $country == 'india' ? 'selected' : ""; ?>>India</option>
											
														</select> 
														<?php echo $countryErrMsg; ?>
														</td>

														<td>
															<select id="state" name="state">
															<option value="dhaka" <?php echo $state == 'dhaka' ? 'selected' : ""; ?>>Dhaka</option>
															<option value="chattagram" <?php echo $state == 'chattagram' ? 'selected' : ""; ?>>Chattagram</option>
											
														</select>
														<?php echo $stateErrMsg; ?> 
														</td>
													</tr>
													<tr>
														<td colspan="2">
														<textarea name="address_line_1" placeholder="Road/Stree/City" cols=20 rows=5 value="<?php echo $addressLine1; ?>"></textarea>
														<?php echo $addressLine1ErrMsg; ?>
														</td>
													</tr>

													<tr>
														<td colspan="2">
														<input type="text" name="post_code" placeholder="Post Code" value="<?php echo $postCode; ?>">
														<?php echo $postCodeErrMsg; ?>
														</td>
													</tr>
												</table>
											</fieldset>
										</p>
									</td>
								</tr>
							</table>
						</div>
					</fieldset>
				</td>
			
				<td>
					<fieldset>
						<legend>Account Information:</legend>
						<div>
							<table>
								<tr>
									<td>
										<table>
											<tr>
												<th>
													<label for="uname">Username</label>
												</th>
												<td>:</td>
												<td>
													<p><input type="text" name="username" id="uname" value="<?php echo $username; ?>">
														<?php echo $usernameErrMsg; ?></p>
												</td>
											</tr>
											<tr>
												<th>
													<label for="password">Password</label>
												</th>
												<td>:</td>
												<td>
													<p><input type="password" name="password" id="password" value="<?php echo $password; ?>">
														<?php echo $passwordErrMsg; ?></p>
												</td>
											</tr>
											<tr>
												<th>
													<label for="cpassword">Confirm Password</label>
												</th>
												<td>:</td>
												<td>
													<p><input type="password" name="confirm_password" id="cpassword" value="<?php echo $confirmPassword; ?>">
														<?php echo $confirmPasswordErrMsg; ?></p>
												</td>
											</tr>
									</table>
								</tr>
							</table>
						</div>
					</fieldset>
					
				</td>
				
			</tr>
			<tr>
				<td rowspan="2"><input type="submit" value="Register"></td>
			</tr>
		</table>
	</form>

</body>
</html>