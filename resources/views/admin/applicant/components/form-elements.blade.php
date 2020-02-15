<div class="row">
    <div class="form-group col-sm-6">
        <label for="names">{{ trans('admin.applicant.columns.names') }}</label>
        <input type="text" v-model="form.names" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('names'), 'form-control-success': fields.names && fields.names.valid}" id="names" name="names" placeholder="{{ trans('admin.applicant.columns.names') }}">
        <div v-if="errors.has('names')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('names') }}</div>
    </div>
    <div class="form-group col-sm-6">
        <label for="last_names" >{{ trans('admin.applicant.columns.last_names') }}</label>
        <input type="text" v-model="form.last_names" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_names'), 'form-control-success': fields.last_names && fields.last_names.valid}" id="last_names" name="last_names" placeholder="{{ trans('admin.applicant.columns.last_names') }}">
        <div v-if="errors.has('last_names')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_names') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-3">
        <label for="government_id" >{{ trans('admin.applicant.columns.government_id') }}</label>
        <input type="text" v-model="form.government_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('government_id'), 'form-control-success': fields.government_id && fields.government_id.valid}" id="government_id" name="government_id" placeholder="{{ trans('admin.applicant.columns.government_id') }}">
        <div v-if="errors.has('government_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('government_id') }}</div>
    </div>
    <div class="form-group col-sm-3">
        <label for="marital_status" >{{ trans('admin.applicant.columns.marital_status') }}</label>
        <input type="text" v-model="form.marital_status" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('marital_status'), 'form-control-success': fields.marital_status && fields.marital_status.valid}" id="marital_status" name="marital_status" placeholder="{{ trans('admin.applicant.columns.marital_status') }}">
        <div v-if="errors.has('marital_status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('marital_status') }}</div>
    </div>
    <div class="form-group col-sm-3">
        <label for="gender">{{ trans('admin.applicant.columns.gender') }}</label>
        <input type="text" v-model="form.gender" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('gender'), 'form-control-success': fields.gender && fields.gender.valid}" id="gender" name="gender" placeholder="{{ trans('admin.applicant.columns.gender') }}">
        <div v-if="errors.has('gender')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gender') }}</div>
    </div>
    <div class="form-group col-sm-3">
        <label for="birthdate">{{ trans('admin.applicant.columns.birthdate') }}</label>
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.birthdate" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('birthdate'), 'form-control-success': fields.birthdate && fields.birthdate.valid}" id="birthdate" name="birthdate" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('birthdate')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('birthdate') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-4">
        <label for="property_id">{{ trans('admin.applicant.columns.property_id') }}</label>
        <input type="text" v-model="form.property_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('property_id'), 'form-control-success': fields.property_id && fields.property_id.valid}" id="property_id" name="property_id" placeholder="{{ trans('admin.applicant.columns.property_id') }}">
        <div v-if="errors.has('property_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('property_id') }}</div>
    </div>
    <div class="form-group col-sm-4">
        <label for="cadaster">{{ trans('admin.applicant.columns.cadaster') }}</label>
        <input type="text" v-model="form.cadaster" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cadaster'), 'form-control-success': fields.cadaster && fields.cadaster.valid}" id="cadaster" name="cadaster" placeholder="{{ trans('admin.applicant.columns.cadaster') }}">
        <div v-if="errors.has('cadaster')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cadaster') }}</div>
    </div>
</div>

<div class="row" style="display: none">
    <div class="form-group col-sm-6">
        <label for="parent_applicant">{{ trans('admin.applicant.columns.parent_applicant') }}</label>
        <input type="hidden" v-model="form.parent_applicant" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('parent_applicant'), 'form-control-success': fields.parent_applicant && fields.parent_applicant.valid}" id="parent_applicant" name="parent_applicant" placeholder="{{ trans('admin.applicant.columns.parent_applicant') }}">
        <input type="text" v-model="form.parent_applicant_text" class="form-control" :class="{'form-control-danger': errors.has('parent_applicant'), 'form-control-success': fields.parent_applicant && fields.parent_applicant.valid}" id="parent_applicant_text" name="parent_applicant_text" placeholder="{{ trans('admin.applicant.columns.parent_applicant') }}">
        <div v-if="errors.has('parent_applicant')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('parent_applicant') }}</div>
    </div>
    <div class="form-group col-sm-6">
        <label for="applicant_relationship">{{ trans('admin.applicant.columns.applicant_relationship') }}</label>
        <input type="text" v-model="form.applicant_relationship" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('applicant_relationship'), 'form-control-success': fields.applicant_relationship && fields.applicant_relationship.valid}" id="applicant_relationship" name="applicant_relationship" placeholder="{{ trans('admin.applicant.columns.applicant_relationship') }}">
        <div v-if="errors.has('applicant_relationship')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('applicant_relationship') }}</div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-4">
        <label for="education_level">{{ trans('admin.applicant.columns.education_level') }}</label>

        <multiselect
            v-model="form.education_level"
            :options="educationlevels"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.applicant.actions.search')  }}">
        </multiselect>

        <!--<input type="text" v-model="form.education_level" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('education_level'), 'form-control-success': fields.education_level && fields.education_level.valid}" id="education_level" name="education_level" placeholder="{{ trans('admin.applicant.columns.education_level') }}">-->
        <div v-if="errors.has('education_level')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('education_level') }}</div>
    </div>
    <div class="form-group col-sm-4">
        <label for="occupation">{{ trans('admin.applicant.columns.occupation') }}</label>
        <input type="text" v-model="form.occupation" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('occupation'), 'form-control-success': fields.occupation && fields.occupation.valid}" id="occupation" name="occupation" placeholder="{{ trans('admin.applicant.columns.occupation') }}">
        <div v-if="errors.has('occupation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('occupation') }}</div>
    </div>
    <div class="form-group col-sm-4">
        <label for="monthly_income">{{ trans('admin.applicant.columns.monthly_income') }}</label>
        <input type="text" v-model="form.monthly_income" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('monthly_income'), 'form-control-success': fields.monthly_income && fields.monthly_income.valid}" id="monthly_income" name="monthly_income" placeholder="{{ trans('admin.applicant.columns.monthly_income') }}">
        <div v-if="errors.has('monthly_income')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('monthly_income') }}</div>
    </div>
</div>

