@extends('layouts.master')
@section('title', 'Home')
@section('maincontent')
<div class="news-page">
    <div class="container">
                <ol class="breadcrumb">
                  <li><a href="{{ route('home') }}">Beranda</a></li>
                  <li><a href="{{ route('news') }}">Berita</a></li>
                  <li class="active">{{$news->tag->name}}</li>
                </ol>
        <div class="news-bor">
            <div class="col-lg-8">
                <div class="news-post">
                    <h2 class="news-post-title">{{ $news->title }}</h2>
                    <p class="news-post-meta"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ $news->date }} | <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Penulis <a href="#">{{ $news->user->name }}</a></p>
                    <img src="{{ Image::url(URL::to($path. '' .$news->image), 800,700,array('crop'))}}" alt="{{ $news->title }}" class="img-thumbnail news-image">
                    <p>{!! $news->content !!}</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <h3 class="heading-title">Berita Lainnya</h3>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div>
@endsection