@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant.actions.edit', ['name' => $applicant->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <applicant-form
                :action="'{{ $applicant->resource_url }}'"
                :data="{{ $applicant->toJson() }}"
                :diseaselist='[ ]'
                :disabilitylist='[ ]'
                :contactlist='[ ]'
                :diseaseselect="{{$diseases->toJson()}}"
                :educationlevels="{{$educationLevels->toJson()}}"

                :disabilitiesselect="{{$disabilities->toJson()}}"
                :contactmethodsselect="{{$contactMethods->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.applicant.actions.edit', ['name' => $applicant->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.applicant.components.form-elements')
                    </div>
                    @include('brackets/admin-ui::admin.includes.media-uploader', [
                        'mediaCollection' => app(App\Models\Applicant::class)->getMediaCollection('documents'),
                       // 'media' => $applicant->getThumbs200ForCollection('documents'),
                        'label' => 'Documentos'
                    ])

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </applicant-form>

        </div>

</div>

@endsection
