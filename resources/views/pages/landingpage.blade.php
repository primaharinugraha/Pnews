@extends('layouts.app')

@section('title', 'P News')
    
@section('content')

     <!-- swiper -->
     <div class="swiper mySwiper mt-9">
        <div class="swiper-wrapper">
  @foreach ($banners as $banner)
  <div class="swiper-slide">
    <a href="{{route('newsshow', $banner->news->slug)}}" class="block">
      <div
        class="relative flex flex-col gap-1 justify-end p-3 h-72 rounded-xl bg-cover bg-center overflow-hidden"
        style="background-image: url('{{asset('storage/' . $banner->news->thumbnail)}}')">
        <div
          class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-[rgba(0,0,0,0.4)] to-[rgba(0,0,0,0)] rounded-b-xl">
        </div>
        <div class="relative z-10 mb-3" style="padding-left: 10px;">
          <div class="bg-primary text-white text-xs rounded-lg w-fit px-3 py-1 font-normal mt-3">{{$banner->news->newsCategory->title}}</div>
          <p class="text-3xl font-semibold text-white mt-1">{{$banner->news->title}}</p>
          <p class="text-3xl font-semibold text-white mt-1"></p>
          <div class="flex items-center gap-1 mt-1">
            <img src="{{asset('storage/'. $banner->news->author->avatar)}}" alt="" class="w-5">
            <p class="text-white text-xs">{{$banner->news->author->name}}</p>
          </div>
        </div>
      </div>
    </a>
  </div>
  @endforeach
         
  
        
  
        </div>
      </div>
  
      <!-- Berita Unggulan -->
      <div class="flex flex-col px-14 mt-10 ">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
          <div class="font-bold text-2xl text-center md:text-left">
            <p>Berita Unggulan</p>
            <p>Untuk Kamu</p>
          </div>
          <a href="semuaberita.html"
            class="bg-primary px-5 py-2 rounded-full text-white font-semibold mt-4 md:mt-0 h-fit">
            Lihat Semua
          </a>
        </div>
        <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
            @foreach ($featureds as $featured)
            <a href="{{route('newsshow', $featured->slug)}}">
                <div
                  class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out" style="height: 100%; ">
                  <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
                   {{$featured->newsCategory->title}}</div>
                  <img src="{{asset('storage/' . $featured->thumbnail)}}" alt="" class="w-full rounded-xl mb-3" style="height: 150px; object-fit:cover;">
                  <p class="font-bold text-base mb-1">{{$featured->title}}</p>
                  <p class="text-slate-400">{{ \Carbon\Carbon::parse($featured->created_at)->format('d F Y')}}</p>
                </div>
              </a>
            @endforeach
        </div>
      </div>
  
      <!-- Berita Terbaru -->
      <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10">
        <div class="flex flex-col md:flex-row w-full mb-6">
          <div class="font-bold text-2xl text-center md:text-left">
            <p>Berita Terbaru</p>
          </div>
        </div>
  
        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-12 gap-5">
          <!-- Berita Utama -->
          <div
            class="relative col-span-7 lg:row-span-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
            <a href="{{route('newsshow', $news[0]->slug)}}">
              <div class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-5 mt-5 absolute">
               {{$news [0]->newsCategory->title}}
              </div>
              <img src="{{asset('storage/' . $news[0]->thumbnail)}}" alt="berita1" class="rounded-2xl">
              <p class="font-bold text-x l mt-3">{{$news[0]->title}}
            </p>
              <p class="text-slate-400 text-base mt-1">{!! \Str::Limit($news[0]->content, 90) !!}</p>
              <p class="text-slate-400 text-base mt-1">{{ \Carbon\Carbon::parse($news[0]->created_at)->format('d F Y')}}</p>
            </a>
          </div>
          <!-- Berita 1 -->
          @foreach ($news->skip(1) as $new)
          <a href="{{route('newsshow', $new->slug)}} "
            class="relative col-span-5 flex flex-col h-fit md:flex-row gap-3 border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer">
            <div class="bg-primary text-white rounded-full w-fit px-4 py-1 font-normal ml-2 mt-2 absolute text-sm">
              {{$new->newsCategory->title}}</div>
            <img src="{{asset('storage/' . $new->thumbnail)}}" alt="berita2" class="rounded-xl  md:max-h-48" style="width:260px; object-fit: cover">
            <div class="mt-2 md:mt-0">
              <p class="font-semibold text-lg">{{$new->title}}</p>
              <p class="text-slate-400 mt-3 text-sm font-normal">{!! \Str::Limit($new->content, 90) !!}</p>
            </div>
        </a>
          @endforeach
        
        </div>
  
      </div>
  
      <!-- Author -->
      <div class="flex flex-col px-4 md:px-10 lg:px-14 mt-10">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
          <div class="font-bold text-2xl text-center md:text-left">
            <p>Kenali Author</p>
            <p>Terbaik Dari Kami</p>
          </div>
          <a href="" class="bg-primary px-5 py-2 rounded-full text-white font-semibold mt-4 md:mt-0 h-fit">
            Gabung Menjadi Author
          </a>
        </div>
        <div class="grid grid-cols-1  sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
          <!-- Author 1 -->
          @foreach ($authors as $author)
          <a href="{{route('authorshow', $author->ussername)}}">
            <div
              class="flex flex-col items-center border border-slate-200 px-4 py-8 rounded-2xl hover:border-primary hover:cursor-pointer">
              <img src="{{asset('storage/' . $author->avatar)}}" alt="" class="rounded-full w-24 h-24">
              <p class="font-bold text-xl mt-4">{{$author->name}}</p>
              <p class="text-slate-400">{{$author->news->count()}} Berita</p>
            </div>
          </a>
          @endforeach
        </div>
      </div>
  
      <!-- Pilihan Author -->
      <div class="flex flex-col px-14 mt-10 mb-10">
        <div class="flex flex-col md:flex-row justify-between items-center w-full mb-6">
          <div class="font-bold text-2xl text-center md:text-left">
            <p>Pilihan Author</p>
          </div>
        </div>
        <div class="grid sm:grid-cols-1 gap-5 lg:grid-cols-4">
          @foreach ($news as $news)
          <a href="{{route('newsshow', $news->slug)}}">
            <div
              class="border border-slate-200 p-3 rounded-xl hover:border-primary hover:cursor-pointer transition duration-300 ease-in-out" style="height: 100%">
              <div class="bg-primary text-white rounded-full w-fit px-5 py-1 font-normal ml-2 mt-2 text-sm absolute">
                {{$news->newsCategory->title}}</div>
              <img src="{{asset('storage/' . $news->thumbnail)}}" alt="" class="w-full rounded-xl mb-3" style="height: 200px; object-fit: cover;">
              <p class="font-bold text-base mb-1">{{$news->content}}</p>
              <p class="text-slate-400">{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y')}}</p>
            </div>
          </a>
          @endforeach
        </div>
      </div>
    
@endsection