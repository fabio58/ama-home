import AppForm from '../app-components/Form/AppForm';

Vue.component('applicant-document-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                applicant_id:  '' ,
                document_id:  '' ,
                
            }
        }
    }

});