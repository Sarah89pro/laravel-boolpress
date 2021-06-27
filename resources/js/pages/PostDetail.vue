<template>
<section class="details">
    <h1>Details</h1>
</section>
  
</template>

<script>
import axios from 'axios';

export default {
    name: 'PostDetail',
    data() {
        return {
            post:null
        }
    },
    created() {
        this.getPostDetails();
    },
    methods: {
        getPostDetails() {
            //console.log('api here');
            axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
            .then(res=> {
                //console.log(res.data);
                this.post=res.data;
            })
            .catch(err=> {
                console.log(err);
            });
        }
    }

}
</script>

<style>

</style>