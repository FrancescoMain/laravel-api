<script >

  import Axios from 'axios' ;

  export default {

    mounted() {
      Axios.get('http://127.0.0.1:8000/api/v1/movie/all')
        .then(res => {

          const data = res.data;
          const success = data.success;
          const movies = data.response;
          console.log(movies);
        })
        .catch(err => console.error(err));
    }
  }
</script>

<template>
    <h1>
      hello world
    </h1>
</template>

<style scoped>

</style>
