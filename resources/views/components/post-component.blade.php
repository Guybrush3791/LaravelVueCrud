<script type="text/x-template" id="post-card">
  <transition name="slide-fade">
    <div class="card" v-show="!deleted">
      <div class="card-header">
        <i v-show="!showField('')" @click="update()" class="fas fa-share fa-3x"></i>
        <i v-show="showField('')" class="fas fa-trash-alt fa-3x" @click="destroy()"></i>
        <h1 @click="focusField('title')" v-show="!showField('title')" class="card-header-title">@{{ postTitle }}</h1>
        <input v-show="showField('title')" v-model="postTitle" type="text">
      </div>
      <div class="card-content">
        <p @click="focusField('content')" v-show="!showField('content')" class="card-content-text">@{{ shortcontent }}</p>
        <textarea v-show="showField('content')" v-model.trim="postContent"></textarea>
        <div class="tags" >
          <a href="#" v-for="tag in postTags" v-text="tag.name"></a>
        </div>
      </div>
      <div class="card-footer">
        <div class="likes" @click="setLiked()">
          <strong>@{{ postLike }} </strong>
          <i class="fa-heart" v-bind:class="heartIcon"></i>
        </div>
      </div>
    </div>
  </transition>
</script>
<script type="text/javascript">
  Vue.component('post-card', {
    template: "#post-card",
    data: function() {
      return {

        deleted: false,
        liked: false,

        editField: '',

        postTitle: this.title,
        postContent: this.content,

        postTags: this.tags
      }
    },
    props: {
      postId: Number,
      title: String,
      content: String,
      likes: Number,
      tags: Array
    },
    computed: {

      shortcontent: function() {

        var sc = this.postContent.substring(0, 150);
        return sc + (this.postContent.length > 150 ? "..." : "");
      },
      heartIcon: function() {

        return this.liked ? "fas" : "far";
      },

      postLike: function() {

        return this.likes + (this.liked ? 1 : 0);
      }
    },
    methods: {

      setLiked() {

        this.liked = !this.liked;
        this.update();
      },

      focusField(name) {
        this.editField = name;
      },
      showField(name) {

        return this.editField == name;
      },

      update() {

        var post = {

          _token: token,
          title: this.postTitle,
          content: this.postContent,
          likes: this.postLike
        };

        axios.post('/post/update/' + this.postId, post)
              .then((response) => {
                console.log(response);
              }).catch((error) => {
                 console.log(error.response.data);
              });

        this.editField = '';
      },
      destroy() {

        axios.delete('/post/destroy/' + this.postId)
              .then((response) => {
                this.deleted = true;
                console.log(response);
              }).catch((error) => {
                 console.log(error.response.data);
              });
      }
    }
  });
</script>
