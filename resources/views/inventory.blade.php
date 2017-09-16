@extends("layout_main")
@section ("content")


<table class="table">
	<thead>
		<tr>
			<th>Název</th>
			<th>Od</th>
			<th>Do</th>
			<th>Zbývá dní</th>

		</tr>
	</thead>
	<tbody>
	 @foreach ($books as $book)
		<tr>
			<td>{{$book->name}}</td>
			<td>{{Carbon\Carbon::parse($book->fromD)->format('d.m.y')}}</td>
			<td>{{Carbon\Carbon::parse($book->toD)->format('d.m.y')}}</td>
			<td>{{date_diff(date_create($book->fromD), date_create($book->toD))->format('%a')}} </td>
			<td><form method="POST" action="inventory">
				 <input type="hidden" name="bookId" value="{{$book->id}}">
				 <input type="hidden" name="_method" value="DELETE">
				 <button type="submit" class="btn btn-danger">Zrušit zápůjčku</button>
				    {{ csrf_field() }}
			</form></td>
		</tr>
	@endforeach 
	</tbody>



</table>

{{ $books->links() }}
@endsection 