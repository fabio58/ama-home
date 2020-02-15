import AppForm from '../app-components/Form/AppForm';

Vue.component('questionnaire-type-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});