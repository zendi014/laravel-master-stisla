@extends('layouts.dashboard')

@section('content')

<div class="row">

    <div class="col-lg-12">
      <div class="card">

        <div class="card-header">
          <h4>Books</h4>
          <div class="card-header-action">
            <button type="button" class="btn btn-outline-success btn-sm float-right"
                    onclick="create()" style="margin-right:5px">
                      <i class="fas fa-plus"></i> Create Book
            </button> 
          </div>
              
        </div>

        <div class="card-body">
          <table class="table table-bordered book_table">
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

      </div>
    </div>
    
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="{{ URL::asset('assets/js/axios.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.validate.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.serializejson.js')}}"></script>
<script src="{{ URL::asset('assets/libs/swal2/dist/sweetalert2.min.js')}}"></script>

<script src="{{ URL::asset('js/m_swal.js')}}"></script>
<script src="{{ URL::asset('js/book.js') }}"></script>