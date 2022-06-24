@extends('layout.app')
@section('title',   "-".$config->more ?? '-开发初衷')
@section('main')
    <div class="mdui-card mdui-hoverable" style="border-radius: 16px">
        <div class="mdui-card-media">
            <img style="max-height: 1000px" src="
                    {{$config->more_image}}"/>
        </div>
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">{{$config->more_title}}</div>
            <div class="mdui-card-primary-subtitle">{{$config->more_subtitle}}</div>
        </div>
        <div class="mdui-card-content">
            {{$config->more_content}}
        </div>
    </div>
@endsection
