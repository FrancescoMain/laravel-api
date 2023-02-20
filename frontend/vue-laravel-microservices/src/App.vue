<script >

  import axios from 'axios';

  const API_URL = 'http://127.0.0.1:8000/api/';
  const API_VER = 'v1/';
  const API = API_URL + API_VER;

  export default {
    data() {
      return {
      
        movies: [],
        genres: [],
        tags: [],

        movie_name: '',
        movie_year: '',
        movie_cashOut: '',

        movie_genre: '',
        movie_tags: [],
      }
    },
    methods: {
      updateData() {
        axios.get(API + 'movie/all')
          .then(res => {
            const data = res.data;
            const success = data.success;

            const response = data.response;

            const movies =  response.movies;
            const genres = response.genres;
            const tags = response.tags;


            if (success) {
              
              this.movies = movies;
              this.genres = genres;
              this.tags = tags;
              
            }
          })
          .catch(err => console.error(err));

      },
      takeGenre(id) {
        return genres[id];
      }
    },
    mounted() {
      this.updateData();
      console.log(this.Data);
    }
  }
</script>

<template>
    <h1>
      Movies
    </h1>
    <ul>
      <li v-for="movie in movies" :key="movie.id">
        {{movie.name}}
        <ul>
          <li v-for="tag in movie.tags" :key="tag.id">
            {{ tag.name }}
          </li>
        </ul>
      </li>  
    </ul>
</template>

<style>

</style>
