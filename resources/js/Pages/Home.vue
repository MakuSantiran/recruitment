<template>
    <main-layout>

        <div class="container mx-auto mt-16">
            <div class="py-5 px-4 border-b border-gray-200">
                <div>
                    <form class="flex flex-wrap gap-4 justify-center" @submit.prevent="initData()">
                        <div class="flex flex-wrap items-center gap-4">
                            <label class="font-semibold" for="ay">Academic Year: </label>
                            <div>
                                <select id="ay" class="form-input" v-model="form.cys">
                                    <option v-for="c in cys" :value="c.id" :key=c.id>{{ c.cy }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-4  items-center">
                            <label class="font-semibold" for="sem">Semester: </label>
                            <div>
                                <select id="sem" class="form-input" v-model="form.sem">
                                    <option v-for="(c, index) in sem" :value="index" :key="index">{{ c }}</option>
                                </select>
                            </div>
                        </div>
                         <div class="flex flex-wrap items-center gap-4">
                            <label class="font-semibold" for="enl">Batch: </label>
                            <div>
                                <select id="enl" class="form-input" v-model="form.batch">
                                    <option :value="0">All</option>
                                    <option v-for="b in batchs" :value="b" :key="b">{{ b }}</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap items-center gap-4">
                            <label class="font-semibold" for="enl">Sex: </label>
                            <div>
                                <select id="enl" class="form-input" v-model="form.sex">
                                    <option :value="5">All</option>
                                    <option :value="1">Male</option>
                                    <option :value="0">Female</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Get Summary</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-5" v-if="data">
                <h4 align="center">Enrollment Data for A.Y. <span class="font-semibold">{{ data.pref.cy }} | {{ sem[data.pref.sem] }}</span></h4>

                <h5 class="mb-0">{{ college.college }}</h5>
                <span class="text-gray-600 font-semibold"> {{ `${formatNumber(data.collegeTotal)} of ${formatNumber(data.totalEnrolled)} (${formatPercent(data.percentage)})` }} Enrolled</span>
                <div class="bg-gray-300 w-auto h-4 flex mb-4">
                    <div class="bg-accent h-4" :style="{width: data.percentage+'%'}">
                    </div>
                </div>

                <hr>

                <div class="flex flex-wrap mb-10">
                        <table class="w-full">
                            <tr v-for="d in data.degrees" :key="d.id">
                                <td>
                                    <router-link class="text-gray-600 font-semibold"
                                                 :to="`/students/list?enrolled=1&degree=${d.id}&cy=${form.cys}&sem=${form.sem}&sortBy=student_number&sortType=desc&limit=20&page=1`"
                                    >
                                       {{ d.degree }}
                                    </router-link>
                                </td>
                                <td width="75%">
                                    <router-link :to="`/students/list?enrolled=1&degree=${d.id}&cy=${form.cys}&sem=${form.sem}&sortBy=student_number&sortType=desc&limit=20&page=1`">
                                        <span class="text-gray-600 font-semibold"> {{ `${formatNumber(d.total)} of ${formatNumber(data.collegeTotal)} (${formatPercent(d.percentage)})` }} Enrolled</span>
                                        <div class="bg-gray-300 w-auto h-4 flex mb-4">
                                            <div class="bg-default h-4" :style="{width: d.percentage+'%'}">
                                            </div>
                                        </div>
                                    </router-link>
                                </td>
                            </tr>
                        </table>

                </div>


            </div>
            
            <div v-else class="flex justify-center animate-pulse">
                <h4 class="font-bold">
                    <svg class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24"></svg> 
                    LOADING... PLEASE WAIT...
                </h4>
            </div>
        </div>

    </main-layout>
</template>

<script>
    export default {
        // props: ['college', 'pref', 'cys', 'degrees', 'sem'],
        // name: "Home",
        // data() {
        //     return {
        //         data: null,
        //         batchs: [],
        //         form: {
        //             cys: this.pref.cy_id,
        //             sem: this.pref.sem,
        //             batch: 0,
        //             sex: 5,
        //             degrees: this.college.id === 1? '' : JSON.stringify(this.degrees),
        //         }
        //     }
        // },
        // created(){
        //     this.initData()
            
        //     this.cys.forEach((data)=>{
        //         this.batchs.push(data.cy.split('-')[0]);
        //     });
        // },
        // methods: {
        //     initData(){
        //         this.data = null;
        //         window.axios.get(`/v2/api/enrollment-summary-data`, { params : this.form })
        //             .then(({data}) => {
        //                 this.data = data;
        //             });
        //     },
        //     formatNumber(val) {
        //         return accounting.format(val, 0, ',')
        //     },
        //     formatPercent(val) {
        //         return accounting.format(val, 2)+'%'
        //     }
        // }
    }
</script>

<style scoped>
    .item {
        position: relative;
        float: left;
    }

    .item h2 {
        text-align:center;
        position: absolute;
        line-height: 125px;
        width: 100%;
    }

    svg {
        -webkit-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .html circle{
        -webkit-animation: html 1s ease-out forwards;
        animation: html 1s ease-out forwards;
    }


    @-webkit-keyframes html {
        to {
            stroke-dashoffset: 80; /* 50% would be 220 (half the initial value specified above) */
        }
    }

    @keyframes html {
        to {
            stroke-dashoffset: 80;
        }
    }
</style>
