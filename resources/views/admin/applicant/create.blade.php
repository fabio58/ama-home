@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant.actions.create'))

@section('body')

    <div class="container-xl">

        <applicant-form
            :action="'{{ url('admin/applicants') }}'"
            :educationlevels="{{$educationSelect->toJson()}}"
            :diseaseselect="{{$diseaseSelect->toJson()}}"
            :disabilitiesselect="{{$disabilitySelect->toJson()}}"
            :contactmethodsselect="{{$contactMethodSelect->toJson()}}"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus"></i> {{ trans('admin.applicant.actions.create') }}
                            </div>
                            <div class="card-body">
                                @include('admin.applicant.components.form-elements')
                            </div>
                        </div>
                    </div>0
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        @include('admin.applicant.components.form-elements-diseases')
                    </div>
                    <div class="col-sm-6">
                        @include('admin.applicant.components.form-elements-disabilities')
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        @include('admin.applicant.components.form-elements-contact-methods')
                    </div>
                </div>

                <div class="card">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                </div>
                <br>

            </form>

        </applicant-form>

        </div>


@endsection
