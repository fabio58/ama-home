<div class="form-group row align-items-center" :class="{'has-danger': errors.has('applicant_questionnaire_id'), 'has-success': fields.applicant_questionnaire_id && fields.applicant_questionnaire_id.valid }">
    <label for="applicant_questionnaire_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.applicant-answer.columns.applicant_questionnaire_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.applicant_questionnaire_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('applicant_questionnaire_id'), 'form-control-success': fields.applicant_questionnaire_id && fields.applicant_questionnaire_id.valid}" id="applicant_questionnaire_id" name="applicant_questionnaire_id" placeholder="{{ trans('admin.applicant-answer.columns.applicant_questionnaire_id') }}">
        <div v-if="errors.has('applicant_questionnaire_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('applicant_questionnaire_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('answer'), 'has-success': fields.answer && fields.answer.valid }">
    <label for="answer" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.applicant-answer.columns.answer') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.answer" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('answer'), 'form-control-success': fields.answer && fields.answer.valid}" id="answer" name="answer" placeholder="{{ trans('admin.applicant-answer.columns.answer') }}">
        <div v-if="errors.has('answer')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('answer') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('extended_value'), 'has-success': fields.extended_value && fields.extended_value.valid }">
    <label for="extended_value" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.applicant-answer.columns.extended_value') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.extended_value" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('extended_value'), 'form-control-success': fields.extended_value && fields.extended_value.valid}" id="extended_value" name="extended_value" placeholder="{{ trans('admin.applicant-answer.columns.extended_value') }}">
        <div v-if="errors.has('extended_value')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('extended_value') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('question_id'), 'has-success': fields.question_id && fields.question_id.valid }">
    <label for="question_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.applicant-answer.columns.question_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.question_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('question_id'), 'form-control-success': fields.question_id && fields.question_id.valid}" id="question_id" name="question_id" placeholder="{{ trans('admin.applicant-answer.columns.question_id') }}">
        <div v-if="errors.has('question_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('question_id') }}</div>
    </div>
</div>


