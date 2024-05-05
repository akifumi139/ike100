@extends('blog.layouts.app')

@section('content')
  <div class="px-2 md:px-8 mx-auto pb-5 lg:py-8">
    <div class="mx-auto md:max-w-screen-md">
      <div class="flex flex-col w-36 gap-2">
        <a class="py-2 px-6 text-gray-800 border-2 border-gray-300 rounded-full shadow-xl transition duration-500 ease-in-out hover:bg-black hover:text-white hover:border-black"
          href="{{ route('blog.index') }}">
          <span class="tracking-widest font-bold">一覧に戻る</span>
        </a>
        @auth
          <a class="py-2 px-6 bg-blue-500 border-2 text-white border-blue-500 rounded-full shadow-xl hover:bg-white hover:text-blue-500 hover:border-blue-500"
            href="{{ route('blog.editor.edit', ['id' => $article->id]) }}">
            <i class="fa-solid fa-pen-to-square md:text-2xl me-1"></i>編集する
          </a>
        @endauth

      </div>
      <div class="mt-6 md:mt-0">
        <div class="flex justify-center w-full">
          <img class="object-cover"src="{{ asset($article->header_image ?? 'images/ike-log.png') }}">
        </div>

        <div class="flex justify-between mt-1 items-center">
          <div class="m-1 flex justify-start text-gray-800 text-lg">
            {{ $article->updated_at->format('Y.m.d') }}
          </div>
          <span class="border-2 border-amber-800 rounded-full px-2">{{ $article->project->title }}</span>
        </div>

        <div class="flex justify-center mb-3 mt-6 md:mt-2">
          <h1 class="md:w-96 text-center text-3xl font-semibold tracking-tight lg:text-4xl leading-snug">
            {{ $article->title }}
          </h1>
        </div>
        <article
          class="prose mx-auto prose-a:text-blue-600 [&_iframe]:aspect-video [&_iframe]:md:my-2 [&_iframe]:mx-auto [&_iframe]:md:w-5/6">
          {!! $article->content !!}
        </article>
      </div>
    </div>
  </div>
@endsection
