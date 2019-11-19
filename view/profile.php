<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Wireframe</title>
</head>
<body>

<style>
/*Body stuff, I think? */
body{
    font-family: Arial;
    margin: 0;
}

/*This is the header, I think? */
.header {
    padding: 50px;
    text-align: center;
    background-color: black;
    color: white;
    font-size: 25px;
    width: 90%; //changed from 100%
    margin:  0;
    padding: 30px 5%; //30px padding vertically, 5% horizontally (5% on left and right side)
}

/*This is the page content, I think? */
.content {padding:22px;
         text-align: center;
         background-color: grey;
         min-height: 100vh;
         }

</style>

<div class="header">
<form align="right" name="logout" method="post" action="log_out.php" style="black">
<label class="logoutLblPos">
<input name="submit2" type="submit" id="submit2" value="logout">
</label>
</form>
<h1>James</h1>
<p>at button James404NotFound</p>
</div>

<div class="content">
<div class="choice" draggable="true"><p> Chungking Express </p></div>
<div class="choice" draggable="true"><p> Chungking Mansions </p></div>
<div class="choice" draggable="true"><p> Mansions Express </p></div>
<div class="choice" draggable="true"><p> Express Mansions </p></div>
<div class="choice" draggable="true"><p> Chungking Chungking </p></div>

</div>

<script type= "text/javascript">



// <!-- <script type= "text/javascript">

// var dragSRcEL = null;

// function movieDragStart(e) {
//     this.style.opacity="0.5";
// }

// dragSrcEL = this;

// e.dataTransfer.effectAllowed = 'move';
// e.dataTransfer.setData('text/html', this.innerHTML);
// }

// function movieDrop(e) {
//     if (e.stopPropagation) {
//         e.stopPropagation();
//     }

//     if(dragSrcEL != this {
//     dragSrcEL.innerHTML = this.innerHTML;
//     this.innerHTML = e.dataTransfer.getData('text/html');
//     }
//     return false;
// }

// var dragIcon = document.createElement('img');
// dragIcon.src = 'logo.png';
// dragIcon.width = 100;
// e.dataTransfer.setDragImage(dragIcon, -10, -10);

// function movieDragEnd(e) {
//     []forEach.call(cols, function (col){
//         col.classList.remove("over");
//     });
// }

// var cols = document.QuerySelectorAll("#contents .content");
// [].forEach.call(cols, function(col){
//     col.addEventListener("dragstart", movieDragStart, false);
//     col.addEventListener("dragenter", movieDragEnter, false);
//     col.addEventListener("dragover", movieDragOver, false);
//     col.addEventListener("dragleave", movieDragLeave, false);
//     col.addEventListener("drop", movieDrop, false);
//     col.addEventListener("dragend", movieDragEnd, false);
// });

// function movieDrop(e) {
//     e.stopPropagation();
//     e.preventDefault();

//     var files = e.dataTransfer.files;
//     for (var i = 0, f; f = files[i]; i++){
//     }
//     }
// } -->



//  <!-- <script type= "text/javascript">

// /This is from the dnd Marie form

// (function () {

//     var dndHandler = {
//         draggedElement = null,

//     applyDragEvents: function (element) {

//     element.draggable = true;
//     var dndHandler = this;

//     element.addEventListener ('dragstart', function (e) {
//     e.preventDefault ();
//     this.className = 'dropper drop_hover';
//     });

//     dropper.addEventListener ('dragleave', function () {
//     this.className = 'dropper';
//     });

//     var dndHandler = e.target,
//     draggedElement = dndHandler.draggedElement,
//     clonedElement = draggedElement.cloneNode (true);

//     while (target.className.indexOf ('dropper') == -1) {
//     target = target.parentNode;
//     } 
    
//     target.className = 'dropper';
//     clonedElement = target.appendChild (clonedElement);
//     dndHandler.applyDragEvents (clonedElement);
//     draggedElement.parentNode.removeChild (draggedElement);
//     });
//     }
//     };

//     var elements = document.querySelectorAll ('. draggable');
//     elementsLen = elements.length;
//     for (var i = 0; i <elementsLen; i ++) {
//     dndHandler.applyDragEvents (Elements [i]);
//     }
//     var droppers = document.querySelectorAll ('. dropper'),
//     droppersLen = droppers.length;

//     for(var i = 0; i <droppersLen; i++) {
//     dndHandler.applyDropEvents (droppers [i]);
//     }

// }) ();
// </script> -->



</body>
</html>
