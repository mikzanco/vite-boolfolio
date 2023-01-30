<script>

import {truncateText} from '../data/functions'


export default {
    name: 'ProjectItem',
    data(){
        return{
            truncateText,
            contentMaxLength: 150
        }
    },
    props:{
        project: Object
    },
}
</script>

<template>

    <div class="project-box">
        <h3>
            <router-link :to="{name: 'detail', params:{slug: project.slug}}">{{project.name}}</router-link>
        </h3>
        <p v-html="truncateText(project.summary, contentMaxLength)"></p>
    </div>

</template>



<style lang="scss" scoped>

a{
    text-decoration: none;
    color: rgb(42, 147, 165);
    &:hover{
        text-decoration: underline;
    }
}
</style>
