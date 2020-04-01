@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant-document.actions.create'))

@section('body')

    <div class="container-xl">
        {{-- {{$applicant->id}} --}}
                <div class="card">
        {{-- {{$doctypes}} --}}
        <applicant-document-form
            :action="'{{ url('admin/applicant-documents') }}'"
            :doctypesSelects="{{ json_encode($doctypesSelects) }}"
            :applicants="{{ json_encode($applicant) }}"
            
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.applicant-document.actions.create') }}
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                        
                        <div class="form-group">
                           
                                <input type="hidden" v-model="form.applicant_id"   v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('applicant_id'), 'form-control-success': fields.applicant_id && fields.applicant_id.valid}" id="applicant_id" name="applicant_id" placeholder="{{ trans('admin.applicant-document.columns.applicant_id') }}">
                                {{-- <input type="text" v-model="form.document_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('document_id'), 'form-control-success': fields.document_id && fields.document_id.valid}" id="document_id" name="document_id" placeholder="{{ trans('admin.applicant-document.columns.document_id') }}"> --}}
                                <select v-model="form.document_id" class="form-control" id="document_id" name="document_id">
                                    
                                    @foreach ($doctypesSelects as $key => $val)
                                    @php
                                    
                                    $name =  "";
                                    $styleOption="";
                                    switch  ($val->condition_value) {
                                        case 'CASAD':
                                            $name =  "CASADO/A - ";
                                            $styleOption='background: #78DC96 !important';
                                            break;
                                        case 'VIUDA':
                                            $name = "VIUDADO/A - ";
                                            $styleOption='background: #78DC96 !important';
                                            break;
                                        case 'CONCU':
                                            $name = "CONCUBINATO - ";
                                            $styleOption='background: #78DC96 !important';
                                            break;
                                        case 'DIVOR':
                                            $name = "DIVORCIADO/A - ";
                                            $styleOption='background: #78DC96 !important';
                                        break;
                                        case 'S':
                                            $name = "EMBARAZO - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                        case 'DIS':
                                            $name = "DISCAPACIDAD - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                        case 'ENF':
                                            $name = "ENFERMEDAD - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                        case 'PY':
                                            $name = "EXTRANJERA - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                        case 'HS':
                                            $name = "HIJO SOSTEN - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                    }
                                                          
                                    @endphp
                                    <option  style="{{$styleOption}}" value="{{ $val->id }}">{{ $name . $val->name }}</option>
                                    
                                    @endforeach
                                </select>
                                
                          
                        </div>
                        <div class="form-group">
                           
                                @include('brackets/admin-ui::admin.includes.media-uploader', [
                                    'mediaCollection' => app(App\Models\ApplicantDocument::class)->getMediaCollection('social'),
                                    'media' => $applicantDocument->getThumbs200ForCollection('social'),
                                    'label' => 'Documentos'
                                    ])
                            
                        </div>
                    </div> {{-- col --}}
                    
                    
                    <div class="col">
                        <div class="form-group">
                            {{-- {{$doctypes}} --}}
                    

                                <h3>Documentos Cargados</h3>
                                <ul class="list-group">
                                   @foreach ($documents as $val)
                                   @php
                                    
                                   $name =  "";
                                   switch  ($val['applicant_document']['document_type']['condition_value']) {
                                    case 'CASAD':
                                            $name =  "CASADO/A - ";
                                            $styleOption='background: #78DC96 !important';
                                            break;
                                        case 'VIUDA':
                                            $name = "VIUDADO/A - ";
                                            $styleOption='background: #78DC96 !important';
                                            break;
                                        case 'CONCU':
                                            $name = "CONCUBINATO - ";
                                            $styleOption='background: #78DC96 !important';
                                            break;
                                        case 'DIVOR':
                                            $name = "DIVORCIADO/A - ";
                                            $styleOption='background: #78DC96 !important';
                                        break;
                                        case 'S':
                                            $name = "EMBARAZO - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                        case 'DIS':
                                            $name = "DISCAPACIDAD - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                        case 'ENF':
                                            $name = "ENFERMEDAD - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                        case 'PY':
                                            $name = "EXTRANJERA - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                           case 'HS':
                                            $name = "HIJO SOSTEN - ";
                                            $styleOption='background: #78DC96 !important';
                                           break;
                                   }
                                                         
                                   @endphp
                            @php
                                $ruta='storage/images/media/'.$val['id'].'/'.$val['file_name'];
                            @endphp
                            
                                    <a href="{{ asset("images/$ruta") }}" >
                                        <li class="list-group-item list-group-item-success "> <i class="fa fa-check" aria-hidden="true"></i> 
                                        {{   $name.$val['applicant_document']['document_type']['name']}}
                                        </li>
                                    </a>
                               

                                    @endforeach
                                </ul>
                            
                            </div>
                        </div> {{-- col --}}
                    </div> {{-- row --}}
                        
                        {{-- <select class="form-control" v-model="form.document_id">
                            <option v-for="p in doctypesSSelect " v-bind:value="p.id">{{p.name}}</option>
                     </select> --}}
                     {{-- <select v-model="doctypesSelect">
                        <option v-for="doctypesSelect in option" v-bind:value="option.id">
                          {{ option.name }}
                        </option>
                      </select> --}}

{{-- 
                      <multiselect
                      v-model="form.document_id"
                      :options="doctypesSelects"
                      :multiple="false"
                      track-by="id"
                      label="name"
                      :taggable="true"
                      tag-placeholder=""
                      placeholder="{{ trans('admin.applicant.actions.search')  }}">
                  </multiselect> --}}
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </applicant-document-form>

        </div>

        </div>

    
@endsection