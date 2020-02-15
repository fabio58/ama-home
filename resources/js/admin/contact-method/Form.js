import AppForm from '../app-components/Form/AppForm';

Vue.component('contact-method-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});