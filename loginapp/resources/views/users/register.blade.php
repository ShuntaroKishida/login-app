<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>新規ユーザー登録</h1>
    <form method="POST" action="{{ route('register') }}">
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
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password_confirmation">パスワード（再入力）:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit">新規登録する</button>
    </form>
</body>
</html>
