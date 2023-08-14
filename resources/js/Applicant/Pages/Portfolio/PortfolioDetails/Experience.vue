<template>
 <!-- Work Experiences -->
    <div class="grid grid-cols-6 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10">
        <h2 class="col-span-6 text-xl font-bold"> Work Experiences </h2>
        <div class="col-span-2">
            <h2 class="text-base font-medium">Company</h2>
            <input v-model="formData.company" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Company" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Position</h2>
            <input v-model="formData.position" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Position" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Status of Employment**</h2>
            <select v-model="formData.status_of_employment" class="form-input border border-gray-300 rounded text-black py-2 px-3 w-full"> <br><br>
                <option v-for="emp in emp_status" :value="emp.id">{{ emp.status }}</option>
            </select>
            <!--
                <input v-model="formData.status_of_employment" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Status of Employment" /> <br><br>
            -->
        </div>

        <div class="col-start-1 col-span-2">
            <h2 class="text-base font-medium">Worked From</h2>
            <input v-model="formData.from" type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Worked Until</h2>
            <input v-model="formData.to" type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
        </div>

        <div class="col-start-1 col-span-2">
            <h2 class="text-base font-medium">Monthly Salary</h2>
            <input v-model="formData.monthly_salary" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Monthly Salary" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Salary Grade Step</h2>
            <input v-model="formData.sg_step" maxlength="2" type="number" class="form-input border border-gray-300 rounded w-full" placeholder="Salary Grade Step" /> <br><br>
        </div>

        <div class="col-start-1 col-span-2 ">
            <button type="button" @click="addExp" class="btn bg-blue-600 text-white text-center border border-blue-300 hover:bg-blue-500">Add New Work Experience</button>
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
                from: "",
                to: "",
                position: "",
                company: "",
                monthly_salary: "",
                sg_step: "",
                status_of_employment: 0,
            },

            emp_status:{},
        }
    },

    mounted(){
        this.formData['userId'] = this.applicant['id'];
        this.getEmpStatus();
    },

    methods:{
        addExp(){
            let compiledData = this.formData
            //console.log(compiledData)

            axios.post('addExp', {compiledData}).then(({data})=>{
                alert("You have added an experience!")
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
            this.formData.from = ""
            this.formData.to = ""
            this.formData.position = ""
            this.formData.company = ""
            this.formData.monthly_salary = ""
            this.formData.sg_step = ""
            this.formData.status_of_employment = 0
        }

    }
}
</script>

<style lang="">
    
</style>