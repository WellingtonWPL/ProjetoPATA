@extends('template')

@section('conteudo')
<div style="text-align: center;">
    <div class="card ">

        <div class="card-body">
            <h2>{{$msg}}</h2>
        </div>

      </div>
    </div>
</div>

<script>
setTimeout(function(){location.href = "{{url('/lista')}}"}, 2000);
</script>


@endsection
