@extends('layouts.layoutBook')
     
@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Book List Show In >>>>>></h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('books.create') }}"> Add New Book</a>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>CoverImage</th>
            <th>Name</th>
            <th>Descriptions</th>
            <th>Category</th>
            <th>Author</th>
           
            <th width="280px">Action</th>
        </tr>
        @foreach ($books as $book)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="image/{{ $book->image }}" width="100px"></td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->description }}</td>
           
            <td>{{ $book->category_id }}</td>
            <td>{{ $book->author }}</td>
          
            <td>
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $books->links() !!}
        
@endsection