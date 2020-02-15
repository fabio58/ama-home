import AppForm from '../app-components/Form/AppForm';

Vue.component('questionnaire-template-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                enabled:  false ,
                questionnaire_type_id:  '' ,
                
            }
        }
    }

});