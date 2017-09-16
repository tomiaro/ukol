@extends("layout_main")
@section ("content")
<table class="table">
	<thead>
		<tr>
			<th>Název</th>
		</tr>
	</thead>
	<tbody>
	 @foreach ($books as $book)
		<tr>
			<td>{{ $book->name }}</td>
			<td><a href="/books/{{ $book->id }}/reservation">rezervovat</a></td>
			<td><a href="/books/{{ $book->id }}">detail</a></td>
		</tr>
	@endforeach 
	</tbody>



</table>

{{ $books->links() }}
@endsection 