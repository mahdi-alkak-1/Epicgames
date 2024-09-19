@extends('layouts.header')

@section('content')
    <div class="flex">
        <div class=" flex flex-col  text-white md:text-3xl md:pl-24 space-y-7 w-1/4 md:w-1/5 ">
            <a href="/store"
                class=" ml-7 md:-ml-4 space-x-3 md:space-x-5  border border-transparent hover:border-cyan-500 self-start rounded-lg p-2 hover:bg-yellow-500">
                <i class="ri-store-line"></i>
                <span>Store</span>
            </a>
            <a href="#"
                class=" flex ml-7 md:-ml-4 space-x-3 md:space-x-5 z-10 border border-transparent hover:border-cyan-500 self-start rounded-lg p-2 hover:bg-yellow-500 hover:shadow-xl">
                <i class="ri-honour-line"></i>
                <span>Library</span>
            </a>

        </div>
       
        <div class=" coming-soon container mx-auto custom-shadow lg:grid grid-cols-4 space-y-6 bg-blue-900 rounded-lg ml-2 mr-2 pb-6">
            <div class="flex flex-col items-center justify-center  mt-6  ">
                <img src="./images/fifa2025.jpg" alt="fifa" class="w-[250px] h-[250px] rounded-lg ">
                <span class="bg-yellow-500  px-[77px]">Coming Soon</span>
                <span class="text-white font-bold">fc2025</span>
                <span class="text-white text-xs">Free sep 05 - sep 12</span>
            </div>

            <div class="flex flex-col items-center justify-center mt- ">
                <img src="./images/valorant.jpg" alt="fifa" class="w-[250px] h-[250px] rounded-lg">
                <span class="bg-yellow-500  px-[77px]">Coming Soon</span>
                <span class="text-white font-bold  hover:text-red-500">Valorant</span>
                <span class="text-white text-xs">Free sep 06 - sep 13</span>
            </div>
            <div class="flex flex-col items-center justify-center mt-2 ">
                <img src="./images/fortnite_skin.jpg" alt="fifa" class="w-[250px] h-[250px] rounded-lg">
                <span class="bg-yellow-500  px-[77px]">Coming Soon</span>
                <span class="text-white font-bold hover:text-cyan-500">Fortnite</span>
                <span class="text-white text-xs">Free sep 08 - sep 14</span>
            </div>
            <div class="flex flex-col items-center justify-center mt-2 ">
                <img src="./images/gta5.jpg" alt="fifa" class="w-[250px] h-[250px] rounded-lg">
                <span class="bg-yellow-500  px-[77px]">Coming Soon</span>
                <span class="text-white font-bold hover:text-gray-500">Gta 5</span>
                <span class="text-white text-xs">Free sep 09 - sep 14</span>
            </div>

        </div>

    </div>
    <div
        class=" font-bold  bg-yellow-500  inline-block   custom-shadow px-2 py-2 rounded-xl text-xl ml-[120px] md:ml-[272px] mt-12 mr-2 text-white">
        Have Fun!
    </div>
    <div class="read-to-play custom-shadow lg:grid grid-cols-4 gap-6 bg-blue-900 rounded-lg ml-[120px] mr-[10px] md:ml-[265px] md:mr-2 mt-4  pb-8 ">
        <div class="flex flex-col items-center justify-center mt-2">
            <img src="./images/pubg.jpg" alt="fifa" class="w-[250px] h-[250px] rounded-lg">
            <span class="bg-yellow-500  px-[82px]">Free to play</span>
            <span class="text-white font-bold hover:text-gray-500">PUBG</span>
            <span class="text-white text-xs">BattleBus is waiting for you peepeep!</span>
        </div>
    </div>
    
    
    
@endsection
