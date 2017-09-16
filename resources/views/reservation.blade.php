@extends("layout_main")
@section ("content")

<h1>Název: {{ $book->name}}</h1>
@if($book->user_id == 0 )
	<form method="POST" action="/books/reservate">

		<input type="hidden" name="bookId" value="{{$book->id}}">  
		<label for="from" class="form-control" >Od</label>
		<input type="date" name="from" class="form-control" required>
		<label for="to" class="form-control" >Do</label>
		<input type="date" name="to" class="form-control" required>
		<button type="submit" class="btn">Rezervovat</button>
		{{ csrf_field() }}
	</form>
@elseif($book->user_id == auth()->user()->id) 
	Knihu máte rezervovanou 
@else
	Kniha je již rezervovaná. 
@endif 


@endsection