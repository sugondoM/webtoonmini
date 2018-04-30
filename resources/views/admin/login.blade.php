@include('admin.partials.header')

	<div class="page-main-wrapper">
		<div class="content">
            <div class="login-form">
            {{ Form::open(array('url' => 'admin/dologin')) }}
            <h1>Login</h1>
        
            <!-- if there are login errors, show them here -->
                {{ $errors->first('username') }}
                {{ $errors->first('password') }}
            	{{ Form::label('username', 'Username') }}
                {{ Form::text('username' ,null, ['class' => 'custom-inputtext width-500']) }}
            	<br/>
                <br/>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password' ,  array('placeholder'=>'', 'class'=>'custom-inputtext width-500' )) }}
            	<br/>
                <br/>
            {{ Form::submit('Submit!',['class' => 'custom-button width-500']) }}
            {{ Form::close() }}
            </div>
        </div>    
    

@include('admin.partials.footer')
@yield('contentjs')
@include('admin.partials.javascripts')
@include('admin.partials.end')
