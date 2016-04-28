@extends('layouts.main')

@section('content')
	<section id="form"><!-- form -->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!-- login form -->
   						<h2>Create New Account</h2>
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
                {!! Form::open(['url'=>'users/create']) !!}
                  {!! Form::label('username') !!}
                  {!! Form::text('username', null, ['placeholder'=>'Username']) !!}
                  {!! Form::label('email') !!}
                  {!! Form::email('email', null, ['placeholder'=>'Email']) !!}
                  {!! Form::label('password') !!}
                  {!! Form::password('password', ['placeholder'=>'Password']) !!}
                  {!! Form::label('tel') !!}
                  {!! Form::text('tel', null, ['placeholder'=>'Phone']) !!}
                 {!! Form::button('Create New Account', [ 'type' => 'submit', 'class'=>'btn btn-default']) !!}
                {!! Form::close() !!}
           </div><!--/login-form-->
        </div><!-- /col-sm-4 -->
      </div><!-- /row -->
    </div><!-- /container -->
</section><!-- /form -->
@stop

