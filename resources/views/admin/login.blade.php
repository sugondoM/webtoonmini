@include('admin.partials.header')

	<div class="page-main-wrapper">
		<div class="content">
            
            {{ Form::open(array('url' => 'admin/dologin')) }}
            <h1>Login</h1>
        
            <!-- if there are login errors, show them here -->
            <p>
                {{ $errors->first('username') }}
                {{ $errors->first('password') }}
            </p>
        
            <p>
                {{ Form::label('username', 'Username') }}
                {{ Form::text('username') }}
            </p>
        
            <p>
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password') }}
            </p>
        
            <p>{{ Form::submit('Submit!') }}</p>
            {{ Form::close() }}
        </div>    
    

@include('admin.partials.footer')
@yield('contentjs')
@include('admin.partials.javascripts')
@include('admin.partials.end')
