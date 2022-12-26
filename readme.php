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
										<h1>Readme</h1>
									</header>
                  <h3>網頁說明（使用）</h3>
                  <div>
                    <p>冬日來臨，無論是學生、上班族、年長者經常待於家中，百般無趣的思考人生，要如何讓我們枯燥乏味的生活多一分色彩呢？</p>
                    <p>點選左上角的「FALL GUYS情報站」進入情報站的網頁首頁......<br />
                    攻略查看、選擇下方遊戲圖示，即可進入遊戲的攻略頁面<br />
                    　　　　　選擇欲了解地圖類型，即可獲得地圖提示速解資訊，且可以於內部選擇其他類型進行轉換<br />
                    玩家討論、點選右上角的功能列表，進入交流頁面<br />
                    　　　　　玩家可以於交流頁面找到最新的討論，也可以新增討論，甚至回覆<br />
                    玩家舉報、於每一個頁面的右上角功能列表中，點選線上玩家舉報，填寫表單送出，即可「寄發mail」完成即時舉報<br />
                    玩家遊戲、若是玩家想要進行遊戲，也可以透過右上角的功能列表，選擇開始遊戲進行遊玩（這是一款付款的遊戲，通常會叫你付款唷！）<br />
                    遊戲了解、遊戲的概念以及想法往往是玩家們好奇，且想要了解的方向，於功能列表中也提供了origin頁面，能夠從這裡看出製作方的想法<br />
                    ※ 備註：網站中的舉報、回覆訊息、新增討論皆有設置「我不是機器人」的防禦功能
                    </p>
                  </div>
                  <h3>想法說明</h3>
                  <div>
                    <p>我是一個遊戲愛好者，經常玩第五人格、湯姆貓與傑利鼠、跑跑卡丁車、among as等等多人互動的遊戲，<br />
                    在遊戲中，可以感受到其他玩家們的熱情，遊玩的同時，也能夠與其他玩家產生共鳴（想要贏的慾望），<br />
                    日常的壓力可以在與這些玩家的互動交流中被紓解，<br />
                    所以我想用我近期所玩的這一款FALL GUYS來做一個網頁報告（實質遊戲推廣）！<br /><br />
                    有人告訴過我，遊戲不能解決什麼，遊戲是個浪費時間的東西，確實！但是......<br />
                    我因為遊戲，而認識了更多不一樣的人！
                    </p>
                  </div>
                  <h3>個別網頁說明</h3>
                  <div>
                    <ol>
                      <li>index.php：情報站首頁</li>
                      <li>raiders.php：Fall Guys情報站的攻略頁，玩家可以針對想要了解的地圖類型，查看提示及規則</li>
                      <li>detail.php：專用於raiders攻略頁使用的詳細頁，將對應地圖類型放到資料庫，進行攻略呈現</li>
                      <li>origin.php：對於Fall Guys這款遊戲的起源，以及當時製作方的概念、想法</li>
                      <li>communicate.php：為本網站主要的功能頁（討論區），其主要功能有<br />
                          ＊線上舉報專區　玩家可以於右上的功能列表中點選，填寫表單即可寄發mail，進行即時遊戲舉報（每頁都有的功能）<br />
                          ＊尋找話題　　　玩家可以針對討論的關鍵字（keyword）及討論類型，進行話題查詢<br />
                          ＊論壇討論專區　所有玩家以及官方小編的討論都會放置在此，且可以即時更新<br />
                          ＊討論回覆　　　配合reply.php進行使用，提供讓玩家們互相討論<br />
                          ＊新增討論　　　每個玩家都可以進行討論<br />
                          ＊網站回饋專區　玩家可以於左下方的表單填寫對於本網站的建議，讓我可以知道還有哪些可以改進的地方（每頁都有的功能）
                      </li>
                      <li>reply.php：輔助coummunicate.php的玩家回覆專區，舒緩程式功能過於集中</li>
                      <li>readme.php：老師要求的網頁說明檔</li>
                    </ol>
                  </div>
				  <h3>參考資料</h3>
                  <div>
                    <ol>
                      <li><a href="https://www.smtpjs.com/">SmtpJS.com</a> ↪ Mail傳送製作</li>
                      <li><a href="https://medium.com/misa-design-%E5%A0%AF%E8%88%9C%E8%A8%AD%E8%A8%88/%E4%B8%8D%E7%94%A8%E6%87%82%E5%BE%8C%E7%AB%AF%E4%B9%9F%E5%8F%AF%E4%BB%A5%E5%AF%AB%E7%B7%9A%E4%B8%8A%E5%AF%84%E4%BF%A1%E5%8A%9F%E8%83%BD-smtpjs-%E9%9D%A0-javascript-%E5%AF%A6%E7%8F%BE-e85875456d01">不用懂後端也可以寫線上寄信功能！SmtpJS 靠 JavaScript 實現</a> ↪ Mail傳送製作</li>
                      <li><a href="https://www.minwt.com/webdesign-dev/js/22122.html">[教學] SMTPJS 利用JavaScript就可實現，線上寄送信件的功能</a> ↪ Mail傳送製作</li>
                      <li><a href="https://www.weiyuan.com.tw/article/64">Google reCAPTCHA 我不是機器人申請教學</a> ↪ 機器人驗證製作</li>
                      <li><a href="https://www.techmarks.com/google-recaptcha/">Google reCAPTCHA我不是機器人，為註冊表單或論壇網站添加安全驗證機制。</a> ↪ 機器人驗證製作</li>
                      <li><a href="https://html5up.net/forty">Forty</a> ↪ 模板使用</li>
                      <li><a href="https://store.steampowered.com/app/1097150/_/">糖豆人：終極淘汰賽</a> ↪ Steam聊天室內容提供</li>
                    </ol>
                  </div>
                  </div>
							  </div>
							</section>
              

					

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