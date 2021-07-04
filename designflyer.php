<?php
        session_start();
        ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Business Card HTML Setup</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <style rel="stylesheet">
      h1{
          text-align: center;
          padding: 20px 0px;
      /*    *0 means not padding on left of right*/
      }
      
      canvas{
        background-image: url(templates/<?php echo $_GET['tem']; ?>);
          background-size: cover;
          
      }
      #card1,#card2{
          width: 400px;
          height: 650px;
          border: 1px solid;
          padding: 10px;
          background-image: url(templates/<?php echo $_GET['tem']; ?>);
          background-size: cover;
      /**padding here makes the text fit box better.*/
           }
      .background{
          background: #eee;
          padding:30px;
          margin-bottom: 30px;
      }
      /*Matches the <div class="col-sm-12 col col-md-6 BACKGROUND">*/
      #CardInfo{
        position: fixed;
        height: max-content;
        width: max-content;
      }
      

    </style>


</head>
<body>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">

        </div>
      </div>
    </div>


    <div class="container-fluid">

       <!-- INPUT -->
       <div class="col-sm-12 col-md-6 background" style="height: 2000px;width:400px">

         <form id="CardInfo" class="form-horizontal" method="post" enctype="multipart/form-data">
         <div class="col-12 px-0" style="visibility: hidden" id="faces">
                                                       
                                                            <input type="radio" data-color="blue" onchange="face()" class="custom-control-input " data-default="1" data-id="1" id="1894" name="aoptions[808]" checked="checked" value="1894" data-customclass="   ">
                                                            <label class="custom-control-label" for="1894" data-original-title="Normal" data-toggle="tooltip">Front</label>
                                                        
                                                            <input type="radio" data-color="blue" onchange="face()" class="custom-control-input " data-default="0" data-id="2" id="1895" name="aoptions[808]" value="1895" data-customclass="   ">
                                                            <label class="custom-control-label" for="1895" data-original-title="Arrondis" data-toggle="tooltip">Back</label>
                                                        
                                                    </div>

           <div class="form-group">

            <label for="inputCompany" class="col-sm-3 control-label">Event name:</label>

            <div class="col-sm-9">

            <input type="text" class="form-control" id="inputCompany" onkeyUp="printCompany()">

            </div>
          </div>



          <div class="form-group">

            <label for="inputCompany" class="col-sm-3 control-label">Event date:</label>

            <div class="col-sm-9">

              <input type="text" class="form-control" id="inputMessage" onkeyup="printMessage()">

            </div>
          </div>


          


            <div class="form-group">

              <label  for="inputText" class="col-sm-3 control-label">Text Color:</label>

              <div class="col-sm-9">

                <input type="color" class="form-control" id="inputText" value="#262626" onchange="changeText()">

              </div>
            </div>

            <div class="form-group">

              <label class="col-sm-3 control-label">Text Align:</label>

                  <div class="col-sm-9">

                    <input type="button" class="btn btn-info" value="Left" id="text-left" onclick="TextAlign(this.id)">

                    <input type="button" class="btn btn-info" value="Center" id="text-center" onclick="TextAlign(this.id)">

                    <input type="button" class="btn btn-info" value="Right" id="text-right" onclick="TextAlign(this.id)">

                  </div>
                </div>


              <div class="form-group">

                <label  for="inputName" class="col-sm-3 control-label">Host:</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="inputName" onkeyup="printname()">
                </div>
              </div>

              <div class="form-group">

                <label  for="inputJob" class="col-sm-3 control-label">Event description:</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="inputJob" onkeyup="printjob()">

                </div>
              </div>

              <div class="form-group">

                <label  for="inputEmail" class="col-sm-3 control-label">Event Adresse:</label>

                <div class="col-sm-9">

                  <input type="text" class="form-control" id="inputEmail" onkeyup="printEmail()">

                </div>
              </div>

              <div class="form-group">

                <label  for="inputTel" class="col-sm-3 control-label">More info:</label>

                <div class="col-sm-9">

                  <input type="tel" class="form-control" id="inputTel" onkeyup="printTelephone()">

                </div>
              </div>

              <div class="form-group">

                <div class="col-sm-3 col-sm-offset-3">

                  <input type="button"  onclick="tran1();tran2()" value="Enregistrer">

                </div>

                <div class="col-sm-3">

                  <input type="button" onclick="formReset()" value="Reset">

                </div>
                <div class="col-sm-3 col-sm-offset-3">

                  <input type="submit" name="valider"  value="continue">

                </div>
                <?php
                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['valider']))
                {
                   valider();
                }
               function valider(){
               
                   require_once('connect.php');
                   
                    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
                    $sql = "UPDATE clienttemplate SET front='uploads/".$_COOKIE['front']."',back='uploads/".$_COOKIE['back']."',template='".$_GET['tem']."'  where Id=".$_SESSION['template']."";

                                   mysqli_query($dbc, $sql);
                                    header('Location: panier.php');
                                    ob_end_flush();
               
               }
                ?>

              </div>
           
            
        </div>

<div id="canvas1" style="display: none" ></div>
<div id="canvas2" style="display: none" ></div>

        <!-- OUTPUT SECTION-->

          <div class="col-sm-12 col-md-6" >
            
             <div id="card1">
              <h3 id="outputCompany1">Event Name</h3><br><br><br>
              <p id="outputMessage1" class="small">Event Date</p><br><br><br>
              <p id="outputName1" class="small">Host</p><br><br><br>
              <p id="outputJob1" class="small">Event Description</p><br><br><br><br><br><br>
              <p id="outputEmail1" class="small">Event Adresse</p><br><br><br><br><br><br>
              <p id="outputPhone1" class="small">More Infos</p>

            </div>
          </div>
          <div class="col-sm-12 col-md-6" >
          <br>
             <div id="card2" style="visibility: hidden">
              <h3 id="outputCompany2">Event Name</h3><br><br><br>
              <p id="outputMessage2" class="small">Event Date</p><br><br><br>
              <p id="outputName2" class="small">Host</p><br><br><br>
              <p id="outputJob2" class="small">Event Description</p><br><br><br><br><br><br>
              <p id="outputEmail2" class="small">Event Adresse</p><br><br><br><br><br><br>
              <p id="outputPhone2" class="small">More Infos</p>

            </div>
          </div>

  </div>


  </form>
    <script>
      <?php
      require_once('connect.php');
      $query = "SELECT impression FROM panierdetailes where Idcom='".$_SESSION['compte']."' and idtem=".$_SESSION['template']."";
      $r = @mysqli_query($dbc, $query);
         $row = mysqli_fetch_row($r);
         $a=$row['0'];
      if($a=='recto'){
        echo 'document.getElementById("card2").style.visibility="hidden";
        document.getElementById("faces").style.visibility="hidden";';
      }
      else{
        echo 'document.getElementById("card2").style.visibility="visible";
        document.getElementById("faces").style.visibility="visible";';
      }
      ?>
      
      var side=1
      
 function face(){
  if(document.getElementById("1894").checked){
        side=1;
    }
    else if(document.getElementById("1895").checked){
        side=2;
    }
 }
    function printCompany() {
        document.getElementById("outputCompany"+side).innerHTML = inputCompany.value;
    }
    function printMessage(){
        document.getElementById("outputMessage"+side).innerHTML = inputMessage.value;
    }
    


    function changeText(){
        var textColor = document.getElementById("inputText").value;

        document.getElementById("card"+side).style.color = textColor;  
    ////    text color is .color
    }

    function TextAlign(selected_id) {
        document.getElementById("card"+side).className = selected_id;

    }
    function printname(){
        document.getElementById("outputName"+side).innerHTML= inputName.value;
    }
    function printjob(){
        document.getElementById("outputJob"+side).innerHTML= inputJob.value;
    }
    function printEmail(){
        document.getElementById("outputEmail"+side).innerHTML= "Email: " + inputEmail.value;
    }
    function printTelephone(){
        document.getElementById("outputPhone"+side).innerHTML= "Tel: " + inputTel.value;
    }
    function formReset(){
        window.location.reload();
    }
    function tran1(){
      html2canvas([document.getElementById('card1')], {
        onrendered: function (canvas) {
        document.getElementById('canvas1').appendChild(canvas);
       var data = canvas.toDataURL('uploads/jpeg',1);
   

       save1(data)
       // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server
    }
});
    }
    function tran2(){
      html2canvas([document.getElementById('card2')], {
        onrendered: function (canvas) {
        document.getElementById('canvas2').appendChild(canvas);
       var data = canvas.toDataURL('uploads/jpeg',1);
       save2(data)
       // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server
    }
});
    }
    function save1(data){
			//ajax method.
			$.post('save1.php', {data: data}, function(res){
				//if the file saved properly, trigger a popup to the user.
            document.cookie = "front="+res+".jpg";
					
				
			});
		}
    function save2(data){
			//ajax method.
			$.post('save2.php', {data: data}, function(res){
				//if the file saved properly, trigger a popup to the user.
        document.cookie = "back="+res+".jpg";

				
			});
		}
    </script>






</body>
</html>
