<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('admin.contact-method.title') }}
    </div>
    <div class="card-block">

        <div v-for="(contact, index) in contacts">
            <div class="row">
                <div class="form-group col-sm-4">

                    <multiselect

                        v-model="form.contact.id"
                        :options="contactmethodsselect"
                        :multiple="false"
                        track-by="id"
                        label="name"
                        :taggable="true"
                        tag-placeholder=""
                        placeholder="{{ trans('admin.applicant.actions.search')  }}">
                    </multiselect>

                    <!--<input type="text" v-model="form.contact_method_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('contact_method_id'), 'form-control-success': fields.contact_method_id && fields.contact_method_id.valid}" id="contact_method_id" name="contact_method_id" placeholder="{{ trans('admin.applicant.columns.contact-method') }}">-->
                    <div v-if="errors.has('contact_method_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('contact_method_id') }}</div>
                </div>
                <div class="form-group col-sm-8">
                    <div class="input-group">
                        <input type="text" v-model="contact.description" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('description'), 'form-control-success': fields.description && fields.description.valid}" id="description" name="contacts[][description]" placeholder="{{ trans('admin.applicant.columns.contact-description') }}">
                        <span class="input-group-append">
                            <button class="btn btn-danger" type="button" @click="deleteContact(index)" ><i class="fa fa-minus"></i>&nbsp;{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                        </span>
                        <div v-if="errors.has('description')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('description') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12" style="text-align: right">
                <button type="button" class="btn btn-success" @click="addNewContact()">
                    <i class="fa fa-plus"></i>
                    {{ trans('brackets/admin-ui::admin.btn.add') }}
                </button>
            </div>
        </div>

    </div>
</div>
