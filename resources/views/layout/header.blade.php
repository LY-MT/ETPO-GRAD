<header id="appbar" class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-progress" id="isLoading">
        <div class="mdui-progress-indeterminate"></div>
    </div>
    <div class="mdui-toolbar mdui-color-theme">
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white " onclick="inst.toggle();">
            <i class="mdui-icon material-icons">menu</i>
        </span>
        <a href="/" class="mdui-typo-headline mdui-hidden-xs">毕业季</a>
        <div class="mdui-toolbar-spacer"></div>
        <button onclick="search()" mdui-tooltip="{content: '搜索'}" class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white">
            <i class="mdui-icon material-icons">search</i>
        </button>
        {{--<a target="_BLANK" href="https://www.wunote.cn" mdui-tooltip="{content: '吴先森的笔记'}" class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"><i class="mdui-icon material-icons">code</i></a>--}}
    </div>
</header>
