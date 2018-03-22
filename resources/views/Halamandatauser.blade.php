<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Carikerja.com</title>

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

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Carikerja.com</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <ul class="nav navbar-right navbar-top-links">
          
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        @if(Sentinel::check())
                           
                    
                    
                        @if(Sentinel::getUser()->hasAccess('ubahuser'))
                        <i class="fa fa-user fa-fw"></i>Admin<b class="caret"></b>
                                @else  
                        <i class="fa fa-user fa-fw"></i>user<b class="caret"></b>
                                @endif
      
                         
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                    
                            <li><i class="fa fa-user fa-fw"></i> Welcome {!! Sentinel::getUser()->first_name !!}
                            </li>
                         
                            <li><i class="fa fa-sign-out fa-fw"></i>{!! link_to(route('logout'),'Logout')!!}
                            </li>
                            @endif
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                        @if(Sentinel::getUser()->hasAccess('ubahuser'))
                            <li>
                            {!! link_to(route('home.index'),'Dashboard') !!}
                            </li>
                           
                            <li>
                            {!! link_to(route('listuser.index'),'Lihat data user') !!}
                            </li>
                          
                           
                            <li>
                            {!! link_to(route('cv.index'),'Download CV user') !!}
                            </li>
                            </li>
                            <li>
                            {!! link_to(route('logout'),'Logout')!!}
                             
                            </li>
                            @else
                            <li>
                            {!! link_to(route('home.index'),'Dashboard') !!}
                            </li>
                           
                            <li>
                            {!! link_to(route('cv.index'),'Upload CV') !!}
                            </li>
                            <li>
                            {!! link_to(route('logout'),'Logout')!!}
                             
                            </li>
                            @endif

                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List  User  :</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <!-- Page Content -->
            <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               List user :
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-10">
                               
                                  
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                List user
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama User </th>
                                                <th>Jenis Kelamin </th>
                                                <th>Tanggal Lahir </th>
                                                <th>No ktp</th>
                                                <td>Alamat</th>
                                                <th>No telpon</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($user as $tampil)
                                            <tr>
                                        @if($tampil->last_name!="Admin") 
                                          <td>{!!$tampil->first_name; $tampil->last_name;!!}</td>   
                                          <td>{!!$tampil->jenis_kelamin!!}</td>   
                                          <td>{!!$tampil->tanggal_lahir!!}</td> 
                                          <td>{!!$tampil->no_ktp!!}</td> 
                                          <td>{!!$tampil->alamat!!}</td> 
                                          <td>{!!$tampil->no_telpon!!}</td>
                                          <td>{!!$tampil->Pendidikan!!}</td>    
                                            <td>{!! link_to(route('listuser.edit',$tampil->id),'Edit') !!}</td>     
                                            <td>{!! Form::open(array('route'=>array('listuser.destroy',$tampil->id),'method'=>'delete')) !!}
					                        {!! Form::submit('Delete',array("onclick"=>"return confirm('are you sure?')")) !!}
					                          {!! Form::close() !!}
                                                  </td>
                                                  @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                        <!-- /.col-lg-12 -->
                    </div>
              
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

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
