<template lang="">
    <div>
        <div class="container mx-auto">
            <div class="flex justify-center items-center">
                <div class="border border-gray-100 bg-white px-10 py-5 rounded-lg shadow-md my-10 w-5/6">
                    <h1 class="text-center text-3xl font-bold">Applicant Account Registration </h1>
                    <form class="justify-center" @submit.prevent="register">
                        <div>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-4 border border-gray-100 bg-white px-10 py-5 rounded-lg shadow-md mt-10">
                                <h2 class="col-span-1 lg:col-span-2 text-xl font-bold"> Login Credentials </h2>
                                <div>
                                    <h3 class="text-base font-medium">Username</h3>
                                    <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Username" v-model="regInfo.username" />
                                    <span class="text-red-600 text-xs"><i>{{ error.username ?? '&nbsp;' }}</i></span>
                                </div>
                                
                                <div>
                                    <h3 class="text-base font-medium">Email</h3>
                                    <input type="email" class="form-input border border-gray-300 rounded w-full" placeholder="Email" v-model="regInfo.email" />
                                    <span class="text-red-600 text-xs"><i>{{ error.email ?? '&nbsp;' }}</i></span>
                                </div>
                                
                                <div>
                                    <h3 class="text-base font-medium">Password</h3>
                                    <input type="password" class="form-input border border-gray-300 rounded w-full" placeholder="Password" v-model="regInfo.password" />
                                    <span class="text-red-600 text-xs"><i>{{ error.password ?? '&nbsp;' }}</i></span>
                                </div>
                                
                                <div>
                                    <h3 class="text-base font-medium">Confirm Password</h3>
                                    <input type="password" class="form-input border border-gray-300 rounded w-full" placeholder="Re-enter Password" v-model="regInfo.password2"/>
                                    <span class="text-red-600 text-xs"><i>&nbsp;</i></span>
                                </div>
                            </div>
                            <hr>
                            <div class="grid grid-cols-6 gap-x-4 border border-gray-100 bg-white px-10 py-5 rounded-lg shadow-md mt-5">
                                <h2 class="col-span-6 text-xl font-bold"> Basic Information </h2>                                
                                <div class="col-span-2">
                                    <h2 class="text-base font-medium">First Name</h2>
                                    <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Juan" v-model="regInfo.firstname" />
                                </div>
                                
                                <div class="col-span-2">
                                    <h2 class="text-base font-medium">Middle Name</h2>
                                    <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Martinez" v-model="regInfo.middlename" />
                                </div>
                                
                                <div class="col-span-2">
                                    <h2 class="text-base font-medium">Surname</h2>
                                    <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Dela Cruz" v-model="regInfo.surname" />
                                </div>
                                
                                <div class="col-span-2">
                                    <h2 class="text-base font-medium">Sex</h2>
                                    <select class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-full" v-model="regInfo.sex">
                                        <option value="0">----</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>

                                <div class="col-span-2">
                                    <h2 class="text-base font-medium">Birthdate</h2>
                                    <input type="date" class="form-input w-full border border-gray-300 rounded" v-model="regInfo.birthdate" />
                                </div>
                                
                                
                                <div class="col-span-2">
                                    <h2 class="text-base font-medium">Civil Status</h2>
                                    <select class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-full" v-model="regInfo.civil_status">
                                        <option value="0">----</option>
                                        <option value="1">Single</option>
                                        <option value="2">Married</option>
                                        <option value="3">Widowed</option>
                                    </select>
                                </div>
                                
                                <div class="col-span-3">
                                    <h2 class="text-base font-medium">Citizenship</h2>
                                    <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Citizenship" v-model="regInfo.citizenship" />
                                </div>
                                
                                <div class="col-span-3">
                                    <h2 class="text-base font-medium">Contact Number</h2>
                                    <input type="tel" class="form-input border border-gray-300 rounded w-full" placeholder="09xxxxxxxxx" v-model="regInfo.contact_no" />
                                </div>
                            </div>
                            <div class="mt-5 w-full grid grid-cols-2">
                                <a v-if="this.opid === -1" href="/login" class="italic text-xs">Already have an account? Click here to login</a>
                                <a v-else :href="'/login/redirect='+this.opid" class="italic text-xs">Already have an account? Click here to login</a>
                                <button type="submit" class="place-self-end btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props: ['opid'],

    setup(props) {
        // setup() receives props as the first argument.
        
    },

    watch:{ 
    },

    mounted(){
        console.log("The Op Id is "+this.opid);
    },  

    data(){
        return{
            //opId: "",

            regInfo:{
                username: '',
                email: '',
                password: '',
                password2: '',
                surname: '',
                firstname: '',
                middlename: '',
                sex: 0,
                birthdate: '',
                civil_status: 0,
                citizenship: '',
                contact_no: ''
            },

            error: []
        }
    },

    methods:{
        register(){
            axios.post('/register', this.regInfo).then(({data})=>{               
                if (data.success) {
                    alert("Registration Success")

                    if (this.opid > 0) {
                        window.location.href = '/my/opportunity/id/'+this.opid
                    }else{
                        window.location.href = '/my'
                    }


                } else {
                    var errors = data.error
                    for (var key in errors) {
                        this.error[key] = errors[key][0]
                    }
                }
            });
        }
    }
}
</script>

<style lang="">
    
</style>