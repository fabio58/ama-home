@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.questionnaire-type.actions.edit', ['name' => $questionnaireType->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <questionnaire-type-form
                :action="'{{ $questionnaireType->resource_url }}'"
                :data="{{ $questionnaireType->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.questionnaire-type.actions.edit', ['name' => $questionnaireType->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.questionnaire-type.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </questionnaire-type-form>

        </div>
    
</div>

@endsection