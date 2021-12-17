<!DOCTYPE html>
<html lang="en">
    @include('layouts.admin.elements.head')

    <body class="sb-nav-fixed">

        @include('layouts.admin.elements.navBar')

        <div id="layoutSidenav">
            @include('layouts.admin.elements.sideBar')

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        @yield('main')
                    </div>
                </main>
                @include('layouts.admin.elements.footer')
            </div>
        </div>

        @include('layouts.admin.elements.script')
        
    </body>
</html>
