<template>
    <div class="grid grid-cols-6 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10">
        <h2 class="col-span-10 text-xl font-bold"> Education </h2>
    
        <div class="col-span-4">
            <h2 class="text-base font-medium">School Attended</h2>
            <input v-model="educationData.school_name" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="School Attended" /> <br><br>
        </div>
        
        <div class="col-span-2">
            <h2 class="text-base font-medium">Year Level</h2>
            <select v-model="educationData.year_level" class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-full">
                <option value="0">----</option>
                <option value="1">Elementary</option>
                <option value="2">Secondary</option>
                <option value="3">Vocational</option>
                <option value="4">Tertiary</option>
                <option value="5">Postgraduate/Masteral</option>
                <option value="6">Doctoral</option>
                <option value="7">Postdoctoral</option>
            </select>
        </div>
    
        <div class="col-span-2">
            <h2 class="text-base font-medium">Degree Earned</h2>
            <input v-model="educationData.degree_earned" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Degree Earned" /> <br><br>
        </div>
    
        <div class="col-span-2">
            <h2 class="text-base font-medium">Units Earned</h2>
            <input v-model="educationData.units_earned" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Units Earned" /> <br><br>
        </div>
    
        <div class="col-span-2">
            <h2 class="text-base font-medium">Year Attended From</h2>
            <input v-model="educationData.year_attended_from" type="number" class="form-input border border-gray-300 rounded w-full" placeholder="Year Attended From" /> <br><br>
        </div>
    
        <div class="col-span-2">
            <h2 class="text-base font-medium">Year Attended To</h2>
            <input v-model="educationData.year_attended_to" type="number" class="form-input border border-gray-300 rounded w-full" placeholder="Year Attended Until" /> <br><br>
        </div>
    
        <div class="col-span-2">
            <h2 class="text-base font-medium">Honors</h2>
            <input v-model="educationData.honors" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Honors" /> <br><br>
        </div>
    
        <div class="col-start-1 col-span-3">
            <button @click="addEducation" type="button" class="btn bg-blue-600 text-white border border-blue-300 hover:bg-blue-500 place-self-end w-full">Add New Education</button>
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
            educationData: {
                userId: 0,
                year_level: 0,
                school_name: "",
                degree_earned: "",
                year_graduated: "",
                units_earned: "",
                year_attended_from: "",
                year_attended_to: "",
                honors: "",
            }
        }
    },

    mounted(){
        this.educationData['userId'] = this.applicant['id'];
    },

    methods:{
        addEducation(){
            let compiledData = this.educationData
            //console.log(compiledData)

            axios.post('addEdu', {compiledData}).then(({data})=>{
                alert("You have added an education background!")
                this.clearForm()
            });
        },

        clearForm(){
            // clear the form
            this.educationData.year_level = 0
            this.educationData.school_name = ""
            this.educationData.degree_earned = ""
            this.educationData.year_graduated = ""
            this.educationData.units_earned = ""
            this.educationData.year_attended_from = ""
            this.educationData.year_attended_to = ""
            this.educationData.honors = ""  
        }
    }
}
</script>

<style lang="">

</style>