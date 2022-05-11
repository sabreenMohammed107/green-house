@include('web.layout.head')

<body>


        @include('web.layout.header')
        @yield('content')
        @include('web.layout.footer')

        @include('web.layout.footerscript')
