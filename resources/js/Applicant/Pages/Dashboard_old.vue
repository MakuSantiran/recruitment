<template lang="">
    <div class="container mx-auto">
        <h2 class="font-semibold text-center">Hello, {{ applicant.firstname + ' ' + applicant.surname }} </h2>
    </div>
</template>
<script>

export default {
    props: ['applicant'],

    data(){
        return{
            applicantData: this.applicant
        }
    },

    watch: {
        applicant(New, Old){
        }   
    },

    // a function that runs on first start
    mounted(){
        console.log("the object is "+this.applicantData)
    },
    

}
</script>
<style lang="">
    
</style>