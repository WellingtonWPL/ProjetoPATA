@extends('template')

@section('conteudo')
<div style="text-align: center;">

    <h2>{{$msg}}</h2>
</div>

<script>
setTimeout(function(){location.href = "{{url('/home')}}"}, 3000);
</script>


@endsection
