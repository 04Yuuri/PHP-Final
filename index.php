<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>会員登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<!-- <header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">Bridge Heartコミュニティ</a></div>
    </div>
  </nav>
</header> -->
<!-- Head[End] -->

<!-- Main[Start] -->

<h1>ユーザー登録</h1>
    <form action="insert.php" method="post">
        <div class="form-group">
            <label for="nickname">ニックネーム:</label>
            <input type="text" id="nickname" name="nickname" required>
        </div>
        <div class="form-group">
            <label for="gender">性別:</label>
            <select id="gender" name="gender">
                <option value="男性">男性</option>
                <option value="女性">女性</option>
                <option value="その他">その他</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Email">Email:</label>
            <input type="Email" id="Email" name="Email" required>
        </div>
        <div class="form-group">
            <label for="prefecture">お住まいの都道府県:</label>
            <select id="prefecture" name="prefecture">
                <!-- 都道府県のオプションは、例として一部のみ記載 -->
                <option value="東京都">東京都</option>
                <option value="大阪府">大阪府</option>        
            </select>
        </div>
        <div class="form-group">
            <label for="hearing">補聴手段:</label>
            <select id="hearing" name="hearing">
                <option value="補聴器">補聴器</option>
                <option value="人工内耳">人工内耳</option>
                <option value="両耳人工内耳">両耳人工内耳</option>
                <option value="両耳補聴器">両耳補聴器</option>
                <option value="人工内耳検討中">人工内耳検討中</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">子どもの年齢:<input type="text" name="age"></label><br></label>
        </div>
        <button type="submit"><font size="5">登録</button>
     
    <!-- 管理者専用ボタン -->

    <br>
    <br>
    <!-- <button onclick="location.href='./login.php'" >管理者ログイン画面</button> -->
    <a href='./login.php'><font size="3">ログインページ</a>



    </form>

<!-- <form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>会員登録</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>Email：<input type="text" name="email"></label><br>
     <label>お子様の年齢：<input type="text" name="age"></label><br>
     <label>補聴手段：<input type="text" name="hearing"></label><br>
     <label>悩み内容：<textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form> -->
<!-- Main[End] -->


</body>
</html>
