<?PHP
$errors = '';
$myemail = 'brandonhung343@gmail.com';
if (empty($_POST['name']) ||
	empty($_POST['email']) ||
	empty($_POST['subject']) ||
	empty($_POST['message']))
{
	$errors .= "\n Error: all fields must be filled out";
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if (empty($errors))
{
	$headers = "From: $myemail\n";
	$headers .= "Reply-To: $email_address";

	mail($myemail, $subject, $message, $headers);
	header('Location: contactThanks.html');
}

# credits to https://html.form.guide/contact-form/php-email-contact-form.html
?>