@extends('layout.app')
@section('title', '-评论')
@section('main')

    <div class="mdui-card mdui-hoverable" style="border-radius: 16px;">
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
            <br><br>
            <div class="mdui-card" style="border-radius: 16px;">
                <div class="mdui-card-primary">
                    <div class="mdui-card-primary-title">发表您的评论</div>
                    <div class="mdui-card-primary-subtitle">可以发表您的感想以及感受哦！</div>
                </div>
                <div class="mdui-card-content">
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">您的昵称</label>
                        <input placeholder="黑夜的猫" id="nickname" class="mdui-textfield-input" type="text"/>
                    </div>
                    <div class="mdui-textfield">
                        <label class="mdui-textfield-label">你要说....</label>
                        <textarea id="comment" class="mdui-textfield-input" rows="4"
                                  placeholder="加油！你一定能成功的！"></textarea>
                    </div>
                </div>
                <div class="mdui-card-actions">
                    <button id="submitbtn" style="border-radius: 8px"
                            class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right"
                            onclick="commentSubmit({{$value->id}})">
                        发射！
                    </button>
                </div>
            </div>
            <br>
            <div class="mdui-card" id="commentBoxMain" style="border-radius: 16px;">
                @if(!$data)
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-title">所有评论</div>
                        <div class="mdui-card-primary-subtitle">这些都是给信的主人的评论啦！</div>
                    </div>
                @endif
                @foreach($data as $comments)
                    <div class="mdui-card-primary">
                        <div class="mdui-card-primary-subtitle"> {{$comments->name}}</div>
                    </div>
                    <div id="commentBox" class="mdui-card-content">
                        {{$comments->comment}}
                        <br><br>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mdui-card-actions">
            <a class="copy mdui-btn mdui-btn-icon mdui-float-right" href="javascript:void(0);" data-clipboard-text="
                            swsw"><i class="mdui-icon material-icons">share</i></a>
            </a>
            <div id="like" class="mdui-float-right mdui-card-primary-subtitle">
                {{$value->like}}
            </div>
            <button style="color:#4F4F4F" class="mdui-btn mdui-btn-icon mdui-float-right"
                    onclick="like({{$value->id}})">
                <i class="mdui-icon material-icons">favorite</i>
            </button>
        </div>
    </div>
@endsection
