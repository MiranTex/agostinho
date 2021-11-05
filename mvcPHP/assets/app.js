import Vue from 'vue';
import Swal from 'sweetalert2'
import axios from 'axios';

var app = new Vue({ 
    el: '#app',
    data(){
        return{
            message: 'Hello Vue!',
            nome:"",
            n_doc: "",
            doc:null,
            email:"",
            endereco:"",
            telefone:"",
            req:null
        }
        
    },

    methods:{
        getDoc(e){
            this.doc = e.target.files[0];

            console.log(this.doc);
        },

        getReq(e){
            this.req = e.target.files[0];
        },

        submeter:()=>{
            Swal.fire(
                app.message,
                'That thing is still around?',
                'question'
            );
            axios.post('marcacao.php ',{

            }).then(res=>console.log(res));
        }
    }
});