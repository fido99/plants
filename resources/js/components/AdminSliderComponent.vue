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
    <input type="file" name="file">
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

  <div class="wrapp_add_slide">
   <h2 class="zag">Добавить слайд</h2>
   <form action="" method="POST" class="update_from_page add_slide_form">
    <div class="form_item">
     <span class="title">text:</span>
     <input type="text" name="text" v-model='text'>
    </div>
    <div class="form_item">
     <span class="title">image:</span>
     <input type="file" name="file">
    </div>
    <div class="form_item">
     <span class="title">link:</span>
     <input type="text" name="link" v-model='link'>
    </div>
    <div class="form_item">
     <input type="submit" value="Добавить" v-on:click="addSlide">
    </div>
   </form>
  </div>
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
    slides: [],
    text: '',
    link: ''
   }
  },
  methods: {
   updata(event, id) {
    event.preventDefault();
    let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    let headers = {
     'X-CSRF-TOKEN': csrf,
     'Content-Type': 'multipart/form-data'
    };
    let updataFomt = document.querySelector(`.num${id}`);
    let file = updataFomt.file.files[0];
    let newText = updataFomt.text.value;
    let newLink = updataFomt.link.value;

    let data = new FormData();
    data.append('id', id);
    data.append('text', newText);
    data.append('link', newLink);
    data.append('file', file);
    let url = '/api/adminSlider/updata';

    axios.post(url, data, headers)
     .then((data) => {
      console.log(data.data);
     })

     console.log(newText);
     console.log(file);
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
   },

   addSlide(event) {
    event.preventDefault();
    let formFile = document.querySelector('.add_slide_form').file.files[0];
    let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    let headers = {
     'X-CSRF-TOKEN': csrf,
     'Content-Type': 'multipart/form-data'
    };    
    let url = '/api/adminSlider/add';
    let data = new FormData();
    data.append('text', this.text);
    data.append('link', this.link);
    data.append('file', formFile);

    axios.post(url, data, headers)
     .then((data) => {
      console.log(data.data);
     });
   }
  }
 }
</script>