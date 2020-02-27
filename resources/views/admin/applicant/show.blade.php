@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant.actions.edit', ['name' => $postulante->id]))

@section('body')
<pre>

    {{-- {{$questions}} --}}
</pre>
{{-- {{$questions->extended_value}} --}}
    <div class="container-xl">
        <div class="card" style="padding: 2em">
            <address>
                
                <strong>Nombre: </strong>{{ $postulante->names }} {{ $postulante->last_names }}<br>
                <strong>Cedula: </strong>{{$postulante->government_id}}<br>
                <strong>Estado civil:</strong> {{$postulante->marital_status}}<br>
                
                
            </address>
                    <div class="box-header">
                        
                        <h3 class="box-title"> <i class="	fa fa-file-text"></i> Cuestionarios Postulantes</h3>
                    </div>
            <applicant-form
            :action="'{{ $postulante->resource_url }}'"
                v-cloak
                inline-template>

                <form role="form" method="post" >
                    {!! csrf_field() !!}
                    <input type="hidden" name="id" value="{!! $postulante->id !!}">

                    @php($num=0)
                    @foreach ($questions as $question)
                    @php($num=$num+1)
                    <div class="form-group">
                        <div class="row">
                            <br>
                            <div class="col-md-4">
                            <label style="margin-top: 9px;color: #000 !important">{{$question->extended_value}}</label>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="radio">
                                            <label>
                                                <div class="form-group">
                                                <input type="radio" name="q{{$num}}" id="q{{$num}}" value="t"  required>
                                                    Si
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="q{{$num}}" id="q{{$num}}" value="f"    required>
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <input type="text" name="q{{$num}}_text" class="form-control" value="" placeholder="Observaciones...">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    
                
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </form>
        </applicant-form>

        </div>

</div>
<style type="text/css">
    label {
    color: #000 !important;
}
    </style>

@endsection
