<template>
 <div class="wrapper">
  <h1>Панель редактирования страницы</h1>
  <form action="#" enctype="multipart/form-data" name="updata_form">
   <input type="hidden" name="_method" value="PUT">
   <input type="text" name="title" placeholder="title" v-model="title" required>
   <input type="email" name="email" placeholder="email" v-model="email" required>
   <input type="file" name="logo" id="file" accept=".jpg, .jpeg, .png" multiple ref="file">
   <textarea name="footer_text" required></textarea>
   <input type="submit" v-on:click="update">
  </form>
  <a href="">Редактировать слайдер</a>
  <a href="">Редактировать список растений</a>
</div>
</template>

<script>
 export default {
   mounted() {
   	let url = '/api/getData';
   	let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    axios.post(url, {})
     .then((data) => {
      console.log(data.data);
     })
   },
   data() {
    return {
     title: '',
     email: '',

    }
   },

   methods: {
    update(event) {
     event.preventDefault();
     let url = '/api/updata';
     let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
     let headers = {'Content-Type': 'multipart/form-data', 'X-CSRF-TOKEN': csrf};
     let data = new FormData();
     data.append('file', this.$refs.file.files[0]);
     data.append('title', this.title);
     data.append('email', this.email);
     console.log(this.$refs.file.files[0]);
     axios.post(url, data, headers)
      .then((data) => {
       console.log(data.data);
      })
      .catch((err) => {
       console.log(err);
      })
  
    }
   }
  }

</script>
