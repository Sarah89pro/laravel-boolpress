<template>
    <div>
        <Header/>

        <main>
            <!-- Home -->
            <!-- re-directs the component that coincides with the current route -->
            <router-view></router-view>
        </main>
    </div>
  
</template>

<script>
import axios from 'axios';
import Header from "./components/Header.vue";


export default {
    name: 'App',

    components: {
        Header
    },
}
</script>

<style lang="scss">


@import '../sass/frontoffice/_utilities.scss';


    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    .navigation {
        .active-page {
            background-color: burlywood;
        }
        

        .mrgt {
            margin-top: 15px;
            margin-left: 5px;
        }
    }

</style>