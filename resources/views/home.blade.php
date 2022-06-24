@extends('layout.app')
@section('title', '')
@section('main')
    @if(count($data) < 1)
        <div class="mdui-card mdui-hoverable" style="border-radius: 16px">
            <div class="mdui-card-media">
                <img style="max-height: 2000px" onerror="randomImage()" src="" />
            </div>
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title">啊噢！</div>
                <div class="mdui-card-primary-subtitle">这里还没有任何留言呢！</div>
            </div>
            <div class="mdui-card-content">
                快点击“留言板”留下你在校的痕迹吧！<br><br>
            </div>
        </div>
    @endif
    @foreach($data as $value)
        <br>
        <div class="mdui-card mdui-hoverable" style="border-radius: 16px">
            <div class="mdui-card-header">
                <img class="mdui-card-header-avatar" src="https://q1.qlogo.cn/g?b=qq&s=640&nk={{$value->qq}}"/>
                <div class="mdui-card-header-title">{{$value->name}}</div>
                <div class="mdui-card-header-subtitle">{{$value->qq}}</div>
            </div>
            <div class="mdui-card-media">
                @if(!empty($value->image))
                    <div v-if="data.image != ''">
                        <img style="max-height: 2000px"
                             onclick="if($(this).attr('origin-src') == undefined) { window.open($(this).attr('src')) } else { window.open($(this).attr('origin-src')) }"
                             onerror="randomImage()" src="{{$value->image}}"/>
                    </div>
                @else
                    <div class="mdui-divider"></div>
                @endif
            </div>
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title">{{$value->subtitle}}</div>
                <div class="mdui-card-primary-subtitle">
                    {{$value->content}}
                </div>
            </div>
            <div class="mdui-card-content">
                {{$value->created_at}}
            </div>
            <div class="mdui-card-actions">
               {{-- <a class="copy mdui-btn mdui-btn-icon mdui-float-right" style="color:#4F4F4F" href="javascript:void(0);"
                   data-clipboard-text="
                    444"><i class="mdui-icon material-icons">share</i></a>--}}
                <div id="comment-cccc" class="mdui-float-right mdui-card-primary-subtitle">
                    {{$value->comment}}
                </div>
                <a style="color:#4F4F4F" href="/comment/{{$value->id}}" class="mdui-btn mdui-btn-icon mdui-float-right">
                    <i class="mdui-icon material-icons">comment</i>
                </a>
                <div id="like" class="mdui-float-right mdui-card-primary-subtitle">
                    {{$value->like}}
                </div>
                <button style="color:#4F4F4F" class="mdui-btn mdui-btn-icon mdui-float-right" onclick="like('{{$value->id}}')">
                    <i class="mdui-icon material-icons">favorite</i>
                </button>
            </div>
        </div>

    @endforeach

    {{ $data->links() }}
@endsection
