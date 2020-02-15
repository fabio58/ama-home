<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.questionnaire-template.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.questionnaire-template.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.questionnaire-template.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('questionnaire_type_id'), 'has-success': fields.questionnaire_type_id && fields.questionnaire_type_id.valid }">
    <label for="questionnaire_type_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.questionnaire-template.columns.questionnaire_type_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.questionnaire_type_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('questionnaire_type_id'), 'form-control-success': fields.questionnaire_type_id && fields.questionnaire_type_id.valid}" id="questionnaire_type_id" name="questionnaire_type_id" placeholder="{{ trans('admin.questionnaire-template.columns.questionnaire_type_id') }}">
        <div v-if="errors.has('questionnaire_type_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('questionnaire_type_id') }}</div>
    </div>
</div>


