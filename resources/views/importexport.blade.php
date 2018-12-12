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
            <div class="col-lg-10">
                <div class="table-responsive">
                  <div class="box-body">
                    <div class="container">
                      <a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                      <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>


                      <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
                      <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ url('siswa/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="import_file"> <br>
                        <button class="btn btn-primary">Import File</button>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <!-- /.col-lg-6 (nested) -->
        </div>
        <!-- /.row (nested) -->
    </div>
    <!-- /.panel-body -->
</div>
@endsection
