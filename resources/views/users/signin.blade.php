@extends('layouts.main')

@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form"><!--login form-->
   						<h2>Login to your account</h2>
   						{!! Form::open(['url' => 'users/signin']) !!}
                 {!! Form::email('email', Input::old('email'), ['placeholder'=>'Email']) !!}
                 {!! Form::password('password', ['placeholder'=>'Password']) !!}
   							<span>
   								<input type="checkbox" class="checkbox" />
   								Keep me signed in
   							</span>
   						  {!! Form::button('Sign In', ['type' => 'submit', 'class' => 'btn btn-default']) !!}
               {!! Form::close() !!}
               <h4>{!! HTML::link('users/newaccount', 'Create new account', ['class' => 'btn-default']) !!}</h4>

   				</div><!--/login-form-->
				</div><!-- /col-sm-4 -->
			</div><!-- /row -->
		</div><!-- /container -->
</section><!-- /form -->
@stop
