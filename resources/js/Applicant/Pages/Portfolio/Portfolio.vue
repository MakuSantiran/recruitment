<template lang="">
    <div>
        <div class="container mx-auto">
            <div class="flex justify-center items-center">
                <div class="border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10 w-5/6">
                    <h1 class="text-center text-2xl font-bold">Edit Portfolio</h1>
                    <form class="justify-center" action="#">
                        <div>
                            <!-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md my-10">
                                <h2 class="col-span-1 lg:col-span-2 text-xl font-bold"> Login Credentials </h2>
                                <div>
                                    <h3 class="text-base font-medium">Username</h3>
                                    <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Username" /> <br><br>
                                </div>

                                <div>
                                    <h3 class="text-base font-medium">Email</h3>
                                    <input type="email" class="form-input border border-gray-300 rounded w-full" placeholder="Email" /> <br><br>
                                </div>

                                <div>
                                    <h3 class="text-base font-medium">Password</h3>
                                    <input type="password" class="form-input border border-gray-300 rounded w-full" placeholder="Password" /> <br><br>
                                </div>

                                <div>
                                    <h3 class="text-base font-medium">Confirm Password</h3>
                                    <input type="password" class="form-input border border-gray-300 rounded w-full" placeholder="Re-enter Password"/> <br><br>
                                </div>
                            </div> -->

                            <div class="text-center mb-5 mt-5">
                                <button @click="showForm('information')" type="button" class="btn btn-primary p-1 ml-1">Information</button>
                                <button @click="showForm('education')" type="button" class="btn btn-primary p-1 ml-1">Education</button>
                                <button @click="showForm('experience')" type="button" class="btn btn-primary p-1 ml-1">Experience</button>
                                <button @click="showForm('eglibility')" type="button" class="btn btn-primary p-1 ml-1">Eligibilities</button>
                                <button @click="showForm('trainings')" type="button" class="btn btn-primary p-1 ml-1">Trainings</button>
                            </div>

                            <hr>
                                <BasicDetails v-if="showOptions.information" :applicant="applicant"></BasicDetails>
                            <hr>
                                <Education v-if="showOptions.education" :applicant="applicant"></Education>
                            <hr>
                                <Experience v-if="showOptions.experience" :applicant="applicant"></Experience>
                            <hr>
                                <Eligibility v-if="showOptions.eglibility" :applicant="applicant"></Eligibility>
                            <hr>
                                <Training v-if="showOptions.trainings" :applicant="applicant"></Training>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import BasicDetails from './PortfolioDetails/BasicDetails.vue';
    import Education from './PortfolioDetails/Education.vue';
    import Experience from './PortfolioDetails/Experience.vue';
    import Eligibility from './PortfolioDetails/Eligibility.vue';
    import Training from './PortfolioDetails/Training.vue';
    

    export default {
        props: ['applicant'],

        components:{
            BasicDetails,
            Education,
            Experience,
            Eligibility,
            Training
        },

        data(){
            return{
                showOptions: {
                    information: true,
                    education: false,
                    experience: false,
                    eglibility: false,
                    trainings: false
                }
            }
        },

        methods:{
            hello(){
                alert("Hello World!")
            },

            setAllToFalse(){
                //alert("Setting all to false")
                this.showOptions['information'] = false
                this.showOptions['education'] = false
                this.showOptions['experience'] = false
                this.showOptions['eglibility'] = false
                this.showOptions['trainings'] = false
            },

            showForm(form){
                this.setAllToFalse()
                this.showOptions[form] = true
            }

        }
    }
</script>

<style lang="">

</style>