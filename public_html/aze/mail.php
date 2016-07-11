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
         //////// echo 'if(confirm("T&#601;&#351;&#601;kk&uuml;rl&#601;r. Sizin mesaj&#305;n&#305;z u&#287;urla g&ouml;nd&#601;rildi."))';
         //  echo 'window.location="http://magicbrothers.eu/aze/message_sent.html"';
         //  echo '</script>'; 

echo '<script language="javascript">';
echo 'function go() {';
echo 'location.href="http://magicbrothers.eu/aze" }';
echo 'function showMessage() {';
echo 'if(document.getElementById("showButton").value == "Mesaja bax") {';
echo 'document.getElementById("message").style.display = "block"; ';
echo 'document.getElementById("showButton").value = "Mesaji bagla"; }';
echo 'else if(document.getElementById("showButton").value == "Mesaji bagla") {';
echo 'document.getElementById("message").style.display = "none"; ';
echo 'document.getElementById("showButton").value = "Mesaja bax"; }}';
echo '</script>';

echo '<html>';
echo '<body>';
echo '<p>T&#601;&#351;&#601;kk&uuml;rl&#601;r. Sizin mesaj&#305;n&#305;z u&#287;urla g&ouml;nd&#601;rildi.</p>';
echo '<label for="back">Sayta geri qay&#305;t </label>';
echo '<input type=button onClick="go()" value="Geri"/>';
echo '<label for="show">    </label>';
echo '<input id=showButton type=button onClick="showMessage()" value="Mesaja bax"/>';
echo '<div id=message style="display:none">';
echo '<p>Kimd&#601;n: '.$name.', '.$email;
echo '</p>';
echo '<p>Kim&#601;: Magic Brothers Entertainment</p>';
echo '<p>Mövzu: '.$subject;
echo '</p>';
echo '<p>Mesaj: '.$message;
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
       //// echo 'if(confirm("Captcha-da s&#601;hvlik var. Z&#601;hm&#601;t olmazsa yenid&#601;n yoxlay&#305;n."))';
       //// echo 'history.go(-1)';
          //echo 'window.location="http://magicbrothers.eu/aze/captcha.html"';
          //echo '</script>';

echo '<script language="javascript">';
echo 'function go() {';
echo 'history.go(-1); }';
echo '</script>';

echo '<html>';
echo '<body>';
echo '<p>Captcha-da s&#601;hvlik var. Z&#601;hm&#601;t olmazsa yenid&#601;n yoxlay&#305;n.</p>';
echo '<label for="back">Sayta geri qay&#305;t </label>';
echo '<input type=button onClick="go()" value="Geri"/>';
echo '</body>';
echo '</html>';
}
?>