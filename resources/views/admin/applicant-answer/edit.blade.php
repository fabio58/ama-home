@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant-answer.actions.edit', ['name' => $applicantAnswer->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <applicant-answer-form
                :action="'{{ $applicantAnswer->resource_url }}'"
                :data="{{ $applicantAnswer->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.applicant-answer.actions.edit', ['name' => $applicantAnswer->id]) }}
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
    
</div>

@endsection