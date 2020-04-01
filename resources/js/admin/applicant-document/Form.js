import AppForm from '../app-components/Form/AppForm';

Vue.component('applicant-document-form', {
    mixins: [AppForm],
     props: ['applicants'],
    data: function() {
        return {
            form: {
                applicant_id:  '' ,
                document_id:  '' 
                
                
            }, 
            doctypesSelects: [],
            mediaCollections: ['social'],
            applicant_id:''
        }
    },
    mounted: function () {
        setTimeout(() => { 
        
            this.form.applicant_id = this.applicants.id;
        
    }, 500)
    }

});