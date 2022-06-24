@extends('layout.app')
@section('title', '-留言墙')
@section('main')
    <div class="mdui-card mdui-hoverable" style="border-radius: 16px">
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">留言墙</div>
            <div class="mdui-card-primary-subtitle">转眼毕业了，大概有许多话没来得及说吧</div>
        </div>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <div class="mdui-divider"></div>
        <div class="mdui-card-content">
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">你的QQ</label>
                <textarea id="qq" class="mdui-textfield-input" placeholder="高考上岸"></textarea>
            </div>
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">你的名字</label>
                <textarea id="name" class="mdui-textfield-input" placeholder="某人"></textarea>
            </div>
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">标题</label>
                <textarea id="subtitle" class="mdui-textfield-input" placeholder="遇见更好的自己"></textarea>
            </div>
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">配图（可选）</label>
                <div class="mdui-row">
                    @if(config('app.Upload_pictures'))
                        <div class="mdui-col-md-10 mdui-col-sm-10 mdui-col-xs-7">
                            <textarea id="image" class="mdui-textfield-input"
                                      placeholder="https://image.liutaomax.com/"></textarea>
                        </div>
                        <div class="mdui-col-md-2 mdui-col-sm-2 mdui-col-xs-5">
                            <a href="javascript:;" id="upload" class="mdui-color-theme-accent a-upload mr10">
                                <input type="file" name="" accept=".png,.jpeg,.jpg" id="upload-image">选择图片
                            </a>
                        </div>

                    @else
                        <div class="mdui-col-md-10 mdui-col-sm-10 mdui-col-xs-7">
                        <textarea id="image" class="mdui-textfield-input"
                                  placeholder="https://image.liutaomax.com/"></textarea>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mdui-textfield">
                <label class="mdui-textfield-label">留下你在学校的足迹</label>
                <textarea id="content" class="mdui-textfield-input" rows="4"
                          placeholder="{{$Copywriting}}" maxlength="500"></textarea>
            </div>
        </div>

        <div class="mdui-card-actions">
            <button id="submitbtn" style="border-radius: 8px"
                    class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-float-right" onclick="submit()">
                发射！
            </button>
        </div>
    </div>
@endsection
