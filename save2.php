<?php 

//just a random name for the image file
$random2 = rand(1, 100000);

//$_POST[data][1] has the base64 encrypted binary codes. 
//convert the binary to image using file_put_contents
$savefile2 = @file_put_contents("uploads/$random2.jpg", base64_decode(explode(",", $_POST['data'])[1]));

//if the file saved properly, print the file name
if($savefile2 ){
	echo $random2 ;
}
?>