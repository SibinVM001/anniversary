<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
	<title>Limenzy Anniversary</title>
<style>
    body {
      padding: 20px 0;
    }

    .container {
      position: relative;
      width: 300px;
      height: 300px;
      margin: 0 auto;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none; 
      -o-user-select: none;
      user-select: none;
      border:2px solid #f5f5f5;
      box-shadow:inset 0 0 10px #000000;
    }

    .canvas {
      position: absolute;
      top: 0;
    }
    h2,h1{
      text-align: center;
    }
    .form {
      padding: 20px;
    }
    img{
      width: 150px;
    }
    .align {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 250px;
    }
    .register {
      position: absolute;
      top: 0;
      left: 0;
      background-color: white;
      width: 300px;
      height: 300px;
      padding-top: 50%;
      padding-left: 30px;
    }
    .error {
      color: red;
      font-size: 12px;
    }
    .coupon-code {
      color: transparent;
      text-shadow: 0 0 5px rgba(0,0,0,0.2);
      padding: 20px;
    }
</style>
</head>
<body>
	<!-- <h1>Limenzy Anniversary</h1> -->
<div class="container" id="js-container">
  <canvas class="canvas" id="js-canvas" width="300" height="300"></canvas>
  <form class="form" style="visibility: hidden;">
    <!-- <h2>Hurray you won</h2> -->
    <div class="align">
      <h1 id="code"></h1>
    </div>
    
    <!-- <img src="https://cdni.autocarindia.com/utils/imageresizer.ashx?n=https://cms.haymarketindia.net/model/uploads/modelimages/Hyundai-Grand-i10-Nios-200120231541.jpg" alt=""> -->
      <!-- </div> -->
  </form>  

  <div class="register">
    <label for="email">Enter your Email</label>
    <input type="text" name="eamil" id="email">
    <br>
    <span class="error"></span>
    <br>
    <button class="reg-btn" disabled>Regiseter</button>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script>
    (function() {
      
      'use strict';
      
      var isDrawing, lastPoint;
      var container    = document.getElementById('js-container'),
          canvas       = document.getElementById('js-canvas'),
          canvasWidth  = canvas.width,
          canvasHeight = canvas.height,
          ctx          = canvas.getContext('2d'),
          image        = new Image(),
          brush        = new Image();
          
      // base64 Workaround because Same-Origin-Policy
      image.src = 'scratch-card.jpg';
      image.onload = function() {
        ctx.drawImage(image, 0, 0);
        // Show the form when Image is loaded.
        document.querySelectorAll('.form')[0].style.visibility = 'visible';
      };
      brush.src = 'brush.png';
      
      canvas.addEventListener('mousedown', handleMouseDown, false);
      canvas.addEventListener('touchstart', handleMouseDown, false);
      canvas.addEventListener('mousemove', handleMouseMove, false);
      canvas.addEventListener('touchmove', handleMouseMove, false);
      canvas.addEventListener('mouseup', handleMouseUp, false);
      canvas.addEventListener('touchend', handleMouseUp, false);
      
      function distanceBetween(point1, point2) {
        return Math.sqrt(Math.pow(point2.x - point1.x, 2) + Math.pow(point2.y - point1.y, 2));
      }
      
      function angleBetween(point1, point2) {
        return Math.atan2( point2.x - point1.x, point2.y - point1.y );
      }
      
      // Only test every `stride` pixel. `stride`x faster,
      // but might lead to inaccuracy
      function getFilledInPixels(stride) {
        if (!stride || stride < 1) { stride = 1; }
        
        var pixels   = ctx.getImageData(0, 0, canvasWidth, canvasHeight),
            pdata    = pixels.data,
            l        = pdata.length,
            total    = (l / stride),
            count    = 0;
        
        // Iterate over all pixels
        for(var i = count = 0; i < l; i += stride) {
          if (parseInt(pdata[i]) === 0) {
            count++;
          }
        }
        
        return Math.round((count / total) * 100);
      }
      
      function getMouse(e, canvas) {
        var offsetX = 0, offsetY = 0, mx, my;

        if (canvas.offsetParent !== undefined) {
          do {
            offsetX += canvas.offsetLeft;
            offsetY += canvas.offsetTop;
          } while ((canvas = canvas.offsetParent));
        }

        mx = (e.pageX || e.touches[0].clientX) - offsetX;
        my = (e.pageY || e.touches[0].clientY) - offsetY;

        return {x: mx, y: my};
      }
      
      function handlePercentage(filledInPixels) {
        filledInPixels = filledInPixels || 0;
        // console.log(filledInPixels + '%');
        if (filledInPixels > 50) {
          canvas.parentNode.removeChild(canvas);
        }
      }
      
      function handleMouseDown(e) {
        isDrawing = true;
        lastPoint = getMouse(e, canvas);
      }

      function handleMouseMove(e) {
        if (!isDrawing) { return; }
        
        e.preventDefault();

        var currentPoint = getMouse(e, canvas),
            dist = distanceBetween(lastPoint, currentPoint),
            angle = angleBetween(lastPoint, currentPoint),
            x, y;
        
        for (var i = 0; i < dist; i++) {
          x = lastPoint.x + (Math.sin(angle) * i) - 25;
          y = lastPoint.y + (Math.cos(angle) * i) - 25;
          ctx.globalCompositeOperation = 'destination-out';
          ctx.drawImage(brush, x, y);
        }
        
        lastPoint = currentPoint;
        var pointX = lastPoint.x;
        var pointY = lastPoint.y;
        // handlePercentage(getFilledInPixels(32));
        // const elem1 = document.getElementsByClassName('coupon-code');
        // const elem2 = document.getElementById('elem2');
        // // Get client Rect
        // const rect1 = elem1.getBoundingClientRect();
        // const rect2 = elem2.getBoundingClientRect();
        // // Calculate the difference
        // const leftPos = rect2.left - rect1.left;
        // const topPos  = rect2.top  - rect1.top;
        // if ($("$code")){
          if ((pointX > $('.coupon-code').position().left && pointX < $('.coupon-code').position().left + $('.coupon-code').innerWidth()) &&
            (pointY > $('.coupon-code').position().top && pointY < $('.coupon-code').position().top + $('.coupon-code').innerHeight())) {
            if (getFilledInPixels(32) > 10) {
              $('.coupon-code').css({'color' : 'black', 'text-shadow' : 'none'});
              canvas.parentNode.removeChild(canvas);
            }
          }
        // }
      }

      function handleMouseUp(e) {
        isDrawing = false;
      }
      
    })();

    function makeid() {
        // const rndInt = Math.floor(Math.random() * 6) + 1

        // let result = '';
        // const characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // const charactersLength = characters.length;
        // let counter = 0;
        // while (counter < 7) {
        //   result += characters.charAt(Math.floor(Math.random() * charactersLength));
        //   counter += 1;
        // }

        // if (rndInt == 6) {
        // } else {
        //   $('#code').html('sorry');
        // }
    }

    $(document).ready(function (){
      makeid();
    });

    const validateEmail = (email) => {
      return String(email)
        .toLowerCase()
        .match(
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    };

    $('#email').on('input', function() {
      if (validateEmail($(this).val()) == null) {
        $('.error').html('Please enter a valid Email');
        $('.reg-btn').attr('disabled', true);
      } else {
        $('.error').html('');
        $('.reg-btn').attr('disabled', false);
      }
    });

    $('.reg-btn').on('click', function() {
      $('.register').hide();
      $.ajax({
        url : 'checkResult.php',
        type: 'POST',
        data: {
          "email" : $('#email').val()
        },
        success : function(response) {
          $('#code').html(response);
        }
      });
    });
</script>
</body>
</html>
