@extends('layouts.main')
@section('container')

<main id="main" class="main">
<section class="section dashboard mt-5">
  
<div class="d-sm-flex align-items-center justify-content-between">
    <h4>Permission</h4>
</div>
        <div class="row">
        <div class="col-md-3">
        </div>
         </div>
          <div class="col-md-10 mt-3">
            <div class="card border-0 shadow-sm">
              <div class="card-body">
                <h6 class="card-title">Recent Permission</h6>
                <hr>

             
                <div class="p">
                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Data
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="add_permission" method="POST">
                            @csrf
                           <div class="mb-3 row">
                            <label for="type visitor" class="col-form-label">Menu:</label>
                            <input type="text" class="form-control" name="menu"> 
                          </div>                 
                           </div>         
                          
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

                <br>
                <br>
              @if (session()->has('message'))
                  <div class="alert alert-success">
                  {{ session()->get('message') }}
                  </div>
              @endif
              <div class="p">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive overflow-auto" style="max-height:70vh; overflow: scroll">
                      <table class=" table" id="table_permission" style="width:100%">
                        <thead class="bg-light">
                          <tr>
                            <th></th>
                            <th scope="col">Menu</th>
                            <th scope="col">Post By</th>
                            <th scope="col">Post Date</th>
                            <th scope="col">Action</th>
                          </tr>
                          </thead>
                          
                          <tbody class="table-group-divider">
                          <?php $no=1;?>
                        @foreach ($permission as $permission)
                           <tr>
                            <td></td>
                            <td>{{$permission['menu']}}</td>
                            <td>{{$permission['postby']}}</td>
                            <td>{{$permission['postdate']}}</td>
                            <td><a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEdit">Edit</a>
                            <a class="btn btn-danger" href={{"delete_permission/".$permission['id']}}>Delete</a></td>
                           </tr>
                            
                          @endforeach    
                        </tbody>
                       </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </div>

           <!-- Modal Edit-->
           <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Permission</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('visitor.update')}}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="id" value="">
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Menu</label>
                              <input type="text" class="form-control" name="menu" id="menu" value="">
                            </div>         
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                    </div>
                  </div>                
              </div>
          </main>
  <script>
$(document).ready(function() {
    $('#table_permission').DataTable( {
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    } );
} );
  </script>     

@endsection