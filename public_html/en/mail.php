<?php

//	if (isset($_POST["submit"])) {

    if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){

     /*   if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }

        if(!$captcha){
          echo '<script language="javascript">';
          echo 'if(confirm("Captcha failed."))';
          echo 'history.go(-1)';
          echo '</script>'; 
          history.go(-1);
        }
      */

                $url = 'https://www.google.com/recaptcha/api/siteverify';
                $privatekey = '6LePrCQTAAAAAM_w9nisFX-JWmos-zBzBErOL1fA';
                $ip = $_SERVER['REMOTE_ADDR'];

             // $response = file_get_contents($url."?secret=".$privatekey."&repsonse=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
                $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$privatekey."&response=".$captcha."&remoteip=".$ip);
                
             // $data = json_decode($response);

		$name = $_POST['name'];
		$email = $_POST['mail'];
                $subject = $_POST['subject'];		
                $message = $_POST['message'];	
		$from = 'Visitor'; 
		$to = 'aaliyev13@yahoo.com'; 
		$body = "From: $name\n E-Mail: $email\n Subject: $subject\n Message:\n $message";
 
             // var_dump($response);        

//if(isset($data->succes) AND $data->success==true) {

if($response.succes==true) {

	if (mail ($to, $subject, $body, $from)) {
         //  echo '<script language="javascript">';
         //////// echo 'if(confirm("Thank you. Your message was successfully sent."))';
         //  echo 'window.location="http://magicbrothers.eu/en/message_sent.html"';
         //  echo '</script>'; 

echo '<script language="javascript">';
echo 'function go() {';
echo 'location.href="http://magicbrothers.eu" }';
echo 'function showMessage() {';
echo 'if(document.getElementById("showButton").value == "Show message") {';
echo 'document.getElementById("message").style.display = "block"; ';
echo 'document.getElementById("showButton").value = "Hide message"; }';
echo 'else if(document.getElementById("showButton").value == "Hide message") {';
echo 'document.getElementById("message").style.display = "none"; ';
echo 'document.getElementById("showButton").value = "Show message"; }}';
echo '</script>';

echo '<html>';
echo '<body>';
echo '<p>Thank you. Your message was succesfully sent.</p>';
echo '<label for="back">Go back to site </label>';
echo '<input type=button onClick="go()" value="Back"/>';
echo '<label for="show">    </label>';
echo '<input id=showButton type=button onClick="showMessage()" value="Show message"/>';
echo '<div id=message style="display:none">';
echo '<p>From: '.$name.', '.$email;
echo '</p>';
echo '<p>To: Magic Brothers Entertainment</p>';
echo '<p>Subject: '.$subject;
echo '</p>';
echo '<p>Message: '.$message;
echo '</p>';
echo '</div>';
echo '</body>';
echo '</html>';   
        }

} else {  
          echo '<script language="javascript">';
       // echo 'if(confirm("We do not like spammers here."))';
          echo 'window.location="http://www.google.com"';
          echo '</script>';  
       }
} else {
          //echo '<script language="javascript">';
       //// echo 'if(confirm("Captcha failed. Please try again."))';
       //// echo 'history.go(-1)';
          //echo 'window.location="http://magicbrothers.eu/en/captcha.html"';
          //echo '</script>';

echo '<script language="javascript">';
echo 'function go() {';
echo 'history.go(-1); }';
echo '</script>';

echo '<html>';
echo '<body>';
echo '<p>Captcha failed. Please try again.</p>';
echo '<label for="back">Go back to site </label>';
echo '<input type=button onClick="go()" value="Back"/>';
echo '</body>';
echo '</html>';
}
?>