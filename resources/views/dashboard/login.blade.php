<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKE100ダッシュボード</title>
    @vite(['resources/css/reset.css','resources/css/app.css'])

</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center mt-20">
        <div class="bg-white p-8 rounded-md w-full sm:w-[400px]">
            <h1 class="text-3xl text-center text-sky-500 font-bold mb-6">
                IKE100
            </h1>
            <form action="{{ route('dashboard.login') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label class="block text-gray-700 font-bold mb-1" for="name">
                        ログインID
                    </label>
                    <input
                        class="border rounded-md py-2 px-4 w-full focus:outline-none text-black bg-sky-100 focus:border-sky-400"
                        id="name" type="text" name="name" placeholder="ログインID" required>
                </div>
                <div class="mb-5">
                    <label class="block text-gray-700 font-bold mb-1" for="password">
                        パスワード
                    </label>
                    <input
                        class="border rounded-md py-2 px-4 w-full focus:outline-none text-black bg-sky-100 focus:border-sky-400"
                        id="password" type="password" name="password" placeholder="パスワード" required>
                </div>
                @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
                @endif
                @error('error')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <div class="text-center mt-6">
                    <button class="bg-sky-500 py-2 px-5 rounded font-bold text-base hover:bg-sky-800"
                        type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>