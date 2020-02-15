import AppForm from '../app-components/Form/AppForm';

Vue.component('applicant-form', {
    mixins: [AppForm],
    props: ['diseaselist', 'disabilitylist', 'contactlist', 'educationlevels', 'diseaseselect', 'disabilitiesselect', 'contactmethodsselect'],
    data: function() {
        return {
            form: {
                names:  '' ,
                last_names:  '' ,
                birthdate:  '' ,
                gender:  '' ,
                state_id:  '' ,
                city_id:  '' ,
                education_level:  '' ,
                government_id:  '' ,
                marital_status:  '' ,
                pregnant:  false ,
                pregnancy_due_date:  '' ,
                parent_applicant:  '' ,
                applicant_relationship:  '' ,
                cadaster:  '' ,
                property_id:  '' ,
                occupation:  '' ,
                monthly_income:  '' ,
                disease: {
                    id: '',
                },
                disability: {
                    id: '',
                },
                contact: {
                    id: '',
                    description: '',
                },
            },
            diseases: [],
            disabilities: [],
            contacts: [],
        }
    },
    mounted: function () {

        if(typeof this.diseaselist !== 'undefined') {
            this.diseases = this.diseaselist;
        }
        if(typeof this.disabilitylist !== 'undefined') {
            this.disabilities = this.disabilitylist;
        }
        if(typeof this.contactlist !== 'undefined') {
            this.contacts = this.contactlist;
        }

        if( this.diseases.length === 0 ){
            this.diseases = [{ id:''}];
        }
        if( this.disabilities == 0 ){
            this.disabilities = [{ id:''}];
        }
        if( this.contacts == 0 ){
            this.contacts = [{ id:''}];
        }

    }

    ,
    methods: {
        addNewDisease: function () {
            this.diseases.push(Vue.util.extend({}, this.form.disease));
            console.log(this.diseases);
        },
        deleteDisease: function (index) {
            Vue.delete(this.diseases, index);
        },
        addNewDisability: function () {
            this.disabilities.push(Vue.util.extend({}, this.form.disability))
        },
        deleteDisability: function (index) {
            Vue.delete(this.disabilities, index);
        },
        addNewContact: function () {
            this.contacts.push(Vue.util.extend({}, this.form.contact))
        },
        deleteContact: function (index) {
            Vue.delete(this.contacts, index);
        }
    }
});
