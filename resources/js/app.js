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

function foo() {

  if (!Array.prototype.forEach)
    Array.prototype.forEach = function(fn){
      for ( var i = 0; i < this.length; i++ ) {
        fn( this[i], i, this );
      }
    };


  ["a", "b", "c"].forEach(function(value, index, array){
    console.log(value, "Is in position " + index + " out of " + (array.length - 1) );
  });

}
function init() {

  token = $('meta[name="csrf-token"]').attr('content');
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

  new Vue({
    el: "#app"
  });

  foo();
}

$(document).ready(init);
