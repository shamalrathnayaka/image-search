<template xmlns="http://www.w3.org/1999/html">
    <div class="col-12 mb-1 text-start">
        <div class="col-12">
            <form @submit.prevent="searchingMedia">
                <div class="row col-12">
                    <div class="col-11">
                        <input required type="text" placeholder="Search here..." class="form-control"
                               v-model="searchText">
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
            <br>
            <form @submit.prevent="addMedia">
                <div class="row">

                    <div id="no-results" v-show="images.length < 1">
                        <p class="center">Your results will appear here...</p>
                    </div>

                    <div class="col-md-2" v-for="(image,key) in images" :key="key">
                        <input type="radio" v-bind:id="image.id" :value="image" name="radio_images" v-model="radio_image">
<!--                        <input type="text" hidden :value="image.alt_description" v-model="image_alt">-->
                        <label :for="image.id">
                            <div class="col-md-12">
                                <div class="thumbnail">
                                    <img v-bind:src="image.urls.small" v-bind:alt="image.alt_description" width="100%">
<!--                                                            <input type="text" hidden v-bind:value="image.urls.full" v-model="full_image_url">-->
                                    <img hidden v-bind:src="image.urls.full" v-model="full_image_url" v-bind:alt="image.alt_description" width="100%">
                                    <div class="caption">
                                        <p v-model="image_alt">{{ image.alt_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "search",
    data() {
        return {
            searchText: "",
            images: [],
            image: "",
            radio_image:"",
            full_image_url:"",
            image_alt:"",

        }
    },
    methods: {
        async searchingMedia() {
            await this.axios.get('/api/media/', {
                params: {
                    search_text: this.searchText,
                }
            }).then(response => {
                this.images = response.data.results;
            }).catch(error => {
                console.log(error)
            })
        },
        async addMedia() {
            await this.axios.get('/api/add/', {
                params: {
                    image: this.radio_image,
                }
            }).then(response => {
                console.log(response);
            }).catch(error => {
                console.log(error);
            })
        },
    },
    mounted() {
        //
    }
}
</script>
