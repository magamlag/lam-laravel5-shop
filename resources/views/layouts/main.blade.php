       @include('partials/header')
    <body>
      @include('partials/nav')
      @include('partials/slider')
      <hr />
          @if (Session::has('message'))
           <section id="main-content" class="warning clearfix">
              <p class="alert">{!! Session::get('message') !!}</p>
           </section><!-- /main-content -->
          @endif
           @if($errors->has())
            <div id="form-errors"><!-- form-errors -->
                <p>The following errors have occurred:</p>
                <ul>
                   @foreach($errors->all() as $error)
                   <li>{!! $error !!}</li>
                   @endforeach
                </ul>
            </div><!-- /form-errors -->
          @endif
       @yield('content')

       @include('partials/footer')
       @include('partials/scripts')
    </body>
</html>