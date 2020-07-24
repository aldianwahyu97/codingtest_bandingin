<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Coding Test</title>

  <!-- Bootstrap core CSS -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/assets/css/small-business.css" rel="stylesheet">

</head>

<body>

@extends('navbar')

  <!-- Page Content -->
  <div class="container">

    <div class="row" style="padding-bottom: 10px">
        <div class="col-12">
            &nbsp;
        </div>
    </div>

    <div class="row" style="padding-bottom: 10px">
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLibrary">
                Add Library
            </button>
        </div>
    </div>

    <div class="row">
        @foreach ($library as $lib)
        <div class="col-md-4 mb-5">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title">{{$lib->library_name}}</h2>
            </div>
            <div class="card-footer">
                <a href="/booklist/{{$lib->id_lib}}"><button type="button" class="btn btn-primary">Show Book</button></a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editLibrary{{$lib->id_lib}}">
                    Edit Library
                </button>
            </div>
          </div>
        </div>

        {{--  Modal Edit Library  --}}
        <div class="modal fade" id="editLibrary{{$lib->id_lib}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit {{$lib->library_name}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form action="/editLibrary" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_lib" value="{{$lib->id_lib}}">
                    <div class="form-group">
                        <label for="libraryName">Library Name</label>
                        <input type="text" class="form-control" name="library_name" value="{{$lib->library_name}}">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
              </div>
            </div>
        </div>
        @endforeach
    </div>

    {{--  Modal Add Library  --}}
    <div class="modal fade" id="addLibrary" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Library</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/addLibrary" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="libraryName">Library Name</label>
                        <input type="text" class="form-control" name="library_name" placeholder="Insert Library Name">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>

      @include('sweetalert::alert')

  </div>
  <!-- /.container -->

  {{--  @extends('footer')  --}}

  <!-- Bootstrap core JavaScript -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/sweet-alert/sweetalert2.all.min.js"></script>

</body>

</html>
