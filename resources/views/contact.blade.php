       @extends('layouts.main')

@section('content')
<h3>
My peoples :
</h3>

@if(count($peoples))
<ul>
  @foreach($peoples as $person)
  <li>
   {{$person}}
  </li>
 @endforeach
 </ul>

@endif
@endsection