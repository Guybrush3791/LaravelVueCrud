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
