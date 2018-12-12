@extends('templatesv.nav')
@section('titles')<center>Welcome <i>{{ucwords(Auth::user()->akses)}}</i></center>
@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <center>E-KTP</center>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                Selamat Datang di Website KTP!
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
