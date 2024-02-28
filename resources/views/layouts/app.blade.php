<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pokemon - @yield('title')</title>

    @include('layouts.components.styles')
    @include('layouts.components.scripts')

    @yield('styles')
</head>
<body>
    <div id="app">
        <main class="row m-0">
            <div class="containerSection p-0">
                <div class="col-lg-12 pt-2 pb-2 containerTopBar">
                    @include('layouts.components.topbar')
                </div>
                <div class="col-lg-12 p-3 mt-5 ContainerSectionBody">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    {{-- script --}}
    @yield('script')
    <script src="/js/app.js?v={{rand()}}"></script>
</body>
</html>