@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant.actions.edit', ['name' => $applicant->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <applicant-form
            :action="'{{ route('admin/applicants/update', ['applicant' => $applicant]) }}'"
                :data="{{ $applicant->toJson() }}"
       
                v-cloak
                inline-template>
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                    
                    {{ csrf_field() }}
                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.applicant.actions.documentsatc', ['name' => $applicant->id]) }}
                    </div>
                    {{-- <div class="card-body">
                        @include('admin.applicant.components.form-elements')
                    </div> --}}
                    <P><b>Nombre:</b> {{$applicant->names}}</P>
                    <P><b>Apellidos:</b> {{$applicant->last_names}}</P>
                    
                    @include('brackets/admin-ui::admin.includes.media-uploader', [
                        'mediaCollection' => app(App\Models\Applicant::class)->getMediaCollection('documents'),
                        'media' => $applicant->getThumbs200ForCollection('documents'),
                        //'media' => $applicant->getThumbs200ForCollection('avatar')
                        'label' => 'Documentos área Técnica'
                    ])

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                          
                    <h3>Documentos Requeridos</h3>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-action">Presentación del Proyecto</li>
                        <li class="list-group-item list-group-item-action">Cómputo métrico y presupuestario</li>
                        <li class="list-group-item list-group-item-action">Planilla Diagnóstico déficit cualitativo</li>
                        <li class="list-group-item list-group-item-action">Cronograma</li>
                        <li class="list-group-item list-group-item-action">Resumen Ejecutivo</li>
                        <li class="list-group-item list-group-item-action">Planos</li>
                    </ul>
                        </div>
                        <div class="col-sm">
                          {{-- One of three columns --}}
                        </div>
                        <div class="col-sm">
                          {{-- One of three columns --}}
                        </div>
                      </div>
                    
         
                </form>

        </applicant-form>

        </div>

</div>

@endsection
