<!DOCTYPE html>
<html lang="en">
  @include('layouts.head')
  <body style="font-family: Roboto, sans-serif;">
    
    <!-- top navigation bar -->
      @include('layouts.navbar')
    <!-- top navigation bar -->
    <!-- offcanvas -->
      @include('layouts.sidebar')
    <!-- offcanvas -->
    <main class="mt-5 pt-4">
      <div class="container">
        @yield('content')</div>
    </main>
  <!-- footer -->
  @include('layouts.footer')
