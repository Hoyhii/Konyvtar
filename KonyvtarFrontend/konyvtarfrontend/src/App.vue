<template>
  <div id="app" class="container">
    <header>
      <h1>Petrik Könyvtár nyilvántartó</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#newbook">Új könyv hozzáadása</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://petrik.hu">Petrik honlap</a>
        </li>
      </ul>
  </div>
</nav>
<main class="row">
    <Book 
    class="col-12 col-md-6 col-xl-4" 
    v-for="book in books" 
    v-bind:key="book.id" 
    :book="book"
    
    />
    <BookForm id="newbook"
    @newbook="Reload"/>
</main>


    
    <footer>Készítette: Zsálek Norbert</footer>
  </div>
</template>

<script>
import Book from './components/BookItem.vue'
import BookForm from './components/BookForm.vue'

export default {
  name: 'App',
  components: {
    Book,
    BookForm
  },
  data() {
        return {
            books:[
              
            ]
        }
    },
    methods: {
      async Reload() {
        let Response = await fetch('http://127.0.0.1:8000/api/book')
        let data = await Response.json()
        this.books = data.data
      }
    },
    async mounted() {
      this.Reload()
    },
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
