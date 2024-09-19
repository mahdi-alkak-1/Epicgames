@extends('layouts.header')

@section('content')
    <div class="flex">
        
        <div class="flex flex-col text-white md:text-3xl md:pl-24 space-y-7 w-1/4 md:w-1/5">
            <a href="/store" class="ml-7 md:-ml-4 space-x-3 md:space-x-5 border border-transparent hover:border-cyan-500 self-start rounded-lg p-2 hover:bg-yellow-500">
                <i class="ri-store-line"></i>
                <span>Store</span>
            </a>
          
            </a>
            @if(Auth::check() && Auth::user()->is_admin)
                <div class="font-bold bg-gray-500 self-start custom-shadow1 px-2 py-2 rounded-xl text-xs md:text-lg ml-6 md:ml-0 text-white">
                    <a href="{{ route('store.create') }}">Upload Game</a>
                </div>
            @endif

            <div class="font-bold bg-gray-500 self-start custom-shadow1 px-2 py-2 rounded-xl text-xs md:text-lg ml-6 md:ml-0 text-white">
                Have Fun!
            </div>
        </div>

        <!-- Coming Soon Section -->
        <div class="container mx-auto custom-shadow1 lg:grid grid-cols-4 space-y-6 rounded-lg ml-2 mr-2 pb-6">
            @foreach($comingSoonPosts as $post)
                <div class="flex flex-col items-center justify-center mt-6">
                    <img src="/images/{{ $post->image }}" alt="{{ $post->title }}" class="w-[250px] h-[250px] rounded-lg">
                    <span class="bg-yellow-500 px-[77px]">Coming Soon</span>
                    <a href="/store/{{ $post->id }}" class="text-white font-bold hover:text-gray-500">{{ $post->title }}</a>
                    <span class="text-white text-xs">{{ $post->available_at }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Free to Play Section -->
    <div class="read-to-play lg:grid grid-cols-4 gap-6 custom-shadow1 rounded-lg ml-[120px] mr-[10px] md:ml-[300px] md:mr-2 mt-4 pb-8">
        @foreach ($freeToPlayPosts as $post)
            <div class="flex flex-col items-center justify-center mt-2">
                <img src="/images/{{ $post->image }}" alt="{{$post->title}}" class="w-[250px] h-[250px] rounded-lg">
                <span class="bg-yellow-500 px-[82px]">Free to play</span>
                <a href="/store/{{ $post->id }}" class="text-white font-bold hover:text-gray-500">{{ $post->title }}</a>
                <a href="/store/{{ $post->id }}" class="border border-green-400 bg-white text-green-500 hover:bg-green-600 hover:text-black p-2 rounded-lg">Get me!</a>
            </div>
        @endforeach
    </div>

    <!-- Pay to Play Section -->
    <div class="read-to-play lg:grid grid-cols-4 gap-6 custom-shadow1 rounded-lg ml-[120px] mr-[10px] md:ml-[300px] md:mr-2 mt-4 pb-8">
        @foreach ($payToPlayPosts as $post)
            <div class="flex flex-col items-center justify-center mt-2">
                <img src="/images/{{ $post->image }}" alt="{{$post->title}}" class="w-[250px] h-[250px] rounded-lg">
                <span class="bg-yellow-500 px-[85px]">Pay to play</span>
                <a href="/store/{{ $post->id }}" class="text-white font-bold hover:text-gray-500">{{ $post->title }}</a>
                <a href="/store/{{ $post->id }}" class="text-red-600 border border-black hover:text-black rounded-lg bg-white p-2 mt-2 hover:bg-red-600">Price: {{ $post->price }}$</a>
            </div>
        @endforeach
    </div>
    
@endsection
