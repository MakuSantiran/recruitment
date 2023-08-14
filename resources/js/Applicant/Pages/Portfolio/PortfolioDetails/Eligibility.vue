<template lang="">
    <!-- Eligibilities -->
    <div class="grid grid-cols-6 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10">
        <h2 class="col-span-6 text-xl font-bold"> Eligibilities </h2>
        <div class="col-span-2">
            <h2 class="text-base font-medium">Eligibility</h2>
            <input v-model="formData.eligibility" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Eligibility" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Rating</h2>
            <input v-model="formData.rating"  type="number" pattern="^\d*(\.\d{0,2})?$"  step="0.01" class="form-input border border-gray-300 rounded w-full" placeholder="Rating" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Date of Examination</h2>
            <input v-model="formData.date_of_examination" type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Place of Examination</h2>
            <input v-model="formData.place_of_examination" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Place of Examination" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">License Number</h2>
            <input v-model="formData.license_no" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="License Number" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Date of Release</h2>
            <input v-model="formData.date_of_released" type="date" class="form-input border border-gray-300 rounded w-full" /> <br><br>
        </div>

        <div class="col-span-2">
            <button @click="addEligi" type="button" class="btn bg-blue-600 text-white border border-blue-300 hover:bg-blue-500 place-self-end">Add New Eligibility</button>
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
                eligibility: "",
                rating: "",
                date_of_examination: "", 
                place_of_examination: "",
                license_no: "",
                date_of_released: "",
            }
        }
    },

    mounted(){
        this.formData['userId'] = this.applicant['id'];
    },

    methods:{
        addEligi(){
            let compiledData = this.formData
            //console.log(compiledData)

            axios.post('addEli', {compiledData}).then(({data})=>{
                alert("You have added an eligiblity")
                this.clearForm()
            });
        },

        clearForm(){
            // clear the form
            this.formData.eligibility = ""
            this.formData.rating = ""
            this.formData.date_of_examination = ""
            this.formData.place_of_examination = ""
            this.formData.license_no = ""
            this.formData.date_of_released = ""
        }   
    }
}
</script>

<style lang="">
    
</style>