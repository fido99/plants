<template>
 <div class="wrapper">
  <h1 class="zag">Панель редактирования страницы</h1>
  <form action="#" enctype="multipart/form-data" class="update_from_page">
   <input type="hidden" name="_method" value="PUT">
   <div class="form_item">
   	<span class="title">title:</span>
    <input type="text" name="title" placeholder="title" v-model="title" class="text" required>
    <span class="error">error</span>
   </div>

   <div class="form_item">
   	<span class="title">email:</span>
    <input type="email" name="email" placeholder="email" v-model="email" class="text" required>
    <span class="error">error</span>
   </div>

   <div class="form_item">
   	<span class="title">logotype:</span>
    <input type="file" name="logo" id="file" accept=".jpg, .jpeg, .png" multiple ref="file">
    <span class="error">error</span>
   </div>

   <div class="form_item form_textarea">
   	<span class="title">footer text:</span>
    <textarea name="footer_text" class="textarea" required></textarea>
    <span class="error">error</span>
   </div>
   <input type="submit" value="Сохранить" v-on:click="update" class="form_item submit">
  </form>
  <a href="">Редактировать слайдер</a>
  <a href="">Редактировать список растений</a>
</div>
</template>

<script>
 export default {
   mounted() {
    bkLib.onDomLoaded(nicEditors.allTextAreas);
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
