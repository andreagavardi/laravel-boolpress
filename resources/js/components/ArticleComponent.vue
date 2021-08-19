<template>
   <div class="row">
       <div class="errors" v-if="errors">

           Sorry, you're not authorized,please check your <strong>Token</strong> <br>
           {{errors}}
       </div>
        <div class="card post w-25 m-2" v-for="post in posts" :key="post.id">
            <a href="#">
                <img class="card-img-top" :src="'storage/' + post.image" :alt="post.title">
            </a>
            <div class="card-body">
                <h4 class="card-title text-uppercase">{{post.title}}</h4>
                <div class="tags">
                    <strong >Tags: </strong>
                    <div v-if="post.tags.length > 0" class="tag" >
                        <span  v-for="tag in post.tags" :key="tag.id">{{tag.name}} </span>
                    </div>
                    <div v-else>

                        <span>No Tags Yet</span>
                    </div>

                </div>
                <h5> Category:
                    <a href="#">
                        {{post.category.name}}
                    </a>
                </h5>
                <span>Autore: {{post.author}}</span>
                <div class="card-text">
                    {{post.body}}
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
           posts:null,
           errors:null
       }
   },
    mounted(){
        let config = { method: 'get', url: '/api/api-posts',
        headers: { 'Authorization': 'Bearer YB34wRWo5lYdOBU7xwKke719J7tPQnwoTROzbTrn62dN2sHi0aySYKIq2NrNaLr3qF5Sd2eRwoazQTYW'}  }
        //console.log(config);
        axios(config).then(resp=>{
            //console.log(resp.data.data);
            this.posts = resp.data.data;
            /* this.posts.forEach(post => {
                console.log(post.tags);
            }); */

        }).catch(e=>{
            console.error(e);
            this.errors = e;
        })
    }
};
</script>
