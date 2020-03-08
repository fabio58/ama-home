@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant-answer.actions.create'))

@section('body')
@php
    print_r($templateCampos->toJson())
    
@endphp
    <div class="container-xl">
        <div class="card" style="padding: 2em">
            <address>
                
                <strong>Nombre: </strong>{{ $applicant->names }} {{ $applicant->last_names }}<br>
                <strong>Cedula: </strong>{{$applicant->government_id}}<br>
                <strong>Estado civil:</strong> {{$applicant->marital_status}}<br>
                
                
            </address>
                    <div class="box-header">
                        
                        <h3 class="box-title"> <i class="	fa fa-file-text"></i> Cuestionarios Postulantes</h3>
                    </div>
            <applicant-answer-form
            :action="'{{ url('admin/applicant-answers') }}'"
            :templa="{{$templateCampos->toJson()}}"
            :questions="{{$questions->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                    {!! csrf_field() !!}
                    {{-- <input type="hidden" v-model="form.applicant_questionnaire_id" name="applicant_questionnaire_id" id="applicant_questionnaire_id"  :value="{{$applicant->id }}"> --}}
                    {{-- <input type="radio" v-model="pick" v-bind:value="a"> --}}
                    @php($num=0)
                    @foreach ($questions as $question)
                    @php($num=$num+1)
                    <div class="form-group">
                        <div class="row">
                            <br>
                            <div class="col-md-4">
                            <label style="margin-top: 9px;color: #000 !important">{{$question['question']}}</label>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="radio">
                                            <label>
                                                <div class="form-group">
                                                  <input type="hidden" name="template{{$num}}" :value="{{$question['id']}}">  
                                                <input type="radio" v-model="form.q{{$num}}"  name="q{{$num}}" id="q{{$num}}" value="t"  required>
                                                    Si
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" v-model="form.q{{$num}}" name="q{{$num}}" id="q{{$num}}" value="f"    required>
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <input type="text" v-model="form.q{{$num}}_text" name="q{{$num}}_text" class="form-control" value="" placeholder="Observaciones...">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
                    
                   
                
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                    {{-- <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button> --}}
                        </form>
                    </applicant-answer-form>

        </div>

</div>





    {{-- <div class="container-xl">

                <div class="card">
        
        <applicant-answer-form
            :action="'{{ url('admin/applicant-answers') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.applicant-answer.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.applicant-answer.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </applicant-answer-form>

        </div>

        </div> --}}

    
@endsection