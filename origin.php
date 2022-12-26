<!DOCTYPE HTML>
<!--
	Forty by php5 UP
	php5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (php5up.net/license)
-->
<head>
		<title>Fall Guys情報站</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/icon.ico" type="image/x-icon" />
		<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-app.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-analytics.js"></script>
		<script src="https://www.gstatic.com/firebasejs/8.2.1/firebase-firestore.js"></script>
		<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>
		<script src="https://smtpjs.com/v3/smtp.js"></script>
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    
    <script type="text/javascript">
		  // Your web app's Firebase configuration
		  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
		  var firebaseConfig = {
			apiKey: "AIzaSyDG--ZfC8gcLOx80a79P55nSORPYjRbHxU",
			authDomain: "test-php091.firebaseapp.com",
			databaseURL: "https://test-php091.firebaseio.com",
			projectId: "test-php091",
			storageBucket: "test-php091.appspot.com",
			messagingSenderId: "368014060680",
			appId: "1:368014060680:web:46a7823ae5b0679731033d",
			measurementId: "G-FT80BGGE3W"
		  };
		  // Initialize Firebase
		  firebase.initializeApp(firebaseConfig);
		  firebase.analytics();
		        
		  var db = firebase.firestore();
      
      function feedback(){ //新增使用者回饋
				db.collection("Feedback").doc(time).set({ //以時間記錄使用者回饋
					姓名:name,
					email:email,
					訊息:message
				});
			}
      
      function report(){
        db.collection("Report").doc(retime).set({ //以時間記錄舉報
					舉報玩家編號:replayer,
					被舉報玩家編號:player,
					舉報時間:retime,
          舉報類型:recate,
          舉報簡述:remessage,
          舉報相關圖檔:file
				});
      }
      
       function check() {
          // Google reCAPTCHA 網站密鑰
          $data['secret'] = '6Le4AQcaAAAAAPWVtmiR9UBu6Hc31hDBLHFbdn0S';
          $data['response'] = $_POST['g-recaptcha-response'];
          $ch = curl_init();
          // 使用CURL驗證
          curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
          curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
          curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
          $result = curl_exec($ch);
          curl_close($ch);
          // 解密
          $result = json_decode($result, true);

          // 檢查是否通過驗證
          if ( ! isset($result['success']) || ! $result['success']) {
              // 驗證失敗
              return false;
          } else {
              // 驗證成功
              return true;
          }
      } 
      
	   function sendMail() {		//mail寄送
	   let fields = {	//抓值
		replayer: document.querySelector("#replayer").value,
		player: document.querySelector("#player").value,
		retime: document.querySelector("#meeting-time").value,
		style: document.querySelector("#report-category").value,
		remessage: document.querySelector("#remessage").value,
	   };
	   let body = '舉報玩家信箱：' + fields.replayer + '<br>'
				  + '被舉報玩家：' + fields.player + '<br>'
				  +'舉報時間：' + fields.retime + '<br>'
				  +'舉報類型：' + fields.style + '<br>'
				  +'舉報簡述：' + fields.remessage + '<br>';
	   Email.send({
		SecureToken: "fe5ebe2c-8688-4d75-a9c3-112126fda08f",	//我的token
		To: 'yuroulin1018@gmail.com',		//收件人
		From: fields.replayer,		//寄件人
		Subject: fields.retime,	//主旨
		Body: body,		//內容
	   }).then(
		message => alert(message)
	   );
	  }
	  
    </script>
    
    <style> 
      /* The Modal (background) */ 
      .modal { 
          display: none; /* Hidden by default */ 
          position: fixed; /* Stay in place */ 
          z-index: 10005; /* Sit on top */ 
          padding-top: 20px; /* Location of the box */ 
          padding-bottom: 1px;
          left: 0; 
          top: 0; 
          width: 100%; /* Full width */ 
          height: 100%; /* Full height */ 
          overflow: auto; /* Enable scroll if needed */ 
          background-color: rgb(0,0,0); /* Fallback color */ 
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */ 
      } 
       
      /* Modal Content */ 
      .modal-content { 
          background-color: rgba(36, 41, 67); 
          padding:0px 10px 5px 20px;
          margin: auto; 
          width: 90%; 
      } 
       
      /* The Close Button */ 
      .close { 
          color: #aaaaaa; 
          float: right; 
          font-size: 30px; 
          font-weight: bold; 
      } 
       
      .close:hover, 
      .close:focus { 
          color: #000; 
          text-decoration: none; 
          cursor: pointer; 
      }   
       
     </style>
    
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<a href="index.php" class="logo"><strong>Fall Guys</strong> <span>情報站</span></a>
						<nav>
							<a href="#menu">選單 Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<ul class="links">
							<li><a href="index.php">首頁 Home</a></li>
							<li><a href="raiders.php">攻略 Raiders</a></li>
							<li><a href="origin.php">起源 Origin</a></li>
							<li><a href="communicate.php">交流 Communicate</a></li>
						</ul>
						<ul class="actions stacked">
							<li><a href="https://store.steampowered.com/app/1097150/Fall_Guys_Ultimate_Knockout/" class="button primary fit">開始遊戲 Get Started</a></li>
							<li><button class="button fit" id="myBtn">線上玩家舉報專區 Report</button></li>
              <li><a href="readme.php" class="button fit">網站使用說明 Readme</a></li>
						</ul>
					</nav>
        
         <!-- The Modal --> 
        <div id="myModal" class="modal">
        
        <!-- Modal content --> 
          <div class="modal-content"> 
            <span style="float: left; padding-top:10px;"><h3>線上舉報</h3></span><span class="close">&times;&nbsp;</span>
            <form method="post" action="#" enctype="multipart/form-data">
								<div class="fields row">
										<div class="fields col-4 col-11-xsmall">
											<label for="舉報玩家信箱">舉報玩家信箱</label>
											<input type="text" name="replayer" id="replayer" required placeholder="請輸入信箱"/>
										</div>
                    <div class="fields col-3 col-11-xsmall">
											<label for="舉報玩家編號">被舉報玩家</label>
											<input type="text" name="player" id="player" required placeholder="請輸入編號"/>
										</div>
                    <div class="fields col-4 col-11-xsmall">
                      <label for="舉報時間">舉報時間</label>
                      <input type="datetime-local" name="meeting-time" required id="meeting-time" style="color:black;height:40px"/>
										</div>

                  <div class="fields col-11">
											<br /><label for="舉報類型">舉報類型</label>                    
                      <select name="report-category" id="report-category" required>
													<option value="">- 選擇類型 -</option>
													<option value="玩家地圖外掛">玩家地圖外掛</option>
													<option value="玩家影響遊玩體驗">玩家影響遊玩體驗</option>
													<option value="疑似病毒入侵">疑似病毒入侵</option>
											</select>
                  </div>
                  <div class="fields col-11">
											<br /><label for="舉報簡述">舉報簡述</label>                    
                      <textarea name="remessage" id="remessage" rows="1" required></textarea>
                  </div>
                  <div class="fields col-11">
											<br /><label for="舉報相關圖檔">舉報相關圖檔(限JPG, GIF或PNG檔)</label>                    
                      <input type="file" name="abc" accept=".jpg, .gif, .png" value="瀏覽...">
                  </div>
				  
                </div>
				<div class="fields col-11" style="padding-left:20px;">
					<div class="g-recaptcha" data-sitekey="6Le4AQcaAAAAAL1OdzW8mGzJqAXOYMZNEPL86c5_"></div>
                </div>
				<ul class="actions">
                 	<li><input type="submit" value="Send Message" class="primary" onclick="sendMail(), check()" /></li>
					<li><input type="reset" value="Clear" /></li>
				</ul>
			</form>
            
            <?php
            
              if (isset($_POST["replayer"])&&isset($_POST["player"])&&isset($_POST["meeting-time"])&&isset($_POST["report-category"])){
                $replayer = $_POST["replayer"];
                $player = $_POST["player"];
                $retime = $_POST["meeting-time"];
                $recate = $_POST["report-category"];
                $remessage = $_POST["remessage"];
                $file = $_FILES["abc"]["name"];
                move_uploaded_file($_FILES["abc"]["tmp_name"],"download/".$_FILES["abc"]["name"]);    //下載舉報圖檔
              }   
              
            ?>
            
          </div>          
        </div>  
        
        <script> 
          // Get the modal 
          var modal = document.getElementById('myModal'); 
           
          // Get the button that opens the modal 
          var btn = document.getElementById("myBtn"); 
           
          // Get the <span> element that closes the modal 
          var span = document.getElementsByClassName("close")[0]; 
           
          // When the user clicks the button, open the modal  
          btn.onclick = function() { 
              modal.style.display = "block"; 
          } 
           
          // When the user clicks on <span> (x), close the modal 
          span.onclick = function() { 
              modal.style.display = "none"; 
          } 
        </script> 
        
        <script>
                    
          var replayer="<?php echo $replayer;?>";
          var player="<?php echo $player;?>";
          var retime="<?php echo $retime;?>";
          var recate="<?php echo $recate;?>";
          var remessage="<?php echo $remessage;?>";
          var file="<?php echo $file;?>";
          report();
          
        </script>
        
				<!-- Main -->
					<div id="main" class="alt">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Origin</h1>
									</header>
									<span class="image main"><img src="images/pic14.png" alt="" /></span>
									<p>《糖豆人：終極淘汰賽》（英語：Fall Guys: Ultimate Knockout）是一款由Mediatonic開發、Devolver Digital發行的大逃殺遊戲，於2020年8月4日在Microsoft Windows和PlayStation 4平台發行。</p>
                  <p>這款遊戲在開發團隊討論另一個項目時產生，當時一位成員隨口說了一句話，說這讓他想起了《百戰百勝王》和《勇敢向前衝》。從那時起，他就開始為後來的《糖豆人》創作宣傳稿。實際的角色設計靈感來自於vynal玩具的外觀本作於2019年6月在E3上公布，面向Microsoft Windows和PlayStation 4，於2020年8月4日發售。在發布之前，官方宣布《糖豆人》將對PlayStation Plus會員免費。</p>
								  <p>8月22日，中國大陸營運宣布Bilibili拿下本作手機平台遊戲的獨家代理，並於同日開放預約；這一舉措使得其成為率先公開該作手機版的資訊源。</p>
                  <p>根據匯總媒體Metacritic的資料，《糖豆人：終極淘汰賽》獲得了「普遍好評」。</p>
                  <p>《The Gamer》的Sam Butler稱讚遊戲擁有「明亮的視覺效果」、「刺激的遊戲玩法」和「出色的配樂」。在發布前一周的封閉測試期間，《糖豆人》一度成為Twitch上最受關注的遊戲，同時也成為Steam上第六款最暢銷的遊戲（可預購）。遊戲發布24小時內，吸引了超過150萬玩家。</p>
                  <hr>
                  <span class="image main"><img src="images/pic15.png" alt="" /></span>
									<p>人氣遊戲《Fall Guys：Ultimate Knockout》自上月推出即深得一眾玩家歡心，其新穎玩法及繽紛可愛的畫風，讓不少人玩完一關又一關。早前遊戲的設計師及英術師受訪談及創作糖豆人的幕後秘辛，而近日更在Twitter公布糖豆人的身體構造，更於公布前後辦網絡公投與網民互動，出色公關技巧獲大讚「識玩」。</p>
                  <p>《Fall Guys》首席設計師 Joe Walsh早前曾表示，設計糖豆人時最重要的目標就是要讓他們看起來非常搞笑及充滿娛樂性，故特意設計了小小的腳及大大的手，令他們跌倒時動作更誇張。而首席美術師 Rob Jackson亦預告，已經設計好揭露糖豆人服裝下真實樣貌的造型。至前日（24日）《Fall Guys》的官方Twitter發文邀請網民投票，稱設計師已準備好公布糖豆人的內部結構，讓網民選擇「展示吧，我準備好了」或是「不要讓我看，刪除它」，最終逾8成網民均以選票表達希望了解糖豆人的構造。</p>
                  <p>《Fall Guys》隨即於同日公布糖豆人結構圖及身體資料，直指「我們不會收回帖文」。帖文資料顯示，糖豆人足足有6呎（183厘米）高，但軟萌的外表包裹着的，竟是讓人感到驚悚的骨骼構造。圖片可見，糖豆人的骨骼與人類基本類近，惟頸部及膝蓋部分明顯較長，而眼睛則從頭骨伸出，配上官方帖文的一句「這個糖豆人很開心，你看看他的眼睛就知」，更顯獵奇味道。</p>
                  <p>帖文引來千萬玩家回應，短短兩日已獲逾18萬次轉發及近48萬次讚好，有玩家笑言看到糖豆人的真身即時「滅火」，「我沒有那麼喜歡這遊戲了」、「為什麼要告訴我？現在他在我腦中揮之不去」，不過也有玩家對糖豆人的圖片讚好，「好恐怖！但我喜歡」。官方Twitter見糖豆人結構圖成功引起討論，未有因而收手，反而再辦公投，給玩家3個選項，分別是「我們可以當上一條帖文是笑話，再也不提這事」、「他就是這樣吧，我們接受這設定，但是再也不討論了」以及「我們接受他的真實的形態，讓粉絲以此繼續創作吧」。帖文再次引來40多萬粉絲投票，玩家們似乎對糖豆人非常包容，最終選項3獲得近6成票數，看來即將會有不少以糖豆人原型為題材的二次創作湧現了！</p>
                  <p>或許是看到糖豆人成為不少人的惡夢，也讓開發團隊內部意見分裂（？），隔日官方又放出了首席美術 Ash Kerins 建議的設定：Q彈的外型柔軟的心、笨拙的雙腳，以及具有理想抱負的黃隊靈魂。</p>
                </div>
							</section>
              

					</div>

				<!-- Contact -->
					<section id="contact">
						<div class="inner">
							<section>
                <h3>網頁建議回饋</h3>
                每週日或週二會進行網頁更新，<br />
                如果對於網頁有什麼建議，<br />
                或有什麼功能遺漏的可以告訴我喔！<br /><br />
								<form method="post" action="#">
									<div class="fields">
										<div class="field half">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" required />
										</div>
										<div class="field half">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" required />
										</div>
										<div class="field">
											<label for="message">Message</label>
											<textarea name="message" id="message" rows="6" required></textarea>
										</div>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send Message" class="primary" /></li>
										<li><input type="reset" value="Clear" /></li>
									</ul>
								</form>
                <?php
                  if (isset($_POST["name"])&&isset($_POST["email"])&&isset($_POST["message"])){
                    $name=$_POST["name"];
                    $email=$_POST["email"];
                    $message=$_POST["message"];
                    date_default_timezone_set("Asia/Taipei"); //以時間紀錄回覆
                    $time=date("Ymd h:i");
                  }
                ?>
                <script>
                  var time="<?php echo $time;?>";
                  var name="<?php echo $name;?>";
                  var email="<?php echo $email;?>";
                  var message="<?php echo $message;?>";
                  feedback();
                </script>
							</section>
							<section class="split">
								<section>
									<div class="contact-method">
										<span class="icon solid alt fa-envelope"></span>
										<h3>Email</h3>
										<a href="#">yuroulin1018@gmail.com</a>
									</div>
								</section>
								<section>
									<div class="contact-method">
										<span class="icon solid alt fa-phone"></span>
										<h3>Phone</h3>
										<span>Tel：097070-2997<br />
                    Home：0800-092-000<br /></span>
									</div>
								</section>
								<section>
									<div class="contact-method">
										<span class="icon solid alt fa-home"></span>
										<h3>Address</h3>
										<span>112 台北市北投區明德路365號<br /></span>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3612.5351471813824!2d121.51887891449819!3d25.117592383933342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442ae8bc54ebc79%3A0xfd2a9d659e97b078!2z5ZyL56uL6Ie65YyX6K2355CG5YGl5bq35aSn5a245qCh5pys6YOo!5e0!3m2!1szh-TW!2stw!4v1609378556916!5m2!1szh-TW!2stw" width="250" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
									</div>
								</section>
							</section>
						</div>
					</section>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<ul class="icons">
								<li><a href="https://twitter.com/FallGuysGame" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="https://www.facebook.com/FallGuysUltimateKO/" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="https://www.instagram.com/fallguysultimateknockout.game/" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="https://github.com/topics/fall-guys" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
								<li><a href="https://fallguys.com/" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; 魚肉想要吃雞骨份有限公司</li><li>Design：<a href="https://php5up.net">林妤柔 072214121</a></li>
							</ul>
						</div>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</php>