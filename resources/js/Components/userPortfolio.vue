<template lang="">
    <div class="fixed inset-0 bg-opacity-10 bg-gray-400 flex justify-center items-center">
        <div class="bg-gray-100 rounded-xl overflow-x-auto flex flex-col w-5/6 h-5/6">
            <!-- Modal Header -->
            <header class="px-4 py-5 flex justify-between items-center border-b-2 border-gray-900">
                <h2 class="font-bold px-4 my-0">Portfolio of {{data_basicDetails.firstname}}</h2>
                <button class="w-8 p-2 bg-gray-300 rounded-full" @click="closeModal">
                    <span class="font-bold text-2xl text-center"> × </span>
                </button>
            </header>

            <section class="px-9 py-5">
                <div class="grid grid-cols-10 gap-x-4"> 
                    <div class="col-span-4">
                        <h3><b>Basic Information</b></h3> 
                        <b>First Name:</b> {{data_basicDetails.firstname}} <br>
                        <b>Middle Name:</b> {{data_basicDetails.middlename}} <br>
                        <b>Surname:</b> {{data_basicDetails.surname}} <br>
                        <b>Sex:</b> {{getSex(data_basicDetails.sex)}} <br>
        
                        <br>
                        <b>Birthdate:</b> {{data_basicDetails.birthdate}} <br>
                        <b>Age:</b> {{getAge(data_basicDetails.birthdate)}} <br>
                        <br>
        
                        <b>Civil Status:</b> {{getCivilStatus(data_basicDetails.civil_status)}} <br>
                        <b>Citizenship:</b> {{data_basicDetails.citizenship}} <br>
                        <b>Contact number:</b> {{data_basicDetails.contact_no}} <br>
                    </div>
                    <div class="col-span-4">
                        <h3><b>Address</b></h3> 
                        <div v-if="Object.keys(data_address).length>0">
                            <b>Region:</b> {{data_address.region}} <br>
                            <b>Province:</b> {{data_address.province}} <br>
                            <b>Municipality:</b> {{data_address.municipality}} <br>
                            <b>Barangay:</b> {{data_address.barangay}} <br>
                            <b>Postal Code:</b> {{data_address.postal_code}} <br>                            
                        </div>
                        <div v-else>
                            No address available
                        </div>
                    </div>
                </div>
            </section>
            

            <!-- 2nd row -->
            <section class="px-9">
                <hr>
                <h3><b>History of Education</b></h3> 
                <hr>
            </section>
            <section class="px-9 py-1">
                <div class="grid grid-cols-10 gap-x-4" v-if="data_educationDetails.length>0"> 
                    <div class="col-span-3" v-for="education in data_educationDetails">
                        <div class="border p-4 rounded-lg shadow-lg my-3 border-accent">
                            <b>School Name:</b> {{education.school_name}} <br>
                            <b>Year Level:</b> {{education.year_level}} <br>
                            <b>Year Graduated:</b> {{education.year_graduated}} <br>
                            <b>Degree earned:</b> {{education.degree_earned}} <br>
                            <b>Honors:</b> {{education.honors}} <br>
                            <br>

                            <b>Years attended from:</b> {{education.year_attended_to}} <br>
                            <b>Years attended to:</b> {{education.year_attended_to}} <br>
                        </div>                                
                    </div>
                </div>
                <div v-else>
                    No History of Education
                </div>
            </section>
            

            <!-- 3rd row -->
            <section class="px-9">
                <hr>
                <h3><b>Work Experiences</b></h3> 
                <hr>
            </section>
            <section class="px-9 py-1">
                <div class="grid grid-cols-10 gap-x-4" v-if="data_workExperience.length>0"> 
                    <div class="col-span-2" v-for="experience in data_workExperience">
                        <div class="border p-4 rounded-lg shadow-lg my-3 border-accent">
                            <b>Company:</b><br>{{experience.company}} <br>

                            <br>
                            <b>Position:</b><br>{{experience.position}} <br>
                            <br>


                            <b>Status of Employment:</b><br>
                            {{emp_status[experience.status_of_employment]['status']}}<br>
                            <br>

                            <b>Monthly Salary:</b> {{experience.monthly_salary}} <br>
                            <b>SG step:</b> {{experience.sg_step}} <br>
                            <br>

                            <b>From:</b> {{experience.from}} <br>
                            <b>To:</b> {{experience.to}} <br>
                        </div>                                
                    </div>
                </div>
                <div v-else>
                    No History of Experience
                </div>
            </section>


            <!-- 4th row -->
            <section class="px-9">
                <hr>
                <h3><b>Trainings</b></h3> 
                <hr>
            </section>
            <section class="px-9 py-1">
                <div class="grid grid-cols-10 gap-x-4" v-if="data_training.length>0"> 
                    <div class="col-span-2" v-for="training in data_training">
                        <div class="border p-4 rounded-lg shadow-lg my-3 border-accent">
                            <b>Title:</b><br>{{training.title}} <br>

                            <br>
                            <b>Sponsor:</b><br>{{training.sponsor}} <br>
                            <br>

                            <b>Hours:</b><br> {{training.hours}} <br>
                            <br>

                            <b>Status of Employment:</b><br>{{emp_status[training.type]['status']}} <br>
                            <br>

                            <b>From:</b> {{training.from}} <br>
                            <b>To:</b> {{training.to}} <br>
                        </div>                                
                    </div>
                </div>
                <div v-else>
                    No History of Trainings
                </div>
            </section>


            <!-- 5th row -->
            <section class="px-9">
                <hr>
                <h3><b>Eligiblity</b></h3> 
                <hr>
            </section>
            <section class="px-9 py-1">
                <div class="grid grid-cols-10 gap-x-4" v-if="data_eligibility.length>0"> 
                    <div class="col-span-2" v-for="eligibility in data_eligibility">
                        <div class="border p-4 rounded-lg shadow-lg my-3 border-accent">
                            <b>Eligiblity:</b><br>{{eligibility.eligibility}} <br>
                            <b>License:</b><br>{{eligibility.license_no}} <br>
                            <b>Rating:</b><br>{{eligibility.rating}} <br>
                            <br>

                            <b>Place of examination:</b><br>{{eligibility.place_of_examination}} <br>
                            <br>

                            <b>Date of Examination:</b><br> {{eligibility.date_of_examination}} <br>
                            <b>Date of Released:</b><br> {{eligibility.date_of_released}} <br>
                        </div>                                
                    </div>
                </div>
                <div v-else>
                    No History of Eligibilities
                </div>
            </section>

        </div>
    </div>
</template>

<script>
export default {
    props:[
        'user',
        'basicDetails',
        'educationDetails',
        'workExperience',
        'eligibility',
        'training',
        'address'
    ],

    data(){
        return{
            data_basicDetails: {},
            data_educationDetails: {},
            data_workExperience: {},
            data_training: {},
            data_eligibility: {},
            data_address: {},
            emp_status: {},

            reqKey: 0,
            optKey: 0,
        }
    },
    
    mounted(){
        //this.loadBasicDetails(this.user)
        this.getEmpStatus()
    },

    // maybe there could be a simplier way to do this
    // ~MakuSan
    watch: {
        basicDetails: function(newVal, oldVal){
            this.data_basicDetails = newVal
        },
        educationDetails: function(newVal, oldVal){
            this.data_educationDetails = newVal
        },
        workExperience: function(newVal, oldVal){
            this.data_workExperience = newVal
        },
        eligibility: function(newVal, oldVal){
            this.data_eligibility = newVal
        },
        training: function(newVal, oldVal){
            this.data_training = newVal
        },
        address: function(newVal, oldVal){
            this.data_address = newVal
        }
    },  

    methods: {
        closeModal(){
            // clear first
            this.data_basicDetails = {}
            this.data_educationDetails = {}
            this.data_workExperience = {}
            this.data_eligibility = {}
            this.data_training = {}
            this.data_address = {}

            this.$emit('close');
        },

        // reference : https://stackoverflow.com/questions/4060004
        getAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        },


        getSex(value){
            if (value == 1){
                return "Male";
            } else {
                return "Female"
            }
        },

        getCivilStatus(value){
            if (value == 1){
                return "Single"
            }else if(value == 2){
                return "Married"
            }else if(value == 3){
                return "Widowed"
            }else{
                return "---"
            }
        },

        getEmpStatus(){
            axios.post('getEmpStatus').then(({data})=>{
                this.emp_status = data;
            })
        },
    },
}
</script>

<style lang="">
    
</style>