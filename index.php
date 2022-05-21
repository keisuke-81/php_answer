
<?php
session_start();
echo $_SESSION["json_file"];
// データまとめ用の空文字変数

?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>口コミサイトを参考にしますか？</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script
  src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"
  integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg=="
  crossorigin="anonymous"></script>

</head>

<body>
  <div class="wrapper1">
    <div class="wrapper">
      <form action="create.php" method="POST">
        <div class='row justify-content-center'>
          <h2 class="col-8 mt-5">口コミサイトを参考にしますか？</h2>
          <fieldset>
            <legend></legend>
            <a href="read.php" >一覧画面</a>
            <div class="row justify-content-left mx-5">
              <div class="col-4">
                name: <input type="text" name="question">
              </div>
              <div class="col-3">
                day: <input type="date" name="day">
              </div>
            </div>
            <!-- セレクトバージョン -->
            <div class="row justify-content-left mx-5">
              <div class="col-6 ">
                <select class="form-select" aria-label="Default select example" name="option" id="option">
                <option selected>下記からお選びください</option>
                <option value=" 参考にしています">参考にする</option>
                <option value=" 参考にしていません">参考にしない</option>
                <option value=" どちらとも言えないです">どちらとも言えない</option>
                </select>
              </div>
              <div class="col-6 font-white ">
                <p>＜みんなの声＞</p>
                <!-- <div id="title"></div> -->
                <div id="text1"></div>
              </div>
            </div>

            <!-- 参考にするサイト----------------- -->
              <div class="row justify-content-left mx-5">
                <div class="col-6">
                <input type="text" name="question2" placeholder="参考にするサイト名">
                </div>
              </div>
          </fieldset>
        </div>
      
      

      <!--ラジオボタンバージョン  -->
      <!-- <div class="row justify-content-center my-2">
          <div class="col-3 form-check form-check-inline ">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
          <label class="form-check-label" for="inlineRadio1">参考にする</label>
          </div>
          <div class="col-3 form-check form-check-inline ">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <label class="form-check-label" for="inlineRadio2">どちらとも言えない</label>
          </div>
          <div class="col-3 form-check form-check-inline ">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
          <label class="form-check-label" for="inlineRadio3">参考にしない</label>
          </div>
      </div> -->

      <!-- 最初にあったボタン--------------------------------------------------------- -->
      <!-- <div class="d-grid  col-3 mx-auto mt-2 mb-5 ">
     <button class="button" id="btn">submit</button>
     </div> -->
     <!-- new buttons-------------------------------------------------------------- -->
     <div class="row">
          <div class="d-grid  col-3 mx-auto my-5 ">
              <button class="btn btn1 btn-outline-danger display-6 value" >参考にする方押してね！</button>
          </div>
          <div class="d-grid  col-3 mx-auto my-5 ">
              <button class="btn btn2 btn-outline-success display-6">参考にしない方押してね！</button>
          </div>
          <div class="d-grid  col-3 mx-auto my-5 ">
              <button class="btn btn3 btn-outline-primary display-6">どちらでもない方押してね！</button>
          </div>
      </div>
      <!-- <button class="btn btn-outline-warning display-6" type="button">submit</button> -->
      
      </form>
      <div class="row justify-content-center ">
        <div class="col-6 chart mb-5">
        <canvas id="mychart-pie"></canvas>
        </div>
      </div>
    </div>
  </div>
  <!-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/css/jquery.mb.YTPlayer.min.css"> -->
    
    
        <!-- <h1>jquery.mb.YTPlayer Sample</h1> -->
        <div id="ytPlayer" data-property="{
          videoURL: 'https://https://www.youtube.com/watch?v=DrHVi0GCFyc',
          autoPlay: true,
          loop: 1,
          mute: true,
          showControls: false,
          showYTLogo: false,
        }"></div>
  
  <!-- <button type="button" class="btn btn-primary">Primary</button> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<canvas id="mychart-pie" width="300px" height="300px"></canvas>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mb.YTPlayer/3.3.9/jquery.mb.YTPlayer.min.js"></script>

<script>
  


// 円グラフの値取得---------------------------------------------------------

        $(".btn1").on("click", function () {
        let option1 = text1;
        option1++;

       // console.log(option1);
        localStorage.setItem("option1", option1);
        });
        $(".btn2").on("click", function () {
            let option2 = text2;
            option2++;

            // console.log(option3);
            localStorage.setItem("option2", option2);
        });
        $(".btn3").on("click", function () {
            let option3 = text2;
            option3++;

            // console.log(option3);
            localStorage.setItem("option3", option3);
        });
        const text1= localStorage.getItem("option1");
        const text2 = localStorage.getItem("option2");
        const text3 = localStorage.getItem("option3");


//youtube再生のための--------------------------------------------------------------

        $(function () {
          $("#ytPlayer").YTPlayer();
        });

//円グラフの表示-----------------------------------------------------------------
let ctx = document.getElementById('mychart-pie');
let myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['参考にする', '参考にしない', 'どちらとも言えない'],
    datasets: [{
      data: [text1, text2, text3],
      backgroundColor: ['#f88', '#484', '#48f'],
      weight: 100,
    }],
  },
});

//みんなの声でcsvファイルからもってきた配列の文字列をランダムに再生する。
let param = JSON.parse('<?php echo $_SESSION["json_file"]; ?>'); 
let rand = Math.floor(Math.random()*param.length);
let rValue = param[rand];
console.log(rValue)

window.addEventListener('DOMContentLoaded', ()=>{
const myMes=param;
setInterval(()=>{
const myRnd = Math.floor( Math.random() * myMes.length );
document.querySelector('#text1').textContent=myMes[myRnd];
},3000);
});
</script>



</script

</body>

</html>