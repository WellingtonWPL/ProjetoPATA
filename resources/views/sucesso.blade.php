@extends('template')

@section('conteudo')
<div style="text-align: center;">

    <h2>{{$msg}}</h2>
</div>

<script>
setTimeout(location.href = "{{url('/home')}}",15000);
</script>


@endsection
