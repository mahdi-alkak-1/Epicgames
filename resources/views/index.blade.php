@extends('layouts.header')
   
@section('content')    
    <!--------- store and library ----->
    <div class="flex">
        @include('layouts.sidebar')
        <div class=" container flex justify-between bg-white border border-slate-700 rounded-full w-[350px] h-[255px] md:w-1/3">
            <div class="container pt-5 pl-4 flex flex-col  font-bold ">
                <span class=" text-[8px]">AVAILABLE NOW</span>
                <p class="leading-tight">The Epic Games Store<br> is on mobile</p>
                <img src="./images/qr_code.png" alt="qr_code" class="w-1/2 mt-3 border border-black rounded-md drop-shadow-lg">
                <p class="mt-3 underline text-xs md:text-lg">Available worldwide on Andrion and iPhone</p>
            </div>
      
            <img src="./images/phone_hand.jpg" alt="mobile" class="w-1/2 items-end opacity-0.1 ">
        </div>
       
        <div id="slideshow-large" class=" container mx-auto  hidden lg:block md:block w-1/3 h-64 relative overflow-hidden border border-slate-700 rounded-xl drop-shadow-lg">
            <img src="./images/fortnite_skin.jpg" alt="First Image" class="absolute inset-0 w-full h-full  opacity-0 transition-opacity duration-1000">
            <img src="./images/pubg.jpg" alt="Second Image" class="absolute inset-0 w-full h-full  opacity-0 transition-opacity duration-1000">
            <img src="./images/gta5.jpg" alt="Third Image" class="absolute inset-0 w-full h-full  opacity-0 transition-opacity duration-1000">
            <img src="./images/valorant.jpg" alt="Fourth Image" class="absolute inset-0 w-full h-full  opacity-0 transition-opacity duration-1000">
        </div>
    </div>
    <div id="slideshow-small" class="  ml-[122px] mr-[19px] mt-4 h-64  relative overflow-hidden md:hidden border border-slate-700 rounded-3xl">
        <img src="./images/fortnite_skin.jpg" alt="First Image" class="absolute inset-0 w-full h-full  opacity-0 transition-opacity duration-1000">
        <img src="./images/pubg.jpg" alt="Second Image" class="absolute inset-0 w-full h-full  opacity-0 transition-opacity duration-1000">
        <img src="./images/gta5.jpg" alt="Third Image" class="absolute inset-0 w-full h-full  opacity-0 transition-opacity duration-1000">
        <img src="./images/valorant.jpg" alt="Fourth Image" class="absolute inset-0 w-full h-full  opacity-0 transition-opacity duration-1000">
    </div>
@endsection                                                                                          

    
