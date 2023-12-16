<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IKE100</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet">

    @vite(['resources/css/reset.css','resources/css/app.css'])
</head>

<body class="mx-auto bg-white text-black" style="max-width:400px;">
    <div style="max-width: 100%;aspect-ratio: 8/11; position: relative;text-align: center;">
        <img style="width: 100%;position: absolute;" src="{{asset('images/top-header.jpg')}}">
        <img style="width: 52%;position: absolute;top: 50px;left: 50%;transform: translateX(-50%);"
            src="{{asset('images/IKELog.png')}}">
    </div>

    <main class="mx-4 my-8">
        <h1 class="text-2xl font-light transform scaleY-120 my-0 mb-6 font-serif"
            style="font-family: 'Dela Gothic One', sans-serif;">
            バカで、アホで、面白い、<br>
            死ぬまでにしたい100のこと！
        </h1>

        <div class="my-5 font-medium font-serif" style="font-family: 'Noto Serif JP', serif;;">
            明確な目標がなくてもいい。<br>
            誰に否定されることでもいい。<br>
            どれだけくだらないことでもいい。<br>
            <br>
            自分が少しでもやりたいと思ったことを100個集めれば、
            きっとそれは、1つに結果になり、1つの肯定になり、1つの価値になると思う。
        </div>

        <div class="text-lg mt-6 pr-8 text-right font-serif" style="font-family: 'Noto Serif JP', serif;">
            by ike
        </div>


        <div class="container mx-auto mt-8 pb-20">
            <h1 class="text-2xl font-semibold mb-4">やりたいリスト</h1>
            @foreach ($projects as $project )
            <a href="{{route('top.show',['title' => $project->title])}}"
                class="flex items-center mb-2 text-xl py-2 rounded-sm hover:bg-blue-100">
                <div class="mx-2">
                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                        <g fill='none' fill-rule='evenodd'>
                            <path
                                d='M24 0v24H0V0h24ZM12.594 23.258l-.012.002-.071.035-.02.004-.014-.004-.071-.036c-.01-.003-.019 0-.024.006l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.016-.018Zm.264-.113-.014.002-.184.093-.01.01-.003.011.018.43.005.012.008.008.201.092c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.003-.011.018-.43-.003-.012-.01-.01-.184-.092Z' />
                            <path fill='#09244BFF'
                                d='M6 3a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3v-5a1 1 0 1 0-2 0v5a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h8a1 1 0 1 0 0-2H6Zm15.358 3.045a1 1 0 0 0 .375-1.363 1.01 1.01 0 0 0-1.364-.375c-.353.2-.694.424-1.03.65-.626.42-1.491 1.039-2.463 1.847-1.642 1.366-3.614 3.29-5.239 5.718a9.855 9.855 0 0 0-1.746-1.784c-.427-.333-.902-.66-1.415-.846h-.001a1 1 0 0 0-.689 1.878c.025.01.37.15.876.545.578.45 1.376 1.239 2.146 2.557a1 1 0 0 0 1.733-.01c1.584-2.791 3.787-5 5.614-6.52.91-.757 1.72-1.336 2.298-1.724.295-.199.595-.394.904-.572Z' />
                        </g>
                    </svg>
                </div>
                <label>{{$project->title}}</label>
            </a>
            @endforeach

        </div>
    </main>
</body>

</html>