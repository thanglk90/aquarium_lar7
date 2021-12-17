<!doctype html>
<html lang="en">
    @include('layouts.client.elements.head')
  <body>
    <div class="wrapper">
        
        @include('layouts.client.elements.banner')

        @include('layouts.client.elements.menu')
        
        @include('layouts.client.elements.filter')

        @yield('breadcrumb')
        @yield('mainTitle')

        <main class="main mt-5">
            @yield('main')           
        </main>

        @include('layouts.client.elements.footer')

        
    </div>
    
    <span id="scroll-top">
        <i class="fas fa-arrow-up"></i>
    </span>

    <!-- SCRIPT -->
    @include('layouts.client.elements.script')

  </body>
</html>