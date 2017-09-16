@extends("layout_main")
@section ("content")

<h1>Název: {{ $book->name}}</h1>

<h2>
	@if($book->user_id == 0 )
		K dispozici
		<a href="/books/{{ $book->id }}/reservation">Rezervovat</a>
		
	@else 
		Zapůjčená 			
	@endif 
</h2>
<h3>Popis</h3>
{{ $book->detail}}


@endsection 