@extends('adminlte::page')

@section('title', 'Api Documentation')

@section('content_header')
    <h1>Api Management</h1>
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
@section('plugins.Datatables', true)
@section('plugins.Select2', true)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Add New API
           </button>
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with default features</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>API Name</th>
                      <th>Method</th>
                      <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $api)
                        <tr>
                            <td>{{ $api->name }}</td>
                            <td>{{ $api->method }}</td>
                            <td>Lihatlah Manusia</td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

<!-- MODAL SECTION -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <form method="post" action="api/create">
          @csrf
        <div class="modal-header">
          <h4 class="modal-title">Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive">
                 <span id="result"></span>
                 <div class="form-group">
                    <label for="exampleInputEmail1">API Name</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail12">API URL</label>
                    <input name="url" type="text" class="form-control" id="exampleInputEmail12" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="method">Method</label>
                    <select class="custom-select" id="method" name="method">
                        <option value="GET">GET</option>
                        <option value="POST">POST</option>
                    </select>                  
                 </div>
                 
                 <table class="table table-bordered" id="dynamicTable">  
                    <tr>
                        <th>Parameters</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    <tr>  
                        <td><input type="text" name="param[0]" placeholder="Input Parameter" class="form-control" /></td>
                        <td><input type="text" name="paramdesc[0]" placeholder="Input Description" class="form-control" /></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>
                <label for="dynamicTables">Response Success</label>
                <table class="table table-bordered" id="dynamicTables">  
                  <tr>
                      <th>Response Name</th>
                      <th>Example Data</th>
                      <th>Action</th>
                  </tr>
                  <tr>  
                      <td><input type="text" name="resname[0]" placeholder="Input Parameter" class="form-control" /></td>
                      <td><input type="text" name="resdata[0]" placeholder="Input Description" class="form-control" /></td>  
                      <td><button type="button" name="adds" id="adds" class="btn btn-success">Add More</button></td>  
                  </tr>  
                </table> 
                <label for="dynamicTabless">Response Success</label>
                <table class="table table-bordered" id="dynamicTabless">  
                  <tr>
                      <th>Response Name</th>
                      <th>Example Data</th>
                      <th>Action</th>
                  </tr>
                  <tr>  
                      <td><input type="text" name="resname2[0]" placeholder="Input Parameter" class="form-control" /></td>
                      <td><input type="text" name="resdata2[0]" placeholder="Input Description" class="form-control" /></td>  
                      <td><button type="button" name="adds" id="addss" class="btn btn-success">Add More</button></td>  
                  </tr>  
                </table> 
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
</div>
<!-- /.modal -->
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="param['+i+']" placeholder="Input Parameter" class="form-control" /></td><td><input type="text" name="paramdesc['+i+']" placeholder="Input Description" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
    $("#adds").click(function(){
   
        ++i;

        $("#dynamicTables").append('<tr><td><input type="text" name="resname['+i+']" placeholder="Input Parameter" class="form-control" /></td><td><input type="text" name="resdata['+i+']" placeholder="Input Description" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
    $("#addss").click(function(){
   
        ++i;

        $("#dynamicTabless").append('<tr><td><input type="text" name="resname['+i+']" placeholder="Input Parameter" class="form-control" /></td><td><input type="text" name="resdata['+i+']" placeholder="Input Description" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>
@stop