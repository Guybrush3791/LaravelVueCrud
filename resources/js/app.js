require('./bootstrap');
window.Vue = require('vue');

function init2() {

  console.log("Hello world");

  const vue1 = new Vue({
    el: '#app',
    data: {
      hello: "Hello World <br> from VUE.JS",
      fname: "Guybrush",
      lname: "Threepwood",
      rneam: "Giovanni",
      imgsrc: "img/me_icon.gif"
    },

  });
  const vue2 = new Vue({
    el: '#ciao',
    data: {
      hello: "Ciao Mondo da VUE.JS"
    }
  });

  const vue3 = new Vue({

    el: "#comp-input",
    data: {

      fname: "Guybrush",
      lname: "Threepwood",
    },
    methods: {

      getFullName: function() {

        return this.fname + " " + this.lname;
      }
    }
  });
  const vue4 =new Vue({

    el: "#comp-meth",
    methods: {

      getRnd: function() {

        return Math.floor(Math.random() * 100);
      }
    },
    computed: {

      rndVal: function() {

        return Math.floor(Math.random() * 100);
      }
    }
  });

  const vue5 = new Vue({

    el: "#converter",
    data: {

      km: 0,
      m: 0
    },
    watch: {

      km: function(val) {

        this.km = val;
        this.m = val * 1000;
      },
      m: function(val) {

        this.m = val;
        this.km = val / 1000;
      }
    }
  });
}

function init() {

  token = $('meta[name="csrf-token"]').attr('content');
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

  Vue.component('post-card', {
    template: "#post-card",
    data: function() {
      return {

        liked: false
      }
    },
    props: {

      title: String,
      content: String,
      likes: Number
    },
    computed: {

      shortcontent: function() {

        var sc = this.content.substring(0, 149);

        if (this.content.length > 150) {

          sc = sc.trim() + "...";
        }

        return  sc;
      },
      heartIcon: function() {
          return this.liked ? "fas" : "far";
      }
    },
    methods: {
      getLikes: function() {

        this.liked = !this.liked;
        this.likes = Number(this.likes) + (this.liked ? 1 : -1);
      }
    }
  });

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
      focusField(nameField){
        this.editField = nameField;
      },
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
      showField(nameField){
        return this.editField == nameField;
      },
      getLikes() {

        this.liked = !this.liked;
        this.update();
      }
    }
  });

  new Vue({
    el: "#app"
  });
}

$(document).ready(init);
