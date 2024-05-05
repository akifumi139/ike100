@extends('blog.layouts.app')

@section('content')
  <div class="container px-8 mx-auto xl:px-5 max-w-screen-lg pb-5">
    @auth
      <div class="fixed bottom-6 md:bottom-20 right-4 z-100">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-5 rounded-full shadow-md"
          href="{{ route('blog.editor.index') }}">
          編集ページへ
        </a>
      </div>
    @endauth
    {{ $articles->links('blog.layouts.pagination') }}
    <div class="grid gap-10 md:grid-cols-2 lg:gap-10 mb-10">
      @foreach ($articles as $article)
        <a href="{{ route('blog.show', ['id' => $article->id]) }}">
          <div class="group cursor-pointer">
            <div class="overflow-hidden rounded-md bg-gray-100 transition-all hover:scale-105">
              <img
                class="object-cover transition-all min-h-32 max-h-72 mx-auto"src="{{ asset($article->header_image ?? 'images/ike-log.png') }}">
            </div>
            <div>
              <div class="text-lg font-semibold leading-snug tracking-tight mt-2 flex justify-between">
                <span
                  class="bg-gradient-to-r md:text-xl from-lime-200 to-lime-100 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-300 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                  {{ $article->title }}
                </span>
                <span class="border-2 border-amber-800 rounded-full px-2">{{ $article->project->title }}</span>
              </div>
              <div class="mt-1 flex justify-end text-gray-800">
                {{ $article->updated_at->format('Y.m.d') }}
              </div>
            </div>
          </div>
        </a>
      @endforeach
    </div>
    {{ $articles->links('blog.layouts.pagination') }}
  @endsection
