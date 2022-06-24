@extends('layout.app')
@section('title', '-关于本站')
@section('main')
    <div class="mdui-card mdui-hoverable" style="border-radius: 16px">
        <div class="mdui-card-media">
            <img style="max-height: 1000px" src="https://img.llilii.cn/compression/vocaloid/kagamine/32639516_p2.jpg"/>
        </div>
        <div class="mdui-card-primary">
            <div class="mdui-card-primary-title">关于本站</div>
            <div class="mdui-card-primary-subtitle">ABOUT US</div>
        </div>
        <div class="mdui-card-content">
            <div class="mdui-typo">
                Laravel + MDUI
                <br>
                PHP + Nginx + MySQL
                <br><br>
                <!-- 本程序使用GPL2.0协议开源，请遵守此协议，请勿删除本处版权，否则原作者保留一切法律权利 -->
                <div class="mdui-divider">
                </div>
                <br>
                程序版本:V1.0.0<br/>
                作者博客:<a href="https://www.liutao.love" class="text-decoration: none;">黑夜的猫Max</a><br/>作者邮箱:max@liutaomax.com<br>
            </div>
        </div>
    </div>
@endsection
