<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>つながるチャット</title>
<link href="css/chat.css" rel="stylesheet">
</head>
<body>

<!-- コンテンツ表示画面 -->

<div>
    <div class="chat-container">
        <div class="line__title">
            つながるチャット
        </div>
        <div class="line__contents scroll">
            <!-- ここにチャットを追加していく -->
        </div>
        <!-- ▲会話エリア ここまで -->
    </div>

    <div id="chat-box"></div>
    名前：<input type="text" id="uname">
    <div>
        <textarea id="text" cols="30" rows="10" placeholder="その気持ち、シェアしよう"></textarea>
        <button id="send">送信</button>
 
<select id="stamp-select">
    <option value="">スタンプを選択</option>
    <option value="img/love.png">LOVE</option>
    <option value="img/ありがとう.jpeg">ありがとう</option>
    <option value="img/おめでとう.png">おめでとう</option>
    <option value="img/しんどい.png">しんどい</option>
    <option value="img/疲れた.png">疲れた</option>

</select>

<div id="output" class="scroll"></div>
</div>

<!--/ コンテンツ表示画面 -->

<!-- 以下JavaScript領域 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- 以下Firebase -->
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-analytics.js";
    import { getDatabase, ref, push, set, onChildAdded } from "https://www.gstatic.com/firebasejs/10.8.1/firebase-database.js";

    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries
  
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyDA95SMW8K25NrqRW5HzYWWmBPMM9EWDOY",
      authDomain: "sample-88409.firebaseapp.com",
      projectId: "sample-88409",
      storageBucket: "sample-88409.appspot.com",
      messagingSenderId: "894618723971",
      appId: "1:894618723971:web:f141069d8e81439b3b9db6",
      measurementId: "G-6VQB0SXVWQ"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    const db  = getDatabase(app); // RealtimeDBに接続
    const dbRef = ref(db, "chat"); // RealtimeDB内の"chat"を使用

    // データ登録(Click)
    $("#send").on("click", function() {
        const msg = {
            uname: $("#uname").val(),
            text: $("#text").val(),
            timestamp: new Date().toLocaleString(navigator.language, {timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone}) 
             // 送信された日時を追加（ユーザーのローカルタイムゾーンに変換）
        
        };
        const newPostRef = push(dbRef); // ユニークKEYを生成
        set(newPostRef, msg); // "chat"にユニークKEYをつけてオブジェクトデータを登録
    });
    
    //スタンプ表示
    $("#stamp-select").change(function() {
        const stampValue = $(this).val();
        if (stampValue !== "") {
            const msg = {
                uname: $("#uname").val(),
                text: "",
                timestamp: new Date().toLocaleString(navigator.language, {timeZone: Intl.DateTimeFormat().resolvedOptions().timeZone}),
                stamp: stampValue
            };
            const newPostRef = push(dbRef);
            set(newPostRef, msg);
        }
    });

    onChildAdded(dbRef, function(data) {   
        const msg  = data.val(); // オブジェクトデータを取得し、変数msgに代入
        // 表示用テキスト・HTMLを作成
        // 送信日時を表示
        let html = `
        <div class="message">
            <div class="message__uname">${msg.uname}</div>
            <div class="message__text">${msg.text}</div>
            <div class="message__timestamp">${msg.timestamp}</div> 
    `;
    
    if (msg.stamp) {
        html += `<img src="${msg.stamp}" class="message__stamp">`;
    }
    html += '</div>';
    $("#output").append(html);

    });
</script>

</body>
</html>