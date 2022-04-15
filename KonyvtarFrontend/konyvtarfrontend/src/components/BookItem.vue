<template>
        <article class="card">
            <img :src="picture" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ book.title }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ book.author }}</h6>
                <p class="card-text">{{ book.publish_year }}</p>
                <p class="card-text">{{ book.page_count }}</p>
                <a @click="Rent" class="btn btn-primary">Kölcsönzés</a>
                <div v-if="vanHiba" class="alert alert-danger" role="alert">
                    {{ message }}
                </div>
                <div v-if="sikeresKolcsonzes" class="alert alert-primary" role="alert">
                    Sikeres foglalás!
                </div>
            </div>
        </article>
</template>

<script>
export default {
    name: 'BookItem',
    props: [
        "book"
        ],
    data() {
        return {
            vanHiba: false,
            message: '',
            sikeresKolcsonzes: false
        }
    },
    computed: {
        picture() {
            return "/szerzok/" + this.book.author + ".jpg"
        }
    },
    methods: {
        async Rent() {
            let Response = await fetch(`https://127.0.0.1:8000/api/book/${this.book.id}/rent`, {
                method: "POST",
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json'
                },
            })
            let body =  await Response.json()
            if (Response.status == 200) {
                this.sikeresKolcsonzes = true
                this.vanHiba = false
                return
            }
            this.message = body.message
            this.vanHiba = true
            this.sikeresKolcsonzes = false
        }
    },
    
}
</script>

<style>

</style>
