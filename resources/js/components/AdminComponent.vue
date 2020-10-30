<template>
 <form action="#" enctype="multipart/form-data" name="updata_form">
  <input type="hidden" name="_method" value="PUT">
  <input type="text" name="title" placeholder="title" v-model="title">
  <input type="email" name="email" placeholder="email" v-model="email">
  <input type="file" name="logo" id="file" accept=".jpg, .jpeg, .png" multiple ref="file">
  <textarea name="footer_text"></textarea>
  <input type="submit" v-on:click="update">
 </form>
</template>

<script>
 export default {
   mounted() {
    console.log('slider created');
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