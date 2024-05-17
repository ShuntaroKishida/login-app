<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>My Page</title>
</head>
<body>
    <h1>My Page</h1>
    <p>ようこそ {{ Auth::user()->name }} さん</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">ログアウト</button>
    </form>
</body>
</html>
