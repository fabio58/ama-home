@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.applicant.actions.viewatc'))

@section('body')

    <applicant-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/applicants/viewatc') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.applicant.actions.viewatc') }}
                        {{-- <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/applicants/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.applicant.actions.create') }}</a> --}}
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">
                                            
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'id'">{{ trans('admin.applicant.columns.id') }}</th>
                                        <th is='sortable' :column="'names'">{{ trans('admin.applicant.columns.names') }}</th>
                                        <th is='sortable' :column="'last_names'">{{ trans('admin.applicant.columns.last_names') }}</th>
                                        <th is='sortable' :column="'government_id'">{{ trans('admin.applicant.columns.government_id') }}</th>
                                        <th is='sortable' :column="'state_id'">{{ trans('admin.applicant.columns.state_id') }}</th>
                                        <th is='sortable' :column="'city_id'">{{ trans('admin.applicant.columns.city_id') }}</th>
                                        <th is='sortable' :column="'marital_status'">{{ trans('admin.applicant.columns.marital_status') }}</th>
                                        <th is='sortable' :column="'monthly_income'">{{ trans('admin.applicant.columns.monthly_income') }}</th>
                                       
                                        {{-- <th is='sortable' :column="'gender'">{{ trans('admin.applicant.columns.gender') }}</th>
                                        <th is='sortable' :column="'education_level'">{{ trans('admin.applicant.columns.education_level') }}</th>
                                        <th is='sortable' :column="'pregnant'">{{ trans('admin.applicant.columns.pregnant') }}</th>
                                        <th is='sortable' :column="'pregnancy_due_date'">{{ trans('admin.applicant.columns.pregnancy_due_date') }}</th>
                                        <th is='sortable' :column="'parent_applicant'">{{ trans('admin.applicant.columns.parent_applicant') }}</th>
                                        <th is='sortable' :column="'applicant_relationship'">{{ trans('admin.applicant.columns.applicant_relationship') }}</th>
                                        <th is='sortable' :column="'cadaster'">{{ trans('admin.applicant.columns.cadaster') }}</th>
                                        <th is='sortable' :column="'property_id'">{{ trans('admin.applicant.columns.property_id') }}</th>
                                        <th is='sortable' :column="'occupation'">{{ trans('admin.applicant.columns.occupation') }}</th> --}}

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="20">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/applicants')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/applicants/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.names }}</td>
                                        <td>@{{ item.last_names }}</td>
                                        <td>@{{ item.government_id }}</td>
                                        <td>@{{ item.state.name }}</td>
                                        <td>@{{ item.city.name }}</td>
                                        <td>@{{ item.marital_status }}</td>
                                        <td>@{{ item.monthly_income }}</td>
                                       
                                        {{-- <td>@{{ item.gender }}</td>
                                        <td>@{{ item.education_level.name }}</td>
                                        <td>@{{ item.pregnant }}</td>
                                        <td>@{{ item.pregnancy_due_date }}</td>
                                        <td>@{{ item.parent_applicant }}</td>
                                        <td>@{{ item.applicant_relationship }}</td>
                                        <td>@{{ item.cadaster }}</td>
                                        <td>@{{ item.property_id }}</td>
                                        <td>@{{ item.occupation }}</td> --}}
                                        
                                        <td>
                                            <div class="row no-gutters">
                                                {{-- <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/show'" title="{{ trans('brackets/admin-ui::admin.btn.show') }}" role="button"><i class="fa fa-list-ol"></i></a>
                                                </div> --}}
                                                <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info" :href="'/admin/applicant-documents/'+item.id+'/2/create'" title="{{ trans('brackets/admin-ui::admin.btn.documentsatc') }}" role="button"><i class="fa fa-file-o"></i></a>
                                                </div>
                                                {{-- <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.viewatc.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.viewatc.try_changing_items') }}</p>
                                {{-- <a class="btn btn-primary btn-spinner" href="{{ url('admin/applicants/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.applicant.actions.create') }}</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </applicant-listing>

@endsection