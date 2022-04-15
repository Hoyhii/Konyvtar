<template>
        <form>
            <div>
                <div v-if="vanHiba" class="alert alert-danger" role="alert">
                    {{ this.message }}
                </div>
                <div>
                    <label for="booktitle" class="form-label">Cím</label>
                    <input v-model="book.title" type="text" class="form-control" id="booktitle">
                </div>
                <div>
                    <label for="bookauthor" class="form-label">Szerző</label>
                    <input v-model="book.author" type="text" class="form-control" id="bookauthor">
                </div>
                <div>
                    <label for="bookpublishyear" class="form-label">Megjelenés éve</label>
                    <input v-model="book.publish_year" type="number" class="form-control" id="bookpublishyear">
                </div>
                <div>
                    <label for="bookpagecount" class="form-label">Hossz</label>
                    <input v-model="book.page_count" type="number" class="form-control" id="bookpagecount">
                </div>
                <button @click="newBook" class="btn btn-primary">Submit</button>
            </div>
        </form>
</template>

<script>
export default {
    name: 'BookForm',
    data() {
        return {
            vanHiba: false,
            message: '',
            book: {
                title: '',
                author: '',
                publish_year: '',
                page_count: ''
            }
        }
    },
    methods: {
        async newBook() {
            let Response = await fetch('https://127.0.0.1:8000/api/book', {
                method: "POST",
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(this.book)
            })
            let body =  await Response.json()
            if (Response.status == 201) {
                this.vanHiba = false
                this.book = {
                title: '',
                author: '',
                publish_year: '',
                page_count: ''
                }
                this.$emit("newbook")
                return 
            }
            this.vanHiba = true,
            this.message = body.message
            
        }
    },
    
}
</script>

<style>

</style>
