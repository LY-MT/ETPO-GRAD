<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layout.head')
<body
    class="mdui-drawer-body-left mdui-bottom-nav-fixed mdui-appbar-with-toolbar mdui-theme-primary-pink mdui-theme-accent-pink mdui-theme-layout-auto mdui-loaded">

{{--顶部--}}
@include('layout.header')

{{--侧边栏--}}
@include('layout.sidebar')

<main class="mdui-container" id="main">
    <br/><br/>
    @yield('main')
    <br/><br/>
</main>
</body>
@include('layout.footer')
</html>
