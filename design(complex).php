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
    <script>
         var a150=3,b150=5;
        <?php
     
        echo 'a150=parseFloat('.$_GET['a'].');b150=parseFloat('.$_GET['b'].');';
      
      ?>
    </script>
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
          <button id="preview" type="button" class="btn btn-default" onclick="Render()">
            <img src="stock/preview.png" style="width: auto;" >
          </button>
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
        Carte Visite 1 :
          <img src="stock/onesided/YourFileName (6).jpg" onclick="cvtem1()" >
          Carte Visite 2:
          <img src="stock/onesided/YourFileName (7).jpg" onclick="cvtem2()" >
          Carte Visite 3:
        
          <img src="stock/onesided/CV3/YourFileName.jpg" onclick="cvtem3()">
          Carte Visite 4:
        
          <img src="stock/onesided/CV4/YourFileName.jpg"  onclick="cvtem4()">
          Carte Visite 5:
        
          <img src="templates/CV6.png"  onclick="cvtem5()">
          Flyer 1 :
          <img src="stock/onesided/F1/YourFileName.jpg" onclick="ftem1()" >
          Flyer 2:
          <img src="stock/onesided/F2/YourFileName.jpg" onclick="ftem2()" >
          Flyer 3:
        
          <img src="stock/onesided/F3/YourFileName.jpg" onclick="ftem3()">
          Flyer 4:
        
          <img src="stock/onesided/F4/YourFileName.jpg"  onclick="ftem4()">
          Flyer 5:
        
          <img src="stock/onesided/F5/YourFileName.jpg"  onclick="ftem5()">
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
<canvas id="canvas1" height=<?php echo $_GET['h'];?> width=<?php echo $_GET['w']; ?> style="border: solid;border-color: aqua;margin-top: 130px;" ></canvas>
</div>
<div id="can2">
<canvas id="canvas2" height=<?php echo $_GET['h']; ?> width=<?php echo $_GET['w']; ?>  style="border: solid;border-color: red;display: inline;margin-top: 130px;"></canvas>
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
 function cvtem1(){
  canvas.clear();
canvas.loadFromJSON('{"objects":[{"type":"rect","originX":"left","originY":"top","left":-240.49,"top":127.05,"width":200,"height":200,"fill":"#FFA7AF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":4.87,"scaleY":1.98,"angle":330,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0,"id":1},{"type":"rect","originX":"left","originY":"top","left":-40.79,"top":465.71,"width":900,"height":200,"fill":"#C1FCF7","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.82,"scaleY":1.89,"angle":330,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0,"id":2},{"type":"rect","originX":"left","originY":"top","left":154.02,"top":109,"width":200,"height":200,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.11,"scaleY":1.22,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0,"id":3},{"type":"i-text","originX":"left","originY":"top","left":268,"top":190,"width":215.36,"height":67.8,"fill":"#FFA7AF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Lacquer","fontSize":60,"fontWeight":"normal","fontFamily":"Georgia","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"id":7,"styles":{}},{"type":"i-text","originX":"left","originY":"top","left":338.02,"top":156,"width":61.13,"height":22.6,"fill":"#121212","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.18,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"N A I L","fontSize":20,"fontWeight":"normal","fontFamily":"Helvetica","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"id":8,"styles":{}},{"type":"i-text","originX":"left","originY":"top","left":326,"top":286,"width":90.03,"height":22.6,"fill":"#121212","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.14,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"S A L O N","fontSize":20,"fontWeight":"normal","fontFamily":"Helvetica","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"id":9,"styles":{}}],"background":"#FFFFFF","Layers":[{"layertitle":"Layer 9","id":"9"},{"layertitle":"Layer 8","id":"8"},{"layertitle":"Layer 7","id":"7"},{"layertitle":"Layer 3","id":"3"},{"layertitle":"Layer 2","id":"2"},{"layertitle":"Layer 1","id":"1"}]}'); }
 function cvtem2(){
  canvas.clear();
canvas.loadFromJSON('{"objects":[{"type":"rect","originX":"left","originY":"top","left":423,"top":54,"width":200,"height":200,"fill":"#E6782D","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.97,"scaleY":0.08,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"rect","originX":"left","originY":"top","left":-183,"top":387,"width":200,"height":200,"fill":"#ecf0f1","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.97,"scaleY":0.08,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"i-text","originX":"left","originY":"top","left":143,"top":172,"width":468.7,"height":40.68,"fill":"#ecf0f1","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.02,"scaleY":1.42,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"U N I V E R S I T Y   O F   S I M P S O N","fontSize":36,"fontWeight":"normal","fontFamily":"Impact","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","originX":"left","originY":"top","left":270,"top":244,"width":222.26,"height":22.6,"fill":"#E6782D","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":0.94,"scaleY":1.1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"S C H O O L  O F  L A W","fontSize":20,"fontWeight":"normal","fontFamily":"Helvetica","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}}],"background":"#003466"}'); }
 function cvtem3(){
  canvas.clear();
canvas.loadFromJSON('{"version":"3.6.2","objects":[{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":0,"top":0,"width":2000,"height":2000,"fill":"black","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":0,"top":0,"width":2000,"height":2000,"fill":"black","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":430.31,"top":-5.93,"width":20,"height":20,"fill":"#FC00FF","stroke":"#FF0202","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":17.08,"scaleY":8.73,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":430.64,"top":288.63,"width":20,"height":20,"fill":"#FFFC00","stroke":"#FF0202","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":16.95,"scaleY":8.84,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"line","version":"3.6.2","originX":"left","originY":"top","left":432.63,"top":175.89,"width":200,"height":0,"fill":"#FF30CA","stroke":"#FF0202","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1.69,"scaleY":7.46,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"x1":-100,"x2":100,"y1":0,"y2":0},{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":421.71,"top":96.84,"width":20,"height":20,"fill":"red","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":17.1,"scaleY":9.32,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":384.79,"top":304.52,"width":40,"height":40,"fill":"#FFFC00","stroke":"#FF0202","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":2.16,"scaleY":2.34,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":20,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":379.05,"top":148.22,"width":40,"height":40,"fill":"#FF0000","stroke":"#FF0202","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":2.8,"scaleY":2.87,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":20,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":398.89,"top":13.83,"width":40,"height":40,"fill":"#FC00FF","stroke":"#FF0202","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1.73,"scaleY":1.69,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":20,"startAngle":0,"endAngle":6.283185307179586},{"type":"text","version":"3.6.2","originX":"left","originY":"top","left":82.2,"top":116.04,"width":122.59,"height":74.58,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Title","fontSize":66,"fontWeight":"normal","fontFamily":"Times New Roman","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"text","version":"3.6.2","originX":"left","originY":"top","left":29.6,"top":217.72,"width":242.47,"height":37.29,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"www.siteweb.com","fontSize":33,"fontWeight":"normal","fontFamily":"Times New Roman","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"text","version":"3.6.2","originX":"left","originY":"top","left":91.13,"top":347.89,"width":110,"height":24.86,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"0888888888","fontSize":22,"fontWeight":"normal","fontFamily":"Times New Roman","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"text","version":"3.6.2","originX":"left","originY":"top","left":526.68,"top":405.34,"width":156.31,"height":31.64,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Fonctionaliter","fontSize":28,"fontWeight":"normal","fontFamily":"Times New Roman","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":483.66,"top":324.63,"width":185.22,"height":40.68,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Fontionaliter","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":487.63,"top":177.83,"width":185.22,"height":40.68,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Fontionaliter","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":484.66,"top":30.05,"width":185.22,"height":40.68,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Fontionaliter","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":199.12,"top":33.99,"width":46.95,"height":33.9,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Nom","fontSize":30,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":19.7,"top":37.93,"width":78.82,"height":33.9,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Prenom","fontSize":30,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}}]}'); }
 function cvtem5(){
  canvas.clear();
  canvas.loadFromJSON('{"version":"3.6.2","objects":[{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":233.84,"top":134.98,"width":200,"height":200,"fill":"black","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1.83,"scaleY":0.04,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":367.67,"top":170.94,"width":64.42,"height":33.9,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Email","fontSize":30,"fontWeight":"normal","fontFamily":"satisfy","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":268.53,"top":53.69,"width":71.46,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Nom","fontSize":36,"fontWeight":"normal","fontFamily":"satisfy","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":464.83,"top":56.65,"width":111.33,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Prenom","fontSize":36,"fontWeight":"normal","fontFamily":"satisfy","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":326.03,"top":249.75,"width":157.14,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"060000000","fontSize":36,"fontWeight":"normal","fontFamily":"satisfy","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}}]}');
  fabric.Image.fromURL('templates/CV6.png', function(img) {


img.left=0;
img.top=0;
img.right=0;
img.bottom=0;
img.scaleToWidth(690);
img.scaleToHeight(400);
canvas.sendToBack(img);
});
 }
 function cvtem4(){
  canvas.clear();
  canvas.loadFromJSON('{"version":"3.6.2","objects":[{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":0,"top":0,"width":2000,"height":2000,"fill":"white","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":-9.05,"top":-9.85,"width":200,"height":200,"fill":"#0F358D","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":2.1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":65.3,"top":-1.51,"width":400,"height":400,"fill":"#FFFFFF","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.71,"scaleY":0.71,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":117.84,"top":282.24,"width":400,"height":400,"fill":"#FFFFFF","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.35,"scaleY":0.35,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":77.2,"top":12.65,"width":400,"height":400,"fill":"#FFFFFF","stroke":"#101AB0","strokeWidth":30,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.59,"scaleY":0.59,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":107.93,"top":42.86,"width":400,"height":400,"fill":"#FFFFFF","stroke":"#101AB0","strokeWidth":30,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.45,"scaleY":0.45,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":138.66,"top":74.38,"width":400,"height":400,"fill":"#FFFFFF","stroke":"#101AB0","strokeWidth":30,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.3,"scaleY":0.3,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":165.43,"top":102.96,"width":400,"height":400,"fill":"#FFFFFF","stroke":"#101AB0","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.18,"scaleY":0.18,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":349.19,"top":158.62,"width":200,"height":200,"fill":"#101AB0","stroke":"#101AB0","strokeWidth":30,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1.46,"scaleY":0.03,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":425.17,"top":201.48,"width":150,"height":33.9,"fill":"#101AB0","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"0688888888","fontSize":30,"fontWeight":"normal","fontFamily":"pacifico","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":456.9,"top":262.56,"width":75.97,"height":33.9,"fill":"#101AB0","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Email","fontSize":30,"fontWeight":"normal","fontFamily":"pacifico","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":436.08,"top":322.66,"width":113.77,"height":33.9,"fill":"#101AB0","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"SiteWeb","fontSize":30,"fontWeight":"normal","fontFamily":"pacifico","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":468.79,"top":107.88,"width":65.17,"height":33.9,"fill":"#101AB0","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Titre","fontSize":30,"fontWeight":"normal","fontFamily":"pacifico","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":385.52,"top":26.11,"width":240.75,"height":40.68,"fill":"#101AB0","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Nom et Prenom","fontSize":36,"fontWeight":"normal","fontFamily":"pacifico","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":177.34,"top":114.82,"width":400,"height":400,"fill":"#FFFFFF","stroke":"#101AB0","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.12,"scaleY":0.12,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":126.77,"top":294.09,"width":400,"height":400,"fill":"#101AB0","stroke":"#101AB0","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.29,"scaleY":0.29,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586}]}');
  
 }
 function ftem1(){
  canvas.clear();
canvas.loadFromJSON('{"version":"3.6.2","objects":[{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":0,"top":0,"width":2000,"height":2000,"fill":"white","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":68.52,"top":-97.72,"width":400,"height":400,"fill":"#FF0000","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":-239.34,"top":369.89,"width":400,"height":400,"fill":"#142CFF","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":32.13,"top":254.22,"width":400,"height":400,"fill":"#FFFFFF","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":-60.33,"top":-43.35,"width":400,"height":400,"fill":"#FF17F7","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.72,"scaleY":0.72,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"circle","version":"3.6.2","originX":"left","originY":"top","left":-350.49,"top":91.1,"width":400,"height":400,"fill":"#FF17F7","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1.22,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"radius":200,"startAngle":0,"endAngle":6.283185307179586},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":110.82,"top":74.3,"width":133.8,"height":45.2,"fill":"#AB2567","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Occasion","fontSize":40,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":2.62,"top":8.06,"width":129.4,"height":45.2,"fill":"#AB2567","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Location","fontSize":40,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":262.3,"top":9.05,"width":66.9,"height":45.2,"fill":"#AB2567","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Date","fontSize":40,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":146.23,"top":154.37,"width":63.1,"height":45.2,"fill":"#AB2567","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Nom","fontSize":40,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":146.23,"top":234.45,"width":60.1,"height":45.2,"fill":"#AB2567","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":40,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":142.3,"top":308.59,"width":60.1,"height":45.2,"fill":"#AB2567","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":40,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":142.3,"top":390.65,"width":60.1,"height":45.2,"fill":"#AB2567","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":40,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":139.34,"top":471.71,"width":60.1,"height":45.2,"fill":"#AB2567","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":40,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}}]}'); }
function ftem5(){
  canvas.clear();
canvas.loadFromJSON('{"version":"3.6.2","objects":[{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":0,"top":0,"width":2000,"height":2000,"fill":"white","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":20.33,"top":-1.83,"width":200,"height":200,"fill":"#051EFF","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.35,"scaleY":1.06,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"rect","version":"3.6.2","originX":"left","originY":"top","left":19.67,"top":205.83,"width":200,"height":200,"fill":"#2189FF","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.26,"scaleY":0.93,"angle":319.06,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"rx":0,"ry":0},{"type":"polygon","version":"3.6.2","originX":"left","originY":"top","left":286.18,"top":372.65,"width":100,"height":100,"fill":"#0FF7FF","stroke":"#000000","strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.49,"scaleY":1.47,"angle":0.17,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"points":[{"x":200,"y":0},{"x":250,"y":50},{"x":250,"y":100},{"x":150,"y":100},{"x":150,"y":50}]},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":190.49,"top":29.81,"width":54.09,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":196.39,"top":102.97,"width":54.09,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":22.3,"top":66.39,"width":54.09,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":288.85,"top":478.63,"width":54.09,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.71,"scaleY":0.71,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":116.66,"top":288.82,"width":54.09,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.84,"scaleY":0.84,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":206.23,"top":207.76,"width":54.09,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":48.85,"top":372.85,"width":54.09,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":49.84,"top":469.73,"width":54.09,"height":40.68,"fill":"#000000","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}}]}'); }
function ftem2(){
  
  
  canvas.loadFromJSON('{"version":"3.6.2","objects":[{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":91.15,"top":69.35,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":150.16,"top":0.15,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":299.67,"top":1.14,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":147.21,"top":480.61,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":-0.33,"top":483.57,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":305.57,"top":485.55,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":89.18,"top":419.32,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":85.25,"top":284.87,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":208.2,"top":174.14,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":201.31,"top":419.32,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":89.18,"top":178.1,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":210.16,"top":69.35,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":-1.31,"top":2.13,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":204.26,"top":284.87,"width":50.07,"height":38.42,"fill":"#FFFFFF","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":34,"fontWeight":"normal","fontFamily":"bangers","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}}]}');
  var rect = new fabric.Rect({
  left: 290,
  top: 0,
  fill: 'black',
  width: 210,
  height: 520
});
canvas.sendToBack(rect);
  fabric.Image.fromURL('templates/F9.png', function(img) {


img.left=0;
img.top=0;
width=360;
img.scaleToWidth(360);
img.scaleToHeight(520);
canvas.sendToBack(img);
});

 }
 function ftem3(){
  
  
  canvas.loadFromJSON('{"version":"3.6.2","objects":[{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":154.1,"top":504.33,"width":54.09,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":137.38,"top":5.1,"width":59.13,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Title","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":5.57,"top":468.75,"width":54.09,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":299.67,"top":469.73,"width":54.09,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":151.15,"top":403.5,"width":54.09,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":150.16,"top":316.5,"width":54.09,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":80.33,"top":185.02,"width":54.09,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":228.85,"top":188.97,"width":54.09,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":7.54,"top":76.27,"width":101.88,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Adresse","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":240.66,"top":79.24,"width":110.61,"height":40.68,"fill":"#092263","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Location","fontSize":36,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}}]}');
  var rect = new fabric.Rect({
  left: 320,
  top: 0,
  fill: 'white',
  width: 210,
  height: 520
});
canvas.sendToBack(rect);
var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'white',
  width: 30,
  height: 520
});
canvas.sendToBack(rect);
  fabric.Image.fromURL('templates/F7.png', function(img) {


img.left=30;
img.top=0;
width=360;
img.scaleToWidth(360);
img.scaleToHeight(520);
canvas.sendToBack(img);
});

 }
 function ftem4(){
  
  
  canvas.loadFromJSON('{"version":"3.6.2","objects":[{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":164.92,"top":518.02,"width":34.5,"height":27.12,"fill":"#AB2567","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":0.86,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":24,"fontWeight":"normal","fontFamily":"oswald","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":130.49,"top":20.91,"width":100.17,"height":40.68,"fill":"#EAE014","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Title","fontSize":36,"fontWeight":"normal","fontFamily":"audiowide","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":-0.33,"top":132.62,"width":54.09,"height":40.68,"fill":"#EAE014","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"audiowide","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":266.23,"top":140.53,"width":54.09,"height":40.68,"fill":"#EAE014","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"audiowide","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":135.41,"top":253.23,"width":54.09,"height":40.68,"fill":"#EAE014","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"audiowide","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":267.21,"top":379.77,"width":54.09,"height":40.68,"fill":"#EAE014","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"audiowide","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":9.51,"top":402.51,"width":54.09,"height":40.68,"fill":"#EAE014","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"text","fontSize":36,"fontWeight":"normal","fontFamily":"audiowide","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":265.25,"top":9.05,"width":29.76,"height":13.56,"fill":"#EAE014","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":2.76,"scaleY":2.76,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Date","fontSize":12,"fontWeight":"normal","fontFamily":"audiowide","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"i-text","version":"3.6.2","originX":"left","originY":"top","left":2.62,"top":68.37,"width":186.03,"height":40.68,"fill":"#EAE014","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"text":"Location","fontSize":36,"fontWeight":"normal","fontFamily":"audiowide","fontStyle":"normal","lineHeight":1.16,"underline":false,"overline":false,"linethrough":false,"textAlign":"left","textBackgroundColor":"","charSpacing":0,"styles":{}},{"type":"line","version":"3.6.2","originX":"left","originY":"top","left":9.51,"top":184.79,"width":200,"height":0,"fill":"rgb(0,0,0)","stroke":"black","strokeWidth":10,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.33,"scaleY":0.33,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"x1":-100,"x2":100,"y1":0,"y2":0},{"type":"line","version":"3.6.2","originX":"left","originY":"top","left":132.23,"top":301.52,"width":200,"height":0,"fill":"rgb(0,0,0)","stroke":"black","strokeWidth":10,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.46,"scaleY":0.46,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"x1":-100,"x2":100,"y1":0,"y2":0},{"type":"line","version":"3.6.2","originX":"left","originY":"top","left":267.96,"top":184.93,"width":200,"height":0,"fill":"rgb(0,0,0)","stroke":"black","strokeWidth":10,"strokeDashArray":null,"strokeLineCap":"butt","strokeDashOffset":0,"strokeLineJoin":"miter","strokeMiterLimit":4,"scaleX":0.46,"scaleY":0.46,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","paintFirst":"fill","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"x1":-100,"x2":100,"y1":0,"y2":0}]}');
  var rect = new fabric.Rect({
  left: 320,
  top: 0,
  fill: 'white',
  width: 2100,
  height: 520
});
canvas.sendToBack(rect);
var rect = new fabric.Rect({
  left: 0,
  top: 0,
  fill: 'white',
  width: 30,
  height: 520
});
canvas.sendToBack(rect);
  fabric.Image.fromURL('templates/F4.png', function(img) {


img.left=30;
img.top=0;
width=360;
img.scaleToWidth(360);
img.scaleToHeight(520);
canvas.sendToBack(img);
});

 }
 //Shapes
function AddCircle(){
var circle = new fabric.Circle({
  radius: 200, fill: 'black', right: 100, top: 100
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