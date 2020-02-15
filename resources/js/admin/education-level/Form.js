import AppForm from '../app-components/Form/AppForm';

Vue.component('education-level-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name:  '' ,
                
            }
        }
    }

});