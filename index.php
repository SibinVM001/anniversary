<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
	<title>Limenzy Anniversary</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Potta+One&display=swap" rel="stylesheet">
<style>
    body {
      padding: 0;
      margin: 0;
      display: flex;
      justify-content: center;
    }

    .top-container, .terms-and-conditions {
      display: flex;
      flex-direction: column;
    }
    .win-an-icecream-img-container, .congratulations-img-container, .look-around-container {
      height: 165px;
      display: flex;
      align-items: end;
      justify-content: center;
      text-align: center;
    }
    .congratulations-img-container, .look-around-container {
      display: none;
    }
    .win-an-icecream-img-container img {
      width: 200px;
    }
    .congratulations-img-container img {
      width: 240px;
    }
    .top-text-container {
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      height: 146px;
      z-index: 9999;
      position: relative;
    }
    .top-text-container p {
      width: 65%;
    }
    .top-text-container img {
      width: 14px !important;
    }
    .top-text-content {
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      line-height: 22.5px;
    }
    .scratch-card-container {
      height: 410px;
    } 
    .canvas {
      z-index: 999;
    }
    .container {
      position: relative;
      width: 300px;
      height: 300px;
      margin: 0 auto;
      /* margin-top: 50px; */
      /* -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none; 
      -o-user-select: none;
      user-select: none; */
      border:1px solid #C0C0C0;
      border-radius: 5px;
      display: flex;
      justify-content: center;
      /* box-shadow:inset 0 0 10px #000000; */
    }
    .scratch-card-bg {
      position: absolute;
      width: 300px;
      height: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .scratch-card-bg img {
      width: 280px;
      height: 280px;
      border-radius: 5px;
    }

    .canvas {
      position: absolute;
      top: 10px;
      left: 10px;
      /* z-index: 999; */
    }
    h2,h1{
      text-align: center;
    }
    .form {
      position: absolute;
      z-index: 50;
    }
    img{
      width: 150px;
    }
    .align {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 300px;
      height: 300px;
      flex-direction: column;
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
    }
    .logo {
      height: 210px;
      display: flex;
      justify-content: center;
      align-items: end;
    }
    .terms-and-conditions {
      text-align: center;
      height: 41px;
    }
    .terms-and-conditions a {
      font-family: 'Poppins', sans-serif;
      color: #757575;
      font-size: 12px;
      font-weight: 400;
      line-height: 18px;
      letter-spacing: 0em;
    }
    .top-div {
      display: flex;
      align-items: center;
    }
    .top-div p {
      font-family: 'Potta One', cursive;
      font-size: 33px;
      line-height: 43px;
      color: #FFFFFF;
      margin-left: -20px;
    }
    /* .bottom-div {

    } */
    .ice-cream {
      display: flex;
      justify-content: center;
      width: min-content;
    }
    .coupon-code-container {
      width: 200px;
      height: 45px;
      background-color: #FFFFFF;
      border-radius: 3px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .code-label {
      font-family: 'Poppins', sans-serif;
      font-size: 18px;
      font-weight: 300;
      line-height: 27px;
      letter-spacing: 0em;
      color: #202020;
      margin-right: 22px;
    }
    #code {
      font-family: 'Poppins', sans-serif;
      font-size: 20px;
      font-weight: 500;
      line-height: 30px;
      letter-spacing: 0em;
      text-align: left;
    }
    .claim-procedure {
      display: flex;
      font-family: 'Poppins', sans-serif;
      font-size: 17px;
      font-weight: 400;
      line-height: 30px;
      letter-spacing: 0em;
      color: #393939;
      text-align: center;
      width: 65%;
      margin: 0;
      visibility: hidden;
    }
    .claim-procedure img {
      width: 24px;
      height: 24px;
    }
    .claim-procedure p {
      margin: 0;
    }
    .footer {
      display: flex;
      flex-direction: column;
      align-items: center;
      /* height: 245px; */
    }
    .congratulation-gif {
      position: absolute;
      z-index: 1;
      top: 0;
    }
    @media screen and (min-width: 768px) {
      .main-container {
        width: 50%;
      }
    }
    .look-around {
      font-family: 'Poppins', sans-serif;
      font-size: 32px;
      font-weight: 400;
      line-height: 26px;
      letter-spacing: 0em;
      text-align: center;
    }
    .sorry-text {
      font-family: 'Poppins', sans-serif;
      font-size: 48px;
      font-weight: 600;
      line-height: 36px;
      letter-spacing: 0em;
      text-align: center;
      color: #FFFFFF;
    }
    .sorry-content {
      font-family: 'Poppins', sans-serif;
      font-size: 16px;
      font-weight: 500;
      line-height: 26px;
      letter-spacing: 0em;
      text-align: center;
      color: #393939;
    }
</style>
</head>
<body>
  <div class="main-container">
    <div class="top-container">
      <div class="win-an-icecream-img-container">
          <img src="images/win-an-icecream.svg" alt="win-an-icecream">
      </div>
      <div class="congratulations-img-container">
          <img class="congratulation-gif" src="images/congratulations.gif" alt="congratulations-gif">
          <img src="images/congratulations.svg" alt="congratulations" style="z-index: 999;">
      </div>
      <div class="look-around-container">
        <p class="look-around">Look around</p>
      </div>
    </div>
    <div class="top-text-container">
        <p class="top-text-content">
          Scratch the card and get a chance to win an ice cream oooi<span><img src="images/icecream-small.svg" alt="" srcset=""></span>
        </p>
    </div>
    <div class="scratch-card-container">
      <div class="container" id="js-container">
        <div class="scratch-card-bg">
          <img src="images/scratch-card-bg.svg" alt="scratch-card-bg">
        </div>
        <canvas class="canvas" id="js-canvas" width="280" height="280"></canvas>
        <form class="form" style="visibility: hidden;">
          <!-- <h2>Hurray you won</h2> -->
          <div class="align">
            <div class="top-div">
              <div class="ice-cream">
                <img src="images/icecream.svg" alt="">
                <p>One Ice Cream</p>
              </div>
            </div>
            <div class="bottom-div">
              <div class="coupon-code-container">
                <label for="code" class="code-label">Code:</label>
                <span id="code" class="coupon-code"></span>
              </div>
            </div>
          </div>
          
          <!-- <img src="https://cdni.autocarindia.com/utils/imageresizer.ashx?n=https://cms.haymarketindia.net/model/uploads/modelimages/Hyundai-Grand-i10-Nios-200120231541.jpg" alt=""> -->
            <!-- </div> -->
        </form>  

        <!-- <div class="register">
          <label for="email">Enter your Name</label>
          <input type="text" name="eamil" id="email">
          <br>
          <span class="error"></span>
          <br>
          <button class="reg-btn">Regiseter</button>
        </div> -->
      </div>
    </div>
    
    <div class="footer">
        <div class="claim-procedure">
          <img src="images/arrow.svg" alt="" srcset="">
          <p>
            Show the unique code ....................... to claim the prize
          </p>
        </div>  
        <div class="logo">
          <img src="images/logo.svg" alt="">
        </div>
        <p class="terms-and-conditions">
          <a href="#">Terms & Conditions</a>
        </p>
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
      image.src = 'images/scratch-here.svg';
      image.onload = function() {
        // ctx.drawImage(image, 10, 10);
        var wrh = image.width / image.height;
        var newWidth = canvas.width;
        var newHeight = newWidth / wrh;
        if (newHeight > canvas.height) {
					newHeight = canvas.height;
        	newWidth = newHeight * wrh;
      	}
        var xOffset = newWidth < canvas.width ? ((canvas.width - newWidth) / 2) : 0;
        var yOffset = newHeight < canvas.height ? ((canvas.height - newHeight) / 2) : 0;
        ctx.drawImage(image, xOffset, yOffset, newWidth, newHeight);
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
          $('.coupon-code').css({'color' : 'black', 'text-shadow' : 'none'});
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
        handlePercentage(getFilledInPixels(32));
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
              if ($('#code').text() != '-') {
                $('.congratulations-img-container').css('display', 'flex');
                $('.win-an-icecream-img-container').css('display', 'none');
                $('.top-text-content').html("You've been selected as a winner of “win an icecream” contest hosted by Limenzy Technologies PVT.LTD");
                $('.claim-procedure').css('visibility', 'visible');
              } else {
                $('.congratulations-img-container').css('display', 'none');
                $('.win-an-icecream-img-container').css('display', 'none');
                $('.look-around-container').css('display', 'flex');
                $('.top-text-content').html('Perhaps your friends are savoring some ice cream <span><img src="images/emoji.svg" alt=""></span><span><img src="images/icecream-small.svg" alt=""></span>');
                $('.claim-procedure').css('visibility', 'hidden');
              }
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
      $.ajax({
        url : 'checkResult.php',
        dataType: 'json',
        contentType: 'application/json',
        type: 'POST',
        data: {
          "email" : $('#email').val()
        },
        success : function(response) {
          if (response == '-') {
            $('.align').html(
                  `<div class="top-div">
                      <div class="ice-cream">
                        <img src="images/sad-emoji.svg" alt="" width="86px" height="86px">
                      </div>
                    </div>
                    <div class="bottom-div">
                      <p class="sorry-text">Sorry</p>
                      <p class="sorry-content">Victory didn't smile upon you.</p>
                    </div>
                  </div>
                  `);
          }
          $('#code').html(response);
        }
      });
    });

    // const validateEmail = (email) => {
    //   return String(email)
    //     .toLowerCase()
    //     .match(
    //       /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    //     );
    // };

    // $('#email').on('input', function() {
    //   if (validateEmail($(this).val()) == null) {
    //     $('.error').html('Please enter a valid Email');
    //     $('.reg-btn').attr('disabled', true);
    //   } else {
    //     $('.error').html('');
    //     $('.reg-btn').attr('disabled', false);
    //   }
    // });

    // $('.reg-btn').on('click', function() {
    //   $('.register').hide();
    //   $.ajax({
    //     url : 'checkResult.php',
    //     type: 'POST',
    //     data: {
    //       "email" : $('#email').val()
    //     },
    //     success : function(response) {
    //       $('#code').html(response);
    //     }
    //   });
    // });
</script>
</body>
</html>
