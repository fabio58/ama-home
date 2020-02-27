<div class="form-group row align-items-center" :class="{'has-danger': errors.has('applicant_id'), 'has-success': fields.applicant_id && fields.applicant_id.valid }">
    <label for="applicant_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.applicant-document.columns.applicant_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.applicant_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('applicant_id'), 'form-control-success': fields.applicant_id && fields.applicant_id.valid}" id="applicant_id" name="applicant_id" placeholder="{{ trans('admin.applicant-document.columns.applicant_id') }}">
        <div v-if="errors.has('applicant_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('applicant_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('document_id'), 'has-success': fields.document_id && fields.document_id.valid }">
    <label for="document_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.applicant-document.columns.document_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.document_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('document_id'), 'form-control-success': fields.document_id && fields.document_id.valid}" id="document_id" name="document_id" placeholder="{{ trans('admin.applicant-document.columns.document_id') }}">
        <div v-if="errors.has('document_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('document_id') }}</div>
    </div>
</div>


