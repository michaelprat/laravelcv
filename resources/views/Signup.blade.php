<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Carikerja.com</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Bootstrap Core CSS -->
        <link href="{{asset('job/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('job/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('job/css/startmin.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('job/css/font-awesome.min.css')}}"  rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
    <div class="container">
        <br>
        <br>
        <br>
        <br>
            <div class="row">
                <div class="col-md-5 col-md-offset-4">
                <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sign Up new user</h3>
                        </div>
                        <br>
                        
                        <div class="panel-body">
                        {!! Form::open(['route' => 'signup.store', 'role' => 'form']) !!}
                      
                                <fieldset>
                                    <div class="form-group">
                                               
                                   {!! Form::label('first_name', 'Nama depan') !!}    
                                    {!! Form::text('first_name', null, array('class' => 'form-control')) !!}
                                        
                                    </div>
                                    <div class="form-group">
                                    {!! Form::label('last_name', 'Nama belakang') !!}    
                                    {!! Form::text('last_name', null, array('class' => 'form-control')) !!}
                                        
                                    </div>
                                    <div class="form-group">
                                    {!! Form::label('email', 'Alamat email') !!}    
                                    {!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'example@org.com')) !!}
                                        
                                    </div>
                                    <div class="form-group">
                                    {!! Form::label('password', 'Password') !!}  
                                    {!! Form::password('password', array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                    {!! Form::label('password_confirmation', 'Masukan ulang Password') !!}  
                                    {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                    {!! Form::label('tanggal_lahir', 'Masukan tanggal  lahir:') !!} 
                                    {!! Form::date('tanggal_lahir', \Carbon\Carbon::now())!!}
                                    </div>
                                    <div class="form-group">
                                    {!! link_to(route('log-in.index'),'Kembali ke halaman login')!!}
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    {!! Form::submit('Signup', array('class' => 'btn btn-lg btn-success btn-block')) !!}
                                    <br>
                                    {!! Form::reset('Reset', array('class' => 'btn btn-lg btn-success btn-block')) !!}
                                  
                                </fieldset>
                                {!! Form::close() !!}

                                               <br>
                                 @if(count($errors)>0)
	 
	                                            <ul>
		                              @foreach($errors->all() as $error)
		                            <li>{{$error}}</li>
			                          @endforeach
			                                 </ul>
			
			                              @endif
                                 @if (Session::has('message2'))
                                    <div class="alert alert-info">{{ Session::get('message2') }}</div>
                                         @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{asset('job/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('job/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('job/js/metisMenu.min.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('job/js/startmin.js')}}"></script>

    </body>
</html>
