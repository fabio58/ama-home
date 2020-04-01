import AppForm from '../app-components/Form/AppForm';

Vue.component('applicant-answer-form', {
    mixins: [AppForm],
    props: ['templa', 'questions'],
    data: function() {
        return {
            form: {
                applicant_questionnaire_id:  '' ,
                template1:  '' ,
                template2:  '' ,
                template3:  '' ,
                template4:  '' ,
                template5:  '' ,
                template6:  '' ,
                template7:  '' ,
                template8:  '' ,
                // answer:  '' ,
                // extended_value:  '' ,
                // question_id:  '' ,
                q1:'',
                q2:'',
                q3:'',
                q4:'',
                q5:'',
                q6:'',
                q7:'',
                q8:'',
                q1_text:'',
                q2_text:'',
                q3_text:'',
                q4_text:'',
                q5_text:'',
                q6_text:'',
                q7_text:'',
                q8_text:'',  
            },
           
        }
    },
    mounted: function () {
        setTimeout(() => { 
           
            this.form.applicant_questionnaire_id=this.templa[0]['id']
            for (var i in this.questions)
            {  
                    var id =this.questions[i]['id']
                    switch (id) {
                        case 1:
                                this.form.template1=this.questions[i]['id']
                                break;
                          case 2:
                                this.form.template2=this.questions[i]['id']
                                break;
                                
                          case 3:
                                this.form.template3=this.questions[i]['id']
                                break;
                          case 4:
                                this.form.template4=this.questions[i]['id']
                                break;
                          case 5:
                                this.form.template5=this.questions[i]['id']
                                break;
                          case 6:
                                this.form.template6=this.questions[i]['id']
                                break;
                          case 7:
                                this.form.template7=this.questions[i]['id']
                                break;
                          case 8:
                                this.form.template8=this.questions[i]['id']
                                break;
                    }
            }
          }, 500)
     
    }



});
