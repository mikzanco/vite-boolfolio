<script>

import axios from 'axios';

export default{
    name:'app',
    data(){
        return {
            baseUrl: 'http://127.0.0.1:8000/api/',
            projects : [],
            contentMaxLength: 150
        }
    },
    methods:{
        getApi(){
            axios.get(this.baseUrl + 'projects')
            .then(result => {
                this.projects = result.data.projects;
                console.log(result.data);
            })
        },
        truncateText(text){
            if(text.length > this.contentMaxLength){
                return text.slice(0, this.contentMaxLength) + '.....';
            }
            return text;
        }
    },
    mounted(){
        this.getApi();
    }
}

</script>

<template>
    <div class="container">
        <h1>Elenco Progetti</h1>

        <div v-for="projects in projects" :key="projects.id" class="project-box">
            <h3>{{projects.title}}</h3>
            <p v-html="truncateText(projects.text)"></p>
        </div>

    </div>
</template>

<style>


</style>
