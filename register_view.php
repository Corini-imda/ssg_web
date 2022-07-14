<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>

    <!-- 스타일시트 -->
    <!-- <link rel="stylesheet" type="text/css" href="css/join_black.css"> -->
    <link rel="stylesheet" type="text/css" href="css/join.css">
</head>
<body>
    <!-- form 시작 -->
    <form action="register_server.php" method="post">
    <h2>회원가입</h2>

    <?php if(isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if(isset($_GET['success'])) { ?>
    <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <label>아이디</label>
    <?php if(isset($_GET['user_id'])) { ?>
        <input type="text" placeholder="아이디..." name="user_id" value="<?php echo $_GET['user_id']; ?>">
    <?php } else {?>
        <input type="text" placeholder="아이디..." name="user_id">
    <?php } ?>

    <label>닉네임</label>
    <?php if(isset($_GET['user_nick'])) { ?>
        <input type="text" placeholder="닉네임..." name="user_nick" value="<?php echo $_GET['user_nick']; ?>">
    <?php } else {?>
        <input type="text" placeholder="닉네임..." name="user_nick">
    <?php } ?>

    <label>비밀번호</label>
    <input type="password" placeholder="비밀번호..." name="pass1">

    <label>비밀번호 확인</label>
    <input type="password" placeholder="비밀번호..." name="pass2">

    <button type="submit" name="save">저장</button>
    <a href="login_view.php" class="save">이미 회원이신가요?  (로그인 페이지)</a>

    </form>
    <!-- form 끝 -->

</body>
</html>