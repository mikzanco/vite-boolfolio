<script>
export default {
    name: 'Header'
}

</script>

<template>
    <header>
        <ul>
            <li><router-link :to="{name: 'home'}">Home</router-link></li>
            <li><router-link :to="{name: 'listProjects'}">Progetti</router-link></li>
            <li><router-link :to="{name: 'about'}">About</router-link></li>
        </ul>
    </header>
</template>

<style lang="scss" scoped>

header{
    text-align: center;
    padding: 20px;
    ul{
        list-style: none;
        li{
            display: inline-block;
            padding: 10px 20px;
            a{
                color: white;
                text-decoration: none;
                text-transform: uppercase;
                &:hover,
                &.active{
                    color: black;
                }
            }
        }
    }
}

</style>

