<template lang="">
    <!-- Trainings -->
    <div class="grid grid-cols-2 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10">
        <h2 class="col-span-3 text-xl font-bold"> Trainings </h2>
        <div>
            <h2 class="text-base font-medium">Title of Courses</h2>
            <input v-model="formData.title" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Seminar/Conference/Workshop/Short Courses" /> <br><br>
        </div>

        <div>
            <h2 class="text-base font-medium">Hours</h2>
            <input v-model="formData.hours" type="number" class="form-input border border-gray-300 rounded w-full" placeholder="Hours" /> <br><br>
        </div>

        <div>
            <h2 class="text-base font-medium">Inclusive Date From</h2>
            <input v-model="formData.from" type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
        </div>

        <div>
            <h2 class="text-base font-medium">Conducted/Sponsored By</h2>
            <input v-model="formData.sponsor" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Conducted/Sponsored By" /> <br><br>
        </div>

        <div>
            <h2 class="text-base font-medium">Inclusive Date To</h2>
            <input v-model="formData.to" type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
        </div>

        <div>
            <h2 class="text-base font-medium">Training Type*</h2>
            <select v-model="formData.type" class="form-input border border-gray-300 rounded text-black py-2 px-3 w-full"> <br><br>
                <option v-for="emp in emp_status" :value="emp.id">{{ emp.status }}</option>
            </select>
        </div>

        <div class="col-span-1">
            <button @click="addTrain" type="button" class="btn bg-blue-600 text-white border border-blue-300 hover:bg-blue-500">Add New Training</button>
        </div>
        <!--
        <div class="col-start-1 col-span-2 mt-2">
            <button class="btn bg-gray-500 text-right hover:bg-gray-400">Cancel</button>
        </div>
        -->

    </div>
</template>

<script>
export default {
    props: ['applicant'],
    
    data(){
        return{
            formData: {
                userId: 0,
                title: "",
                hours: "",
                from: "",
                to: "",
                sponsor: "",
                type: 0
            },
            
            emp_status:{},
        }
    },

    mounted(){
        this.formData['userId'] = this.applicant['id'];
        this.getEmpStatus();
    },

    methods:{
        addTrain(){
            let compiledData = this.formData
            //console.log(compiledData)

            axios.post('addTrain', {compiledData}).then(({data})=>{
                alert("You have added a training experience")
                this.clearForm()
            });
        },

        getEmpStatus(){
            axios.post('getEmpStatus').then(({data})=>{
                this.emp_status = data;
            })
        },

        clearForm(){
            // clear the form
            this.formData.title = ""
            this.formData.hours = ""
            this.formData.from = ""
            this.formData.to = ""
            this.formData.sponsor = ""
            this.formData.type = 0
        }

    }
}
</script>

<style lang="">
    
</style>