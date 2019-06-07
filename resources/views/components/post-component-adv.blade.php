<script type="text/x-template" id="post-card-adv">
  <div class="card" v-show="!deleted">
    <div class="card-header">
      <i class="fas fa-share fa-3x" v-show="!showField('')" @click="update()"></i>
      <i class="fas fa-trash-alt fa-3x" v-show="showField('')" @click="destroy()"></i>
      <h1><strong v-show="!showField('name')" @click="focusField('name')">@{{ postTitle }}</strong></h1>
      <input type="text" v-show="showField('name')" v-model="postTitle">
    </div>
    <div class="card-content">
      <p v-show="!showField('content')" @click="focusField('content')" class="card-content-text">@{{ shortcontent }}</p>
      <textarea rows="4" cols="23" v-show="showField('content')" v-model="postContent"></textarea>
    </div>
    <div class="card-footer">
      <div @click="getLikes">
        <strong>@{{ postLikes }} </strong>
        <i class="fa-heart" v-bind:class="heartIcon"></i>
      </div>
    </div>
  </div>
</script>
<script type="text/javascript">
Vue.component('post-card-adv', {
  template: "#post-card-adv",
  data: function() {
    return {

      deleted: false,
      liked: false,

      nameField: '',
      editField : '',

      postTitle: this.title,
      postContent: this.content
    }
  },
  props: {

    postId: String,
    title: String,
    content: String,
    likes: String
  },
  computed: {

    shortcontent: function() {

      var sc = this.postContent.substring(0, 149);

      if (this.postContent.length > 150) {

        sc = sc.trim() + "...";
      }

      return  sc;
    },
    heartIcon: function() {
        return this.liked ? "fas" : "far";
    },
    postLikes: function() {

      l = Number(this.likes);
      return l + (this.liked ? 1 : 0);
    }
  },
  methods: {
    update(){

      var post = {
        _token: token,
        title: this.postTitle,
        content: this.postContent,
        likes: this.postLikes
      };

      axios.post('/post/update/' + this.postId, post)
            .then((response)=>{
               console.log(response.data)
            }).catch((error)=>{
               console.log(error.response.data)
            });

      this.editField = '';
    },
    destroy() {

      axios.delete('/post/destroy/' + this.postId)
            .then((response)=>{
               console.log(response.data)
            }).catch((error)=>{
               console.log(error.response.data)
            });

      this.deleted = true;

      this.editField = '';
    },

    focusField(nameField){
      this.editField = nameField;
    },
    showField(nameField){
      return this.editField == nameField;
    },

    getLikes() {

      this.liked = !this.liked;
      this.update();
    }
  }
});
</script>
