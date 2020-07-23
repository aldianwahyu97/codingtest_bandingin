<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Coding Test Bandingin</title>

  <!-- Bootstrap core CSS -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/assets/css/heroic-features.css" rel="stylesheet">

</head>

<body>
@extends('navbar')
@include('sweetalert::alert')

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        @foreach ($library as $lib)
            <h1 class="display-3">{{$lib->library_name}}</h1>
        @endforeach
    </header>

    <div class="row" style="padding-bottom: 12px">
        <div class="col-12">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBook">
                Add Book
            </button>
        </div>
    </div>

    <!-- Page Features -->
    <div class="row text-center">
        @foreach ($book as $b)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                <div class="card-body">
                    <h4 class="card-title">{{$b->book_name}}</h4>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editBook{{$b->id_book}}">
                        Edit Book
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteBook{{$b->id_book}}">
                        Delete Book
                    </button>
                </div>
                </div>
            </div>

            {{--  Modal Edit Book  --}}
            <div class="modal fade" id="editBook{{$b->id_book}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit {{$b->book_name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/editBook" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" id="id_lib" name="id_lib" value="{{$lib->id_lib}}">
                            <input type="hidden" id="id_book" name="id_book" value="{{$b->id_book}}">
                            <div class="form-group">
                            <label for="book_name">Book Name</label>
                            <input type="text" class="form-control" id="book_name" name="book_name" value="{{$b->book_name}}">
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

            {{--  Modal delete Book  --}}
            <div class="modal fade" id="deleteBook{{$b->id_book}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete {{$b->book_name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/deleteBook" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <input type="hidden" id="id_lib" name="id_lib" value="{{$lib->id_lib}}">
                            <input type="hidden" id="id_book" name="id_book" value="{{$b->id_book}}">
                            <p>Are you sure want to delete {{$b->book_name}}?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" class="btn btn-primary" value="Yes">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /.row -->

    <!-- Modal Add Book -->
    @foreach ($library as $lib)
    <div class="modal fade" id="addBook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Book For {{$lib->library_name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/addBook" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" id="id_lib" name="id_lib" value="{{$lib->id_lib}}">
                    <div class="form-group">
                    <label for="book_name">Book Name</label>
                    <input type="text" class="form-control" id="book_name" name="book_name" placeholder="Insert Book Name">
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
  <!-- /.container -->

  <!-- Footer -->


  <!-- Bootstrap core JavaScript -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result) {
         axios.delete('your/route').then(() => {
             window.location.href = '/tags/tag'
         });
        }
      })
  </script>

</body>

</html>
