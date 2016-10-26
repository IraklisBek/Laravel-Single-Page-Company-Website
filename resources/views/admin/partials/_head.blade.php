<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Admin Panel</title>
<!-- jQuery -->
{{ Html::script('admin/vendor/jquery/jquery.min.js') }}

<!-- Custom Fonts -->
<!-- <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
{{ Html::style('css/font-awesome.min.css') }}
<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<!-- Bootstrap Core CSS -->
{{ Html::style('admin/vendor/bootstrap/css/bootstrap.min.css')}}
<!--<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->

<!-- MetisMenu CSS -->
{{ Html::style('admin/vendor/metisMenu/metisMenu.min.css')}}
<!--<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">-->

<!-- DataTables CSS -->
{{ Html::style('admin/vendor/datatables-plugins/dataTables.bootstrap.css')}}
<!--<link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">-->

<!-- DataTables Responsive CSS -->
{{ Html::style('admin/vendor/datatables-responsive/dataTables.responsive.css')}}
<!--<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">-->

<!-- Custom CSS -->
{{ Html::style('admin/dist/css/sb-admin-2.css')}}
<!--<link href="../dist/css/sb-admin-2.css" rel="stylesheet">-->

<!-- Custom Fonts -->
{{ Html::style('admin/vendor/font-awesome/css/font-awesome.min.css')}}
<!--<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
@yield('stylesheets')
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

{{ Html::style('admin/dist/css/toastr.css') }}
{{ Html::script('admin/dist/js/toastr.js') }}
{{ Html::style('admin/dist/css/mycss.css') }}


