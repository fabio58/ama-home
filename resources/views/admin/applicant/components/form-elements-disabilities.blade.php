<div class="card">
    <div class="card-header">
        <i class="fa fa-check"></i>{{ trans('admin.disability.title') }}
    </div>
    <div class="card-block">

        <div v-for="(disability, index) in disabilities">
            <div class="row">
                <div class="form-group col-sm-12">
                    <div class="input-group">

                        <multiselect
                            name="form.disabilities[][id]"
                            v-model="form.disability.id"
                            :options="disabilitiesselect"
                            :multiple="false"
                            track-by="id"
                            label="name"
                            :taggable="true"
                            tag-placeholder=""
                            placeholder="{{ trans('admin.applicant.actions.search')  }}">
                        </multiselect>

                        <!--<input type="text" v-model="disability.id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('disability_id'), 'form-control-success': fields.disability_id && fields.disability_id.valid}" id="disability_id" name="disability_id" placeholder="{{ trans('admin.applicant.columns.disability') }}">-->

                        <span class="input-group-append">
                            <button class="btn btn-danger" type="button" @click="deleteDisability(index)" ><i class="fa fa-minus"></i>&nbsp;{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                        </span>
                        <div v-if="errors.has('disability_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('disability_id') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12" style="text-align: right">
                <button type="button" class="btn btn-success" @click="addNewDisability()">
                    <i class="fa fa-plus"></i>
                    {{ trans('brackets/admin-ui::admin.btn.add') }}
                </button>
            </div>
        </div>

    </div>
</div>
