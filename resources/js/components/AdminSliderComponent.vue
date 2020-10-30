<template>
 <div class="wrapper">
  <h1 class="zag">Редактирование слайдера</h1>
  <form action="#" method="POST" v-for="slide in slides"  class="update_from_page" v-bind:class="'num' + slide.id">
   <input type="hidden" name="id" v-bind:value="slide.id">
   <div class="form_item">
    <span class="title">text:</span>
    <input type="text" name="text" v-bind:value="slide.text" class="text">
   </div>
   <div class="form_item">
    <span class="title">image:</span>
    <input type="file" name="image">
   </div>

   <div class="form_item">
    <span class="title">link:</span>
    <input type="text" name="link" v-bind:value="slide.link" class="text">
   </div>
   <div class="form_item">
    <input type="submit" v-on:click="updata($event, slide.id)" value="Обновить">
   </div>
   <div class="form_item">
    <button v-on:click="drop($event, slide.id)">Удалить</button>
   </div>
  </form>
 </div>
</template>

<script>
 export default {
  mounted() {
   let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
   let headers = {
    'X-CSRF-TOKEN': csrf
   };

   let url = '/api/adminSlider';

   axios.post(url, headers)
    .then((data) => {
     console.log(data.data);
     this.slides = data.data;
    })
  },
  data() {
   return {
    slides: []
   }
  },
  methods: {
   updata(event, id) {
    event.preventDefault();
    let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    let headers = {
     'X-CSRF-TOKEN': csrf
    };
    let updataFomt = document.querySelector(`.num${id}`);
    let newText = updataFomt.text.value;
    let newLink = updataFomt.link.value;

    let data = new FormData();
    data.append('id', id);
    data.append('text', newText);
    data.append('link', newLink);
    let url = '/api/adminSlider/updata';

    axios.post(url, data, headers)
     .then((data) => {
      console.log(data.data);
     })

     console.log(newText);
   },

   drop(event, id) {
    event.preventDefault();
    let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    let headers = {
     'X-CSRF-TOKEN': csrf
    };
    let url = '/api/adminSlider/delete';
    let dataId = new FormData();
    dataId.append('id', id);

    // delete data
    axios.post(url, dataId, headers)
     .then((data) => {
        this.slides = data.data;
     });


    console.log(id);
   }
  }
 }
</script>