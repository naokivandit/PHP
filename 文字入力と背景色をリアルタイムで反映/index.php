<?php
$pdo=new PDO('mysql:host=localhost;dbname=;charset=utf8','', ''); //データベースを読み込む

//新規登録
if (isset($_REQUEST['create'])) {
  $sql=$pdo->prepare('
  INSERT INTO (
    )
  VALUES (?,?,?,?)
  ');

  $sql->execute([
    htmlspecialchars($_REQUEST['']),
    htmlspecialchars($_REQUEST['']),
    htmlspecialchars($_REQUEST['']),
    htmlspecialchars($_REQUEST[''])
  ]);
}

//更新
if (isset($_REQUEST['update'])) {
  $sql=$pdo->prepare('
  UPDATE  SET
     = ?,
     = ?,
     = ?,
     = ?
  WHERE  = ?');

  $sql->execute([
    htmlspecialchars($_REQUEST['']),
    htmlspecialchars($_REQUEST['']),
    htmlspecialchars($_REQUEST['']),
    htmlspecialchars($_REQUEST['']),
    htmlspecialchars($_REQUEST[''])
  ]);
}


//削除
if (isset($_REQUEST['delete'])) {
  $sql=$pdo->prepare('
    DELETE FROM
    WHERE =?');
  $sql->execute([
    htmlspecialchars($_REQUEST[''])
  ]);
}

//表示
$sql=$pdo->prepare('
  SELECT * FROM
  LEFT OUTER JOIN
  ON  =
  ORDER BY  ASC'); //テーブルを読み込む
  $sql->execute([]);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>文字入力と背景色をリアルタイムで反映</title>
</head>
<body>
  <table border=1>
    <tr>
      <th></th>
      <th>コード</th>
      <th>名称</th>
      <th>カラー</th>
      <th>イメージ</th>
      <th>？？？</th>
    </tr>

<!-- 新規作成 -->
    <tr>
      <td style="text-align: center;"><input type="submit" value="新規作成" name="create"></td>
        <form action="index.php" method="post">
          <td><input id="" name="" type="text" required  pattern="^[0-9]+$"></td>
          <td><input id="" name="" type="text"  oninput="setImage()" required ></td>
          <td><input id="" name="" type="text" oninput="setImage()" pattern="^[0-9]+$"></td>
          <td><input id="" type="text" style="text-align: center;" readonly></td>
          <td>
            <select name="">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
          </td>
        </form>
    </tr>


<!-- 更新・削除 -->
    <?php foreach ($sql->fetchAll() as $row): ?>
    <tr>
      <form action="index.php" method="post">
        <td>
          <input type="hidden" name="" value="<?=$row[''] ?>"> <!-- 別テーブル -->
          <input type="hidden" name="" value="<?=$row[''] ?>"> <!-- 別テーブルコード -->
          <input type="submit" value="更新" name="update">
          <input type="submit" value="削除" name="delete">
        </td>

        <td><input name="" type="text" value="<?=$row[''] ?>"></td> <!-- コード -->
        <td><input name="" type="text" value="<?=$row[''] ?>" oninput="setImage()"></td> <!-- 名称 -->
        <td><input name="" type="text" value="<?=$row[''] ?>" oninput="setImage()"></td> <!-- 色 -->
        <td><input id=""  type="text" value="<?=$row[''] ?>" style="text-align: center; background: <?=$row[''] ?>" readonly></td> <!-- イメージ -->
        <td>
          <select name="">
            <option value="<?=$row[''] ?>"><?=$row[''] ?></option> <!-- 別テーブルコード、名称 -->
          </select>
        </td>
      </form>
    </tr>
    <?php endforeach; ?>
  </table>


<!-- JavaScript -->
<script type="text/javascript">
function setImage() {
  var getName = document.getElementById("").value;
  var getColor = document.getElementById("").value;
  document.getElementById("").value = getName;
  document.getElementById("").style.backgroundColor = getColor;
}
</script>


</body>
</html>