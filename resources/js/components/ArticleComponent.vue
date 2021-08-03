<template>
   <div class="row">
        <div class="card post w-25 m-2" v-for="post in posts" :key="post.id">
            <a href="#">
                <img class="card-img-top" :src="'storage/' + post.image" :alt="post.title">
            </a>
            <div class="card-body">
                <h4 class="card-title text-uppercase">{{post.title}}</h4>
                <div class="tags">
                    <strong >Tags: </strong>
                    <div class="tag" v-if="post.tags">
                    <span v-for="tag in post.tags" :key="tag.id">{{tag.name}} </span>
                    </div>
                    <span v-else> No Tags Yet</span>

                </div>
                <h5> Category:
                    <a href="#">
                        {{post.category.name}}
                    </a>
                </h5>
                <span>Autore: {{post.author}}</span>
                <div class="card-text">
                    @{{post.body}}
                </div>
                <a href="#">Read More</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {

   data(){
       return{
           posts:null
       }
   },
    mounted(){
        axios.get('/api/api-posts').then(resp=>{
            //console.log(resp.data.data);
            this.posts = resp.data.data;

        }).catch(e=>{
            console.error(e);
        })

    }
};
</script>
