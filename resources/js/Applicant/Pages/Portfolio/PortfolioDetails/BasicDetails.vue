<template lang="">
    <div class="grid grid-cols-6 gap-x-4 border border-gray-100 bg-white p-10 rounded-lg shadow-md mt-10">
        <h2 class="col-span-10 text-xl font-bold"> Basic Information </h2>

        <div class="col-span-2">
            <h2 class="text-base font-medium">First Name</h2>
            <input v-model="userDetails.firstname" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="First Name" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Middle Name</h2>
            <input v-model="userDetails.middlename" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Middle Name" /> <br><br>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Surname</h2>
            <input v-model="userDetails.surname" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="SurName" /> <br><br>
        </div>

        <div class="col-span-3">
            <h2 class="text-base font-medium">Sex</h2>
            <select v-model="userDetails.sex" class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-full">
                <option value="0">----</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Birthdate</h2>
            <input v-model="userDetails.birthdate" type="date" class="form-input w-full border border-gray-300 rounded" /> <br><br>
        </div>


        <div class="col-span-2">
            <h2 class="text-base font-medium">Civil Status</h2>
            <select v-model="userDetails.civil_status" class="form-input border border-gray-300 rounded text-black mr-1 py-2 px-3 w-full">
                <option value="0">----</option>
                <option value="1">Single</option>
                <option value="2">Married</option>
                <option value="3">Widowed</option>
            </select>
        </div>

        <div class="col-span-2">
            <h2 class="text-base font-medium">Citizenship</h2>
            <input v-model="userDetails.citizenship" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Citizenship" /> <br><br>
        </div>

        <div class="col-span-3">
            <h2 class="text-base font-medium">Contact Number</h2>
            <input v-model="userDetails.contact_no" type="tel" class="form-input border border-gray-300 rounded w-full" placeholder="09xxxxxxxxx" /> <br><br>
        </div>


    <!-- Addresses -->
        <h2 class="col-span-10 text-xl font-bold mt-10">Address</h2>

        <div class="col-span-3">
            <h2 class="text-base font-medium">Region</h2>
            <input v-model="region" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Region">
        </div>

        <div class="col-span-3">
            <h2 class="text-base font-medium">Province</h2>
            <input v-model="province" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Province">
        </div>

        <div class="col-span-3">
            <h2 class="text-base font-medium">Municipality</h2>
            <input v-model="municipality" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Municipality">
        </div>


        <div class="col-span-3">
            <h2 class="text-base font-medium">Barangay</h2>
            <input v-model="barangay" type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Barangay">
        </div>


        <div class="col-span-3">
            <h2 class="text-base font-medium">Postal Code</h2>
            <input v-model="postal_code" type="number" class="form-input border border-gray-300 rounded w-full" placeholder="Postal Code">
        </div> 

        <!-- < no need for country >
            <div class="col-span-3">
                <h2 class="text-base font-medium">Country</h2>
                <input type="text" class="form-input border border-gray-300 rounded w-full" placeholder="Country">
            </div>
        -->

        <div class="col-span-10 mt-5 text-right">
            <button @click="updateDet" type="button" class="btn btn-primary p-1 ">Save</button>
        </div>
    </div>
</template>
<script>
export default {
    props: ['applicant'],
    
    data(){
        return{
            userDetails: [],

            region: "",
            province: "",
            municipality: "",
            barangay: "",
            postal_code: "",

        }
    },

    mounted(){
        this.userDetails = this.applicant;
        this.getUserAddress();
    },

    methods:{
        getUserAddress(){
            let userId = this.userDetails['id'];

            axios.post('getUserAdress', {userId}).then(({data})=>{
                this.region = data.region
                this.province = data.province
                this.municipality = data.municipality
                this.barangay = data.barangay
                this.postal_code = data.postal_code
            });    
            
        },


        updateDet(){
            // maybe there is a better way to do this
            // ~Maku Santiran

            let UserDetails = {
                name: "Maku",
            }

            let AddressDetails = {
                region: this.region, 
                province: this.province,
                municipality: this.municipality, 
                barangay: this.barangay,
                postal_code: this.postal_code
            }

            // pass them all as 1 object
            let compiledData = {
                Address: AddressDetails,
                User: this.userDetails
            }

            axios.post('updBasicInf', {compiledData}).then(({data})=>{
                alert("You have updated your basic information!")
                //console.log(data)
                //this.opps = data;
            });
        },

    }

}
</script>
<style lang="">
    
</style>