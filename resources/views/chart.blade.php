@extends('templatesv.nav')
@section('titles')<center>Report KTP</center>
@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <center>Pembuat KTP Perempuan</center>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                {!! $perempuan->html() !!}
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <center>Pembuat KTP Laki-Laki</center>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-6">
                {!! $laki->html() !!}
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
{!! Charts::scripts() !!}
{!! $laki->script() !!}
{!! $perempuan->script() !!}
@endsection
