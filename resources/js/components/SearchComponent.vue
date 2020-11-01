<template>
 <div class="wrapper form_searc">
  <h3 class="search_zag">Поиск:</h3>
  <form action="" method="POST" class="form_search_block">
   <input type="text" name="search" class="text_input" placeholder="search" v-model="search">
  </form>
  <ul class="search_result">
   <li v-for="plant in plants" v-text="plant.name"></li>
  </ul>
 </div>
</template>

<script>
 export default {
   mounted() {
    console.log('slider created');
   },

   data() {
   	return {
   	 plants: [],
     search: ''
   	}
   },

   watch: {
    search(newVal) {
     this.fetch();
     console.log(newVal);
    }
   },
   methods: {
    fetch() {
     if (this.search.length == 0) {
      this.plants = [];
      return;
     }
     let url = '/api/admin/plants';
     let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
     let headers = {
      'Content-Type': 'multipart/form-data',
      'X-CSRF-TOKEN': csrf
     }
     let formData = new FormData();
     formData.append('name', this.search);
     axios.post(url, formData)
      .then((data) => {
       console.log(data.data);
       this.plants = data.data;
      })
      .catch((err) => {
        console.log(err);
      })
    }
   }
  }

</script>