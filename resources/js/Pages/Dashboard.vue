<template>
    <div>
        <div class="container">
            <h1>Pending Applications</h1>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-5 mr-5">
            <table class="w-full text-sm text-left  text-black">
                <thead class="text-xs text-white uppercase bg-primary">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Company Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Applicant
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody v-for="opp in this.opps">
                    <tr class="border-b bg-gray-50" v-if="opp.pend_status == 1">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ opp.title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ opp.surname }},
                            {{ opp.firstname }}
                        </td>
                        <td class="px-6 py-4">
                            <button @click="showDetails(opp)" class="btn btn-primary" type="button"> View </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- yep, I must learn more about the front end stuff ~Maku -->
        <br><br><br><br>
        <div class="container">
            <h1>Rejected Applications</h1>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-5 mr-5">
            <table class="w-full text-sm text-left  text-black">
                <thead class="text-xs text-white uppercase bg-primary">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Company Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Applicant
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody v-for="opp in this.opps">
                    <tr class="border-b bg-gray-50" v-if="opp.pend_status == 0">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ opp.title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ opp.surname }},
                            {{ opp.firstname }}
                        </td>
                        <td class="px-6 py-4">
                            <button @click="showDetails(opp)" class="btn btn-primary" type="button"> View </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <pendingForm 
        @close="hideDetails"
        v-show="showing" 
        :user="userDetails"
        :whenOpp="whenOpp"
        ></pendingForm>

    </div>
</template>

<script>
import pendingForm from '../Components/userUpDetails.vue';

export default {
    props: ['adminId'],

    components: {
        pendingForm,
    },

    data(){
        return {
            showing: false,
            portfolioShowing: true,
            opps: {},
            whenOpp: {},

            userDetails: {}
        }
    },
   // a function that runs on first start
    mounted(){
        //console.log("the object is "+this.applicantData)
        this.loadPending();
    },

    methods:{
        loadPending(){
            //let applicantId = this.applicant.id

            // for some reason it doesn't work with just 'getPending'
            axios.post('getPendingAsAdmin').then(({data})=>{
                this.opps = data;
            });
        },

        showDetails(obj){
            this.userDetails = obj
            this.whenOpp = Math.random()
            console.log(this.userDetails)
            this.showing = true;
        },

        hideDetails(){
            this.showing = false
        },
    } 
}
</script>

<style scoped>

</style>
