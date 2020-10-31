<template>
 <div class="wrapper">
  <h1 class="zag">Панель редактирования растений</h1>
  <ul v-for="plant in plants">
   <li>{{ plant.name }} <a href="#" v-on:click="drop($event, plant.id)">Удалить</a></li>
  </ul>

  <form action="" method="POST">
   <input type="text" name="name" v-model="name">
   <input type="submit" value="Добавить" v-on:click="add">
  </form>
 </div>
 

 
 
</template>

<script>
 export default {
  mounted() {
   let url = '/api/admin/plants';
   let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
   let headers = {'Content-Type': 'multipart/form-data', 'X-CSRF-TOKEN': csrf};

   axios.post(url, headers)
    .then((data) => {
     console.log(data.data);
     this.plants = data.data;
    })
  },

  data() {
   return {
    plants: [],
    name: ''
   }
  },

  methods: {
   drop(event, id) {
    event.preventDefault()
    console.log(id);
    let url = `/api/admin/plants/delete/${id}`;
    let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    let headers = {'Content-Type': 'multipart/form-data', 'X-CSRF-TOKEN': csrf};
    axios.post(url, headers);
   },

   add(event) {
    event.preventDefault();
    let url = `/api/admin/plants/add`;
    let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    let headers = {'X-CSRF-TOKEN': csrf};
    let form = new FormData();
    form.append('name', this.name);
    axios.post(url, form, headers);
   }
  }
 }
</script>
