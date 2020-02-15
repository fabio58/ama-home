@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant-relationship.actions.edit', ['name' => $applicantRelationship->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <applicant-relationship-form
                :action="'{{ $applicantRelationship->resource_url }}'"
                :data="{{ $applicantRelationship->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.applicant-relationship.actions.edit', ['name' => $applicantRelationship->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.applicant-relationship.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </applicant-relationship-form>

        </div>
    
</div>

@endsection