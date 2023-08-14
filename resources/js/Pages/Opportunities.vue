<template lang="">
    <div>
        
        <EditJobForm v-if="editing" :data="currentOpp" @closeForm="closeForm"></EditJobForm>

        <div v-if="!editing">
            <h1 class="my-8 text-center">List of Opportunities Published</h1>
            <div class="flex justify-center">
                <table class="table-fixed border-separate w-4/5">
                    <thead>
                        <router-link class="btn w-56 bg-blue-600 text-white border border-blue-300 hover:bg-blue-500 mb-5" to="/admin/opportunity">
                            <span class="mx-auto">Add Opportunity</span>
                        </router-link>
                    </thead>
                    <thead>
                        <tr>
                            <th class="w-3/12 border-b border-gray-500">Title</th>
                            <th class="w-3/12 border-b border-gray-500">Position</th>
                            <th class="w-3/12 border-b border-gray-500">Deadline of Submission</th>
                            <th class="w-3/12 border-b border-gray-500">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="opp in opps" class="py-2">
                            <td class="font-semibold"><div class="py-3">
                                {{ opp.title }}
                            </div></td>
                            <td>{{ opp.position }}</td>
                            <td>{{ convertTimestamp(opp.submission_deadline) }}</td>
                            <td class="text-center">
                                <button class="btn-primary rounded p-1 px-1 shadow-sm" @click="openJobModal(opp)">View</button> | 
                                <button class="btn-warning rounded p-1 px-1 shadow-sm" @click="editOpp(opp)">Edit</button> | 
                                <button class="btn-danger rounded p-1 shadow-sm" @click="deleteOppurtunity(opp)">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <JobModal v-show="showing" :data="currentOpp" @close="closeJobModal"></JobModal>
    
    </div>
</template>

<script>
import JobModal from '../Components/JobModal.vue';
import EditJobForm from './EditJobForm.vue';

export default {
    components: {
        JobModal,
        EditJobForm
    },

    data(){
        return{
            opps: '',
            showing: false,
            editing: false,
            currentOpp: ''
        }
    },

    mounted(){
        this.getter();
    },

    methods:{
        closeJobModal(){
            this.showing = false;
        },

        openJobModal(opp){
            this.currentOpp = opp;
            this.showing = true;
        },

        editOpp(opp){
            this.currentOpp = opp;
            this.editing = true;
        },

        closeForm(){
            this.editing = false;
            this.getter();
        },

        getter(){
            axios.post('getAll').then(({data})=>{
                this.opps = data;
            });
        },

        deleteOppurtunity(oppurtunity){
            if (confirm("Delete oppurtunity?")){
                axios.post('deleteOppurtunity/' + oppurtunity.id).
                then(({data})=>{
                    this.getter();
                    alert("Delete successful");
                })
            }
        },

        convertTimestamp(ts){
            ts = ts.split(/[- :]/);
            var d = new Date(ts[0], ts[1]-1, ts[2], ts[3], ts[4]);
            var time = d.toLocaleTimeString();
            return d.toDateString() + ' ' + time.slice(0, 5) + ' ' + time.slice(-2);
        }
    }
}
</script>

<style lang="">
    
</style>