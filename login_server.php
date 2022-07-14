<?php
session_start();
include('db.php');

if(isset($_POST['user_id']) && isset($_POST['pass1']))
{
    // 보안을 더욱 강화(시큐어코딩, 보안코딩)
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $pass1 = mysqli_real_escape_string($db, $_POST['pass1']);


    // 에러를 체크
    if(empty($user_id))
    {
        header("location: login_view.php?error=아이디가 비어있어요");
        exit();
    }

    else if(empty($pass1))
    {
        header("location: login_view.php?error=비밀번호가 비어있어요");
        exit();
    }

    else
    {
        // 로그인 시키는 코딩
        $sql = "select * from member where mb_id = '$user_id'";
        $result = mysqli_query($db, $sql);

        if(mysqli_num_rows($result) === 1)
        {
            // 1. 해당열을 가져옴
            // 2. 가져올 때 배열의 형태로 가져오는구나
            // 3. print_r은 배열을 출력해주는 함수구나
            // 4. echo 쪼개서 가져올 수 있구나
            // 5. .은 연결 할 수 있음

            $row = mysqli_fetch_assoc($result);
            $hash = $row['password'];

            if(password_verify($pass1, $hash))
            {
                $_SESSION['mb_id'] = $row['mb_id'];
                $_SESSION['mb_nick'] = $row['mb_nick'];
                $_SESSION['no'] = $row['no'];

                header("location: main_view.php");
                exit();
            }
            else
            {
                header("location: login_view.php?error=로그인에 실패하였습니다");
                exit();
            }
            
        }
        else
        {
            // 에러
            header("location: login_view.php?error=아이디가 잘못 입력되었습니다");
        exit();
        }
    }
}
else
{
    // 에러 메세지
    header("location: login_view.php?error=알 수 없는 오류가 발생하였습니다");
    exit();
}

?>