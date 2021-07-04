<?php
        session_start();
        ob_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins|Roboto|Oswald|Arial|Lobster|Pacifico|Satisfy|Bangers|Audiowide|Sacramento' rel='stylesheet' type='text/css'>
    <script src="lib/jquery-3.4.1.min.js"></script>
    <script src="lib/fabric.min.js"></script>
    <script src="lib/fabric.js"></script>
    <script src="lib/three.js"></script>
    <script src="lib/jscolor.js"></script>
    <script src="lib/FileSaver.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <script src="javascript/js.js"></script>
    
</head>
<body >
  
  <div id="god" style="z-index: 2">
    <div id="menu" onclick="fn1()" >
    <label style="color:yellow">!!!!Enregistrer avant continuer</label>
    <form  method="post" enctype="multipart/form-data">

        <button id="themes" type="button"   onclick="show_tem()">
            <img src="stock/Templates.png" style="width: auto;">
        </button>
          <button id="shapes" type="button" class="btn btn-default" onclick="show_shape()">
            <img src="stock/shapes.png" >
          </button>
          <button id="add-text" type="button" class="btn btn-default" onclick="show_text()">
            <img src="stock/text.png" >
        </button>
          <button id="images" type="button"  onclick="show_img()">
            <img src="stock/image.png" style="width: auto;">
          </button>
         
          <button id="clear" type="button" class="btn btn-default" onclick="Del_All()">
            <img src="stock/delete.png" >
          </button>
          <button id="draw" type="button" class="btn btn-default" onclick="FreeDraw()">
            <img src="stock/draw.png" >
          </button>
         <!-- <button id="preview" type="button" class="btn btn-default" onclick="Render()">
            <img src="stock/preview.png" style="width: auto;" >
          </button>-->
          <button  type="button" name="save" class="btn btn-default" onclick="tran1();tran2()">
            <img src="stock/save.png" >
          </button> <br>
          <button  type="submit" name="continues" class="btn btn-default" style="color: white;">
            Continue 
          </button>
        
          <?php
                if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['continues']))
                {
                    continues();
                }
               function continues(){
               
                   require_once('connect.php');
                   
                    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            
                    $sql = "UPDATE clienttemplate SET front='uploads/".$_COOKIE['front']."',back='uploads/".$_COOKIE['back']."'  where Id=".$_SESSION['template']."";

                                   mysqli_query($dbc, $sql);
                                    header('Location: panier.php');
                                    ob_end_flush();
               
               }
                ?>
         <input type="button" id="back"  value="Front"  style="display: none;"><br>
          <label class="switch" id="recto">
            <input type="checkbox" value="on" id="check" >
            <span class="slider" onclick="switchb()"></span>
          </label>
         
    </div>
            </form>
    <div id="choose">

    <div id="Templates" style="display: none;"> 
        <img src="stock/onesided/YourFileName.jpg" onclick="black()">
   
        <img src="stock/onesided/YourFileName (1).jpg" onclick="grey()" >
      
        <img src="stock/onesided/YourFileName (2).jpg"  onclick="red()" >
   
        <img src="stock/onesided/YourFileName (3).jpg" onclick="blue()" >
      
        <img src="stock/onesided/YourFileName (4).jpg" onclick="green()" >
      
        <img src="stock/onesided/YourFileName (5).jpg"  onclick="purple()" >
      CD1:
          <img src="stock/onesided/CD1/YourFileName.jpg" onclick="tem1()" >
          CD2:
          <img src="stock/onesided/CD2/YourFileName.jpg" onclick="tem2()" >
          CD3:
        
          <img src="stock/onesided/CD3/YourFileName.jpg" onclick="tem3()">
         
          CD4:
          <img src="stock/onesided/CD4/YourFileName.jpg"  onclick="tem4()">
          CD5:
          <img src="stock/onesided/CD5/YourFileName.jpg"  onclick="tem5()">
      </div>
    <div id="Shapes" style="display: none;">
            <img src="stock/images/YourFileName.jpg" onclick="AddCircle()" >
            <img src="stock/images/YourFileName (1).jpg" onclick="AddLine()" >
            <img src="stock/images/YourFileName (2).jpg" onclick="AddPoly()">
            <img src="stock/images/YourFileName (3).jpg" onclick="AddRect()">
            <img src="stock/images/YourFileName (4).jpg" onclick="AddTriangle()">
         
    </div>
    <div id="Text" style="display: none;">
      Text : <input type="text" id="text" value="text"> 
        FontSize : <input type="text" id="fontsize" value="24"><br/>
        Color :  <input class="jscolor" value="ab2567" id="textcolor"><br>
        Font : <select name="Fonts" id="font" >
         <option value="oswald">Oswald</option>
          <option value="pacifico">Pacifico</option>
           <option value="poppins">Poppins</option>
           <option value="roboto">Roboto</option>
           <option value="arial">Arial</option>
           <option value="satisfy">Satisfy</option>
           <option value="bangers">Bangers</option>
           <option value="audiowide">Audiowide</option>
           <option value="sacramento">Sacramento</option>
           </select><br>
           <input type="button" value="OK" onclick="AddText()">
    </div>
    <div id="Images" style="display: none;">
        <input type="file" name="fileToUpload" id="file"   >

    </div>
    

</div>

</div>
<div id="can1" style="width: 50%;z-index:-1">
<canvas id="canvas1" height=<?php echo$_GET['a'];?> width=<?php echo$_GET['b'];?> style="border: solid;border-color: aqua;margin-top: 130px;border-radius:<?php echo$_GET['c'];?>px" ></canvas>
</div>
<div id="can2">
<canvas id="canvas2"height=<?php echo$_GET['a'];?> width=<?php echo$_GET['b'];?>  style="border: solid;border-color: red;display: inline;margin-top: 130px;border-radius:<?php echo$_GET['c'];?>px"></canvas>
</div>
    <div id="Preview" style="width: 40%;height: 60%;position: fixed;top: 20%;right: 25%;">
      <button id="clear" type="button" class="btn btn-default" style="position: absolute;right: -20%;background-color: red;color: white;z-index: 100;" onclick="exit()">
           X
      </button>
      <center>
<canvas id="render" ></canvas></center>
    </div>
    <div id="Att" style="z-index:1;position: fixed;top: 30%;right: 0%;width: min-content;border-bottom:solid;border-bottom-style:ridge;border-bottom-width: 4px;border-bottom-color: rgb(255, 255, 255);border-radius: 20px;">
      <input type="button" value="<" id="slip" style="width: min-content;color: white;background-color: #05386b;border-color: #05386b;border-width: 8px;font-size : 20px;" onclick="slipmenu()">
      <menu id="all_att"  style="display: none;">
        FillColor <input class="jscolor" value="#000000" id="color">
    Border: <li>  Width <input type="text" value="0" id="sw">   Color <input class="jscolor" value="#000000" id="scolor"></li>
    <input type="button" value="Remove Obj" onclick="del()"><br>
    <input type="button" value="Ok" id="Send" onclick="ok()">
        </menu>
        
    </div>
    <script>
    document.getElementById("back").style.color="aqua";
    //include canvas
   var  canvas1 = new fabric.Canvas('canvas1');
   var  canvas2 = new fabric.Canvas('canvas2');
   var canvas=canvas1;
   var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'white',
  width: 2000,
  height: 2000
});
canvas1.sendToBack(rect);
canvas2.sendToBack(rect);
   //switch between back and front
   var count=0;
 function switchb(){
   count=count+1;
if(count%2!=0){
    canvas=canvas2;
    document.getElementById("can2").style.display="inline";
    document.getElementById("can1").style.display="none";
    document.getElementById("back").style.color="red";
    document.getElementById("back").value="Back";
}
else {
    canvas=canvas1;
    document.getElementById("can1").style.display="inline";
    document.getElementById("can2").style.display="none";
    document.getElementById("back").style.color="aqua";
    document.getElementById("back").value="Front";
}
 }
 var r=0;
 function slipmenu(){
   r=r+1;
   if(r%2!=0){
     document.getElementById("all_att").style.display="inline";
     document.getElementById("slip").style.transform="rotate(180deg)";
   }
   else{
    document.getElementById("all_att").style.display="none";
    document.getElementById("slip").style.transform="rotate(0deg)";
   }

 }
 //Templatares
 function black(){
   canvas.clear();
  var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'black',
  width: 2000,
  height: 2000
});
canvas1.sendToBack(rect);
canvas2.sendToBack(rect);
 }
 function grey(){
   canvas.clear();
  var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'grey',
  width: 2000,
  height: 2000
});
canvas1.sendToBack(rect);
canvas2.sendToBack(rect);
 }
 function red(){
   canvas.clear();
  var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'red',
  width: 2000,
  height: 2000
});
canvas1.sendToBack(rect);
canvas2.sendToBack(rect);
 }
 function blue(){
   canvas.clear();
  var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'blue',
  width: 2000,
  height: 2000
});
canvas1.sendToBack(rect);
canvas2.sendToBack(rect);
 }
 function green(){
   canvas.clear();
  var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'green',
  width: 2000,
  height: 2000
});
canvas1.sendToBack(rect);
canvas2.sendToBack(rect);
 }
 function purple(){
   canvas.clear();
  var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'purple',
  width: 2000,
  height: 2000
});
canvas1.sendToBack(rect);
canvas2.sendToBack(rect);
 }
 function tem1(){
  canvas.clear();
  fabric.Image.fromURL('stock/onesided/CD1/a.jpg', function(img) {


img.left=0;
img.top=0;
img.scaleToWidth(500);
img.scaleToHeight(500);
canvas.sendToBack(img);
});
}
function tem2(){
  canvas.clear();
  fabric.Image.fromURL('stock/onesided/CD2/a.jpg', function(img) {


img.left=100;
img.top=0;

img.scaleToWidth(500);
img.scaleToHeight(500);
canvas.sendToBack(img);
});
}
function tem3(){
  canvas.clear();
  fabric.Image.fromURL('stock/onesided/CD3/a.jpg', function(img) {


img.left=0;
img.top=0;
width=360;
img.scaleToWidth(500);
img.scaleToHeight(500);
canvas.sendToBack(img);
});
}
function tem4(){
  canvas.clear();
  fabric.Image.fromURL('stock/onesided/CD4/a.jpg', function(img) {


img.left=-200;
img.top=0;
width=360;
img.scaleToWidth(500);
img.scaleToHeight(500);
canvas.sendToBack(img);
});
}
function tem5(){
  canvas.clear();
  fabric.Image.fromURL('stock/onesided/CD5/a.jpg', function(img) {


img.left=0;
img.top=0;
width=360;
img.scaleToWidth(500);
img.scaleToHeight(500);
canvas.sendToBack(img);
});
} 
 //Shapes
function AddCircle(){
var circle = new fabric.Circle({
  radius: 200, fill: 'black', left: 100, top: 100
});
canvas.add(circle);
}
function AddTriangle(){
var triangle = new fabric.Triangle({
  width: 200, height: 300, fill: 'black', left: 50, top: 50
});
canvas.add(triangle);
}
function AddRect(){
  var rect = new fabric.Rect({
  left: 100,
  top: 100,
  fill: 'black',
  width: 200,
  height: 200
});
canvas.add(rect);
}
function AddLine(){
 
            var points = [100, 100, 300, 100];

            line = new fabric.Line(points, {
                strokeWidth: 10,
                stroke: 'black'
            });
            canvas.add(line);
        
}
function AddPoly(){
  var pol = new fabric.Polygon([
  {x: 200, y: 0},
  {x: 250, y: 50},
  {x: 250, y: 100},
  {x: 150, y: 100},
  {x: 150, y: 50} ], {
    left: 250,
    top: 150,
    angle: 0,
    fill: 'black'
  }
);
    canvas.add(pol);
}
function AddText() {
  var e = document.getElementById("font");
var value = e.options[e.selectedIndex].value;
var text = e.options[e.selectedIndex].text;
  var text = new fabric.IText(document.getElementById("text").value, { left: 100, top: 100,fontSize: Number(document.getElementById("fontsize").value),fill:'#'+document.getElementById("textcolor").value,fontFamily:document.getElementById("font").value});
canvas.add(text);  
}

  document.getElementById('file').addEventListener("change", function (e) {
  var file = e.target.files[0];
  var reader = new FileReader();
  reader.onload = function (f) {
    var data = f.target.result;                    
    fabric.Image.fromURL(data, function (img) {
      var oImg = img.set({left: 0, top: 0, angle: 00});
      canvas.add(oImg).renderAll();
      var a = canvas.setActiveObject(oImg);
      var dataURL = canvas.toDataURL({ quality: 1});
    });
  };
  reader.readAsDataURL(file);
});
function Del_All(){
  canvas.clear();
  var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'white',
  width: 2000,
  height: 2000
});
canvas1.sendToBack(rect);
canvas2.sendToBack(rect);
}
var d=0;
function FreeDraw(){
  d=d+1;
  if(d%2!=0)
  canvas.isDrawingMode = true;
  else
  canvas.isDrawingMode = false;
}
/*function saveasjson(){
  var Front = JSON.stringify(canvas1);


var hiddenElement1 = document.createElement('a');


hiddenElement1.href = 'data:attachment/text,' + encodeURI(Front);
hiddenElement1.target = '_blank';
hiddenElement1.download = 'front.txt';
hiddenElement1.click();

}*/
/*function save(){
  var front = new Blob([JSON.stringify(canvas1)],
                { type: "text/plain;charset=utf-8" });
            saveAs(front, "Front.txt");
            var back = new Blob([JSON.stringify(canvas2)],
                { type: "text/plain;charset=utf-8" });
            saveAs(back, "back.txt");
}*/
/*3d model*/
function Render(){
document.getElementById("Preview").style.display="inline";
//document.getElementById("Att").style.display="none";
//document.getElementById("god").style.display="none";
  var scene = new THREE.Scene();
			var camera = new THREE.PerspectiveCamera( 75, window.innerWidth/window.innerHeight, 0.1, 1000 );

      var renderer = new THREE.WebGLRenderer({canvas:render,alpha:true});
      renderer.setClearColor( 0xffffff, 0 );
      renderer.setSize( 900, 400 );
			//document.body.appendChild( renderer.domElement );
var textureLoader = new THREE.TextureLoader();                             
var texture0 = textureLoader.load( canvas1.toDataURL('png') );                       
var texture1 = textureLoader.load( canvas2.toDataURL('png') );                       
            var cubeMaterials = [                                                      
new THREE.MeshBasicMaterial( { map: texture0 } ),                      
new THREE.MeshBasicMaterial( { map: texture1 } ),                     ];
			var geometry = new THREE.BoxGeometry(0.01,a150,b150);
			
			var cube = new THREE.Mesh( geometry, cubeMaterials );
            
			scene.add( cube );

			camera.position.z = 5;

			var animate = function () {
				requestAnimationFrame( animate );

				cube.rotation.y += 0.01;

				renderer.render( scene, camera );
			};
      animate();}
      function exit(){
        cancelAnimationFrame(this.id);// Stop the animation
    this.scene = null;
    this.projector = null;
    this.camera = null;
    this.controls = null;
    document.getElementById("Preview").style.display="none";
    document.getElementById("Att").style.display="inline";
    document.getElementById("god").style.display="inline";
      }
      //editing
      function del(){
  canvas.remove(canvas.getActiveObject());
}

function ok(){
  activeObject = canvas.getActiveObject();
  activeObject.fill="#"+document.getElementById("color").value;
  activeObject.strokeWidth=Number(document.getElementById("sw").value);
  activeObject.stroke="#"+document.getElementById("scolor").value;
  canvas.renderAll();
}
function fn1(){
  document.getElementById("choose").style.display="none;"
  
}
/*function download() {
    var dt = canvas.toDataURL('image/jpeg');
    this.href = dt;
};
downloadLnk.addEventListener('click', download, false);*/
//keyboard shortcuts
window.addEventListener("keydown", moveSomething, false);
  
function moveSomething(e) {
  activeObject = canvas.getActiveObject();
    switch(e.keyCode) {
        case 37:
            // left key pressed
            activeObject.left -= 1;
            canvas.renderAll();
            break;
        case 38:
            // up key pressed
            activeObject.top -= 1;
            canvas.renderAll();
            break;
        case 39:
            // right key pressed
            activeObject.left += 1;
            canvas.renderAll();
            break;
        case 40:
            // down key pressed
            activeObject.top += 1;
            canvas.renderAll();
            break;  
        case 46:
          //del key
          canvas.remove(activeObject);
          canvas.renderAll();
          break;
    }   
}       
function tran1(){
      
       var data = document.getElementById("canvas1").toDataURL('uploads/jpeg',1);
       save1(data)
       // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server

    }
    function tran2(){
      
      var data = document.getElementById("canvas2").toDataURL('uploads/jpeg',1);
      save2(data)
      // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server

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
        exit();
    </script>

</body>
</html>