<!-- ログアウトボタンを押すとsession内の情報を全て削除しログイン画面に戻る -->

<?php
session_start();

$_SESSION = array();
//sessionで使ったcookiesの情報をそれぞれ指定して削除する
if (ini_set('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name() . '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
//sessionを完全に削除する
session_destroy();

setcookie('email', '', time()-3600);

header('Location: login.php');
exit();