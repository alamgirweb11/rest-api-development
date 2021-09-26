@include('backend.layouts.partials.header')
@include('backend.layouts.partials.sidebar')
@include('backend.layouts.partials.top_sidebar')
<div class="container-fluid" id="container-wrapper">
  @include('backend.layouts.partials.alert')
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
      </ol>
    </div> --}}

   <div id="app">
    @yield('content')
   </div>

</div>
@include('backend.layouts.partials.footer')