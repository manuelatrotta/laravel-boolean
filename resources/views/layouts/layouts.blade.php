    @include('layouts.partials._header')
      <header>
        @yield('header')

      </header>
      <main>
        @yield('main')
      </main>
      <footer>
        @yield('footer')

      </footer>
      @yield('scripts')
    @include('layouts.partials._footer')
