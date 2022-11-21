@extends('layouts.layoutBook')
     
@section('content')

<!--
<section>
      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
             <center><h3 style="color:#0A84AC;letter-spacing: 8px;"><b>BOOK LIST</b></h3></center>

          </div>
        </div>
      </div>
</section>


-->
<section>

      <div class="container">
        
        <div class="row">
          <div class="col-md-12">
             <hr><center><h3 style="color:#0A84AC;letter-spacing: 8px;text-shadow: .2em .2em .1em gray;"><b>BOOK LIST</b></h3></center>

          </div>
        </div>
      </div>
</section>
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
              @foreach ($books as $book)
                <div class="col-md-4">
                    <figure>
                        <picture>
                         
                            <img src="image/{{ $book->image }}" height="500px" width="300px" class="img-thumbnail">                        
                        </picture>  
                    </figure>
                </div>
                <div class="col-md-8">

                    <h5><b>Book Name:</b>{{ $book->title }}</h5>
                    <p style="text-align: justify;"><strong>Description:</strong>{{ $book->description }}</p>
                    <p> <a class="btn btn-primary" href="{{ asset('uploads/$book->book_name') }}">Download</a></p>
                    <a href="{{ asset('uploads/1668847001.pdf') }}">Open the pdf!</a>
                   


                    
                    <hr>        
                  
                    
                </div>
                @endforeach
            </div> 
        </div>
    </div>
</div>

    <ul class="pagination">
        
        <li class="page-item"><a class="page-link" href="{{$books->previouspageUrl()}}">Previous</a></li>
        <li class="page-item"><a class="page-link" href="{{$books->nextpageUrl()}}">Next</a></li>
    </ul>
      
@endsection