<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>ログイン</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div>
            <label for="email">メールアドレス:</label>
            <input id="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit">ログイン</button>
    </form>
    <p><a href="{{ route('register') }}">新規ユーザー登録はこちら</a></p>
</body>
</html>
