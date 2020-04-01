@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant-answer.actions.create'))

@section('body')

    <div class="container-xl">
        <div class="card" style="padding: 2em">
            <address>
                <strong>Nombre: </strong>{{ $applicant->names }} {{ $applicant->last_names }}<br>
                <strong>Cedula: </strong>{{$applicant->government_id}}<br>
                <strong>Estado civil:</strong> 
                @if($applicant->marital_status=='SOLTE')
                SOLTERO<br>
                @elseif($applicant->marital_status=='CASAD')
                CASADO<br>
                @endif 
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
                    @php($num=0)
                    @foreach ($questions as $question)
                    @php($num=$num+1)
                    <div class="form-group">
                        <div class="row">
                            <br>
                            <div class="col-md-5">
                            <label style="margin-top: 9px;color: #000 !important">{{$question['question']}}</label>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="hidden" name="template{{$num}}" :value="{{$question['id']}}">  
                                                <input type="radio" class="form-check-input"  v-model="form.q{{$num}}"  name="q{{$num}}" id="q{{$num}}" value="t"  required>
                                                <label class="form-check-label">
                                                Si
                                            </label>
                                            </div>
                                        
                                    </div>
                                    <div class="col-md-2">
                                      
                                            <div class="form-group">
                                            <input type="radio" class="form-check-input" v-model="form.q{{$num}}" name="q{{$num}}" id="q{{$num}}" value="f"    required>
                                            <label class="form-check-label">
                                                No
                                            </label>
                                            </div>
                                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                           <input type="text" class="form-control" v-model="form.q{{$num}}_text" name="q{{$num}}_text" class="form-control" value="" placeholder="Observaciones...">
                                </div>
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