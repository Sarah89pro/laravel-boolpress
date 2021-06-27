<template>
<section class="container details">
    <div v-if="post">
        <h1>{{ post.title }}</h1>

        <div class="post-info">
            <span class="cat">{{post.category.name}}</span>
            <span v-for="tag in post.tags" :key="`tag-${tag.id}`" class="tag">{{ tag.name }}</span>
        </div>

        <p>{{ post.content }}</p>
    </div>

    <div v-else>
        Loading..
    </div>


    
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
                console.log(res.data);
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

.cat {
    display :inline-block;
    padding: 12px;
    margin: 10px;
    font-size: 14px;
    background-color: rgb(233, 156, 56);
    border-radius: 5px;
}

.tag {
    display :inline-block;
    padding: 8px;
    margin: 10px;
    font-size: 12px;
    background-color: burlywood;
    border-radius: 5px;
}

</style>