@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant-document.actions.edit', ['name' => $applicantDocument->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <applicant-document-form
                :action="'{{ $applicantDocument->resource_url }}'"
                :data="{{ $applicantDocument->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.applicant-document.actions.edit', ['name' => $applicantDocument->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.applicant-document.components.form-elements')
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