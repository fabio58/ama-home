    @extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant-answer.actions.show'))

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
          

                    {{-- <input type="hidden" v-model="form.applicant_questionnaire_id" name="applicant_questionnaire_id" id="applicant_questionnaire_id"  :value="{{$applicant->id }}"> --}}
                    {{-- <input type="radio" v-model="pick" v-bind:value="a"> --}}
                    @php($num=0)
                    @foreach ($values as $value)
                    @php($num=$num+1)
                    <div class="form-group">
                        <div class="row">
                            <br>
                            <div class="col-md-5">
                            <label style="margin-top: 9px;color: #000 !important">{{$value['questionnaire_template_questions']['question']}}</label>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-2">
                                     
                                            <div class="form-group">
                                                @if($value['answer']=='t')
                                                <input type="radio" class="form-check-input"  name="q{{$num}}" id="q{{$num}}" checked disabled='disabled'>             
                                                @else
                                                <input type="radio"  class="form-check-input" name="q{{$num}}" id="q{{$num}}" value="" disabled='disabled'> 
                                                @endif            
                                                <label class="form-check-label">
                                                Si
                                                </label>
                                                </div>
                                      
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                          
                                                @if($value['answer']=='f')
                                                <input type="radio" class="form-check-input" name="q{{$num}}" id="q{{$num}}" checked disabled='disabled'>             
                                                @else
                                                <input type="radio"class="form-check-input"  name="q{{$num}}" id="q{{$num}}" value="" disabled='disabled'> 
                                                @endif  
                                                <label class="form-check-label">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <input type="text"  name="q{{$num}}_text" readonly class="form-control" value="{{$value['extended_value']}}" disabled='disabled'>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr>
 
                 

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