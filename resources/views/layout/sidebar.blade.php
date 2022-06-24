<div class="mdui-drawer" id="main-drawer">
    <div class="mdui-list " mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
        <div class="mdui-list">
            <a href="/" id="homePage" class="mdui-list-item mdui-ripple" style="border-radius: 16px;">
                <i class="mdui-list-item-icon mdui-icon material-icons">
                    home
                </i>
                <div class="mdui-list-item-content">
                    主页
                </div>
            </a>
            <a href="/submit" id="submitPage" class="mdui-list-item mdui-ripple" style="border-radius: 16px;">
                <i class="mdui-list-item-icon mdui-icon material-icons">
                    favorite
                </i>
                <div class="mdui-list-item-content">
                    留言板
                </div>
            </a>
            <a href="/more" id="morePage" class="mdui-list-item mdui-ripple" style="border-radius: 16px;">
                <i class="mdui-list-item-icon mdui-icon material-icons">
                    tag_faces
                </i>
                <div class="mdui-list-item-content">
                    {{$config->more}}
                </div>
            </a>
            <a href="/about" id="aboutPage" class="mdui-list-item mdui-ripple" style="border-radius: 16px;">
                <i class="mdui-list-item-icon mdui-icon material-icons">
                    code
                </i>
                <div class="mdui-list-item-content">
                    关于本站
                </div>
            </a>
        </div>
        <div class="copyright">
            <div class="mdui-typo">
                <!-- 本程序使用GPL2.0协议开源，请遵守此协议，请勿删除本处版权，否则原作者保留一切法律权利 -->
                <!-- 如果看不懂GPL2.0协议请自行查看根目录人话版解释。如果想删除本处版权的请直接不要使用本程序。 -->
                <p class="mdui-typo-caption-opacity">
                    © 2022
                    <a href="https://www.liutao.love" target="_blank">
                        黑夜的猫Max
                    </a>
                </p>
                <p class="mdui-typo-caption-opacity">
                    Powered by
                    <a href="https://mdui.org" target="_blank">
                        MDUI
                    </a>
                </p>
                <meting-js
                    lrctype="0"
                    order="{{$config->music_order ?? 'random'}}"
                    server="{{$config->music_server ?? 'tencent'}}"
                    autoplay="{{$config->music_autoplay ?? true}}"
                    type="{{$config->music_type ?? 'playlist'}}"
                    theme="#000000"
                    volume="{{$config->music_volume ?? '0.7'}}"
                    list-folded="true"
                    id="{{$config->music_id ?? '8508134532'}}">
                </meting-js>
            </div>
        </div>
    </div>
</div>
