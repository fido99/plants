<template>
 <div class="wrapper">
  <h1 class="zag">Панель редактирования страницы</h1>
  <a href="/adminSlider" class="admin_link">Редактировать слайдер</a>
  <a href="/adminPlants" class="admin_link">Редактировать список растений</a>
  <div class="errors_block" v-if="isError">
    <p>Ошибка исправте:</p>
    <ul>
     <li v-for="error in errors" v-text="error"></li>
    </ul>
  </div>
  <form action="#" enctype="multipart/form-data" class="update_from_page">
   <input type="hidden" name="_method" value="PUT">
   <div class="form_item">
   	<span class="title">title:</span>
    <input type="text" name="title" placeholder="title" v-model="title" class="text" required>
   </div>

   <div class="form_item">
   	<span class="title">email:</span>
    <input type="email" name="email" placeholder="email" v-model="email" class="text" required>
   </div>

   <div class="form_item">
   	<span class="title">logotype:</span>
    <input type="file" name="logo" id="file" accept=".jpg, .jpeg, .png" multiple ref="file">
   </div>

   <div class="form_item form_textarea">
   	<span class="title">footer text:</span>
    <textarea name="footer_text" class="textarea" v-model="footerText" required></textarea>
   </div>
   <input type="submit" value="Сохранить" v-on:click="update" class="form_item submit">
  </form>
  <div class="message" v-if="isShow">
   <div class="message_updata" v-bind:class="{ error_updata: updateFalse, true_update: updateTrue}" v-text="message">
       
   </div>
  </div>
 </div>
</template>

<script>
 export default {
   mounted() {
    bkLib.onDomLoaded(nicEditors.allTextAreas);
    let url = '/api/getPage';
    axios.get(url)
     .then((data) => {
      console.log(data.data);
      this.title = data.data[0].values;
      this.email = data.data[1].values;
      let footer_text_data = document.querySelector('.nicEdit-main').innerHTML;
      footer_text_data = data.data[3].values;
     });
 
   },
   
   data() {
    return {
     title: '',
     email: '',
     footerText: '',
     isShow: false,
     updateTrue: false,
     updateFalse: false,
     message: '',
     errors: [],
     isError: false
    }
   },

   methods: {
    update(event) {
     event.preventDefault();

     if (this.errors.length) {
      this.errors = [];
      this.isError = false;
     }

     this.validate();

     if (this.errors.length > 0) {
      console.log(this.errors);
      return;
     }

     let footer_text_data = document.querySelector('.nicEdit-main').innerHTML;
     this.footerText = footer_text_data;
     console.log(footer_text_data);
     let url = '/api/updata';
     let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
     let headers = {'Content-Type': 'multipart/form-data', 'X-CSRF-TOKEN': csrf};
     let data = new FormData();
     data.append('file', this.$refs.file.files[0]);
     data.append('title', this.title);
     data.append('email', this.email);
     data.append('footer_text', this.footerText);
     console.log(this.$refs.file.files[0]);
     axios.post(url, data, headers)
      .then((data) => {
       console.log(data.data);
       this.message = 'Данные обновлены';
       this.isShow = true;
       this.updateTrue = true;
       this.updateFalse = false;
       setTimeout(() => this.isShow = !this.isShow, 2000);
      })
      .catch((err) => {
       console.log(err);
       this.message = 'Ошибка';
       this.isShow = true;
       this.updateFalse = true;
       this.updateTrue = false;
       setTimeout(() => this.isShow = !this.isShow, 2000);
      })
  
    },

    validateEmail(email) {
      let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);      
    },

    validate() {
     let footer_text = document.querySelector('.nicEdit-main').innerHTML;
     console.log('text = ' + footer_text);

     if (!this.title) {
      this.errors.push('Введите title');
     }

     if (!this.validateEmail(this.email)) {
      this.errors.push('Введите коректный email');
     }

     if (!footer_text) {
      this.errors.push('Введите footer text')
     }

     if (this.errors.length) {
      this.isError = true;
     }

    }
   },

   watch: {
    
   }
  }

</script>
