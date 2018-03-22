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

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    @if(Sentinel::getUser()->hasAccess('ubahuser'))

                      <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file fa-5x"></i>
                                    </div>
                                    <?php $jumlah = 0; ?>
                                    @foreach($cv as $tampil)
                                    @if($tampil->status=="unread")
                                    {!!    $jumlah++; !!}
                                    @endif
                                    @endforeach
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$jumlah}}</div>
                                        <div>CV User yang belum di check </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">   {!! link_to(route('cv.index'),'Lihat list cv') !!}</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <?php $jumlahuser = 0; ?>
                                    @foreach($user as $tampil)
                                    @if($tampil->last_name!="Admin")
                                    {!!    $jumlahuser++; !!}
                                    @endif
                                    @endforeach
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$jumlahuser}}</div>
                                        <div>Jumlah user </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">   {!! link_to(route('listuser.index'),'Lihat list user') !!}</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                 


                    @else
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> Informasi Anda
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                     Nama
                                     <span class="pull-right text-muted small">{!! Sentinel::getUser()->first_name!!}&nbsp;{!! Sentinel::getUser()->last_name!!} 
                                </span>
                                    </a>
                                    <div class="list-group">
                             <a href="#" class="list-group-item">
                                     Jenis kelamin
                                     <span class="pull-right text-muted small">{!! Sentinel::getUser()->jenis_kelamin!!}
                                </span>
                                    </a>
                             <a href="#" class="list-group-item">
                                     Tanggal lahir
                                     <span class="pull-right text-muted small">{!! Sentinel::getUser()->tanggal_lahir!!}
                                </span>
                                    </a>
                            <a href="#" class="list-group-item">
                                     Alamat
                                     <span class="pull-right text-muted small">{!! Sentinel::getUser()->alamat!!}
                                </span>
                                    </a>
                              <a href="#" class="list-group-item">
                                     No ktp
                                     <span class="pull-right text-muted small">{!! Sentinel::getUser()->no_ktp!!}
                                </span>
                                    </a> 
                                    <a href="#" class="list-group-item">
                                     Pendidikan terakhir
                                     <span class="pull-right text-muted small">{!! Sentinel::getUser()->Pendidikan!!}
                                </span>
                                    </a> 
                                    <a href="#" class="list-group-item">
                                     Status Cv
                                     <?php $valid = 0; ?>
                                     
                                     <span class="pull-right text-muted small">
                                         @foreach($cv as $tampil)
                                           @if($tampil->id_user==Sentinel::getUser()->id)
                                        
                                              {!! $tampil->status;   $valid=1; !!}
                                              @break
                                           @endif
                                         @endforeach
                                      
                                      @if($valid==0)
                                      
                                         Anda belum memasukan cv
                                      
                                      @endif
                                      
                                       
                                         
                                </span>
                                    </a> 
                                </div>
   



                    @endif
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
