import AppForm from '../app-components/Form/AppForm';

Vue.component('applicant-relationship-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});