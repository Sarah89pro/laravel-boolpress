<template>
<div>
    <main>
        <div class="container">
            <h1>Blog</h1>

            <!-- Article Section -->
            <article v-for="post in posts" :key="post.id">
                <h2> {{ post.title }} </h2>
                <h4> {{ formatDate(post.created_at) }} </h4>
                <router-link :to="{ name:'post-detail', params: { slug:post.slug }}">Read More</router-link>
            </article>

            <!-- Navigation Section -->
            <section class="navigation">

                <!-- Prev Button -->
                <button class="mrgt"
                v-show="pagination.current > 1"
                @click="getPosts(pagination.current -1)">
                Prev</button>

                <!-- Numbered Buttons -->
                <button class="mrgt"
                v-for="i in pagination.last"
                :key="`page-${i}`"
                @click="getPosts(i)"
                :class="{'active-page': i == pagination.current}">
                {{ i }}</button>


                <!-- Next Button -->
                <button class="mrgt"
                v-show="pagination.current < pagination.last"
                @click="getPosts(pagination.current +1)">
                Next</button>


            </section>

        </div>

    </main>
</div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Blog',
    data() {
        return {
            posts: [],
            pagination: {}
        }
    },
    created() {
       //console.log(axios);
       this.getPosts();
    },
    methods: {
        getPosts(page = 1) {
            //from API
            axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then(res=> {
                    //console.log(res.data);
                    this.posts = res.data.data;
                    this.pagination = {
                        current:res.data.current_page,
                        last:res.data.last_page
                    }
                })
                .catch(err=> {
                    console.log(err);
                })
        },
        formatDate(date) {
            const postDate = new Date(date);
            let day = postDate.getDate();
            let month = postDate.getMonth() +1;
            const year = postDate.getFullYear();

            if(day < 10) {
                day= '0' + day;
            }

            if(month < 10) {
                month= '0' + month;
            }

            return `${day}/${month}/${year}`;
        }
    }

}
</script>

<style>

    .active-page {
        background-color: burlywood;
    }
        

    .mrgt {
        margin-top: 15px;
        margin-left: 5px;
    }

    button {
        padding: 10px;
    }


</style>