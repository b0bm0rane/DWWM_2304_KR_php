import {Pays} from "./Pays.js";

const paysUrl = 'http://localhost:3000/api/payss';
// const paysUrl = '.../JSON/listePays.json';

const app = {
    data() {
        return {
            listePays:[]
        }
    },
    async mounted() {
        let rep = await fetch(paysUrl);
        let repForm = await rep.json();
        console.log(repForm);
        for (let pays of repForm){
            let c = new Pays(pays);
            this.listePays.push(c);
        }
        console.log(this.listePays);
    },
    computed: {

    },
    methods: {

    }
}

Vue.createApp(app).mount('#app');
