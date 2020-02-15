<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('admin.disease.title') }}
    </div>
    <div class="card-block">
        <div v-for="(disease, index) in diseases">
            <div class="row">
                <div class="form-group col-sm-12">
                    <div class="input-group">

                        <multiselect
                            name="form.diseases[][id]"
                            v-model="disease.id"
                            :options="diseaseselect"
                            :multiple="false"
                            track-by="id"
                            label="name"
                            :taggable="true"
                            tag-placeholder=""
                            placeholder="{{ trans('admin.applicant.actions.search')  }}">
                        </multiselect>

                        <!--<input type="text" v-model="disease.id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('disease_id'), 'form-control-success': fields.disease_id && fields.disease_id.valid}" id="disease_id" name="diseases[][id]" placeholder="{{ trans('admin.applicant.columns.disease') }}">-->

                        <span class="input-group-append">
                            <button class="btn btn-danger" type="button" @click="deleteDisease(index)" ><i class="fa fa-minus"></i>&nbsp;{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                        </span>
                        <div v-if="errors.has('disease_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('disease_id') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12" style="text-align: right">
                <button type="button" class="btn btn-success" @click="addNewDisease()">
                    <i class="fa fa-plus"></i>
                    {{ trans('brackets/admin-ui::admin.btn.add') }}
                </button>
            </div>
        </div>
    </div>
</div>
