@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.contact-method.actions.edit', ['name' => $contactMethod->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <contact-method-form
                :action="'{{ $contactMethod->resource_url }}'"
                :data="{{ $contactMethod->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.contact-method.actions.edit', ['name' => $contactMethod->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.contact-method.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </contact-method-form>

        </div>
    
</div>

@endsection