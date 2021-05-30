<template>
    <div>
        <GmapMap
            :center="coordinates"
            :zoom="20"
            style="width:80%; height:500px; margin: 32px auto;"
            ref="mapRef"></GmapMap>
    </div>
</template>

<script>
export default {
    name: "Location",
    data() {
        return {
            map: null,
            coordinates: {
                lat: -37.9848,
                lng: 145.2140,
            }
        }
    },
    created() {
        this.$getLocation({})
            .then(coordinates => {
                this.coordinates = coordinates;
            })
            .catch(error => {
                console.log(error);
            })
    },
    mounted() {
        this.$refs.mapRef.$mapPromise.then((map) => {
            map.panTo({lat: -37.9848, lng: 145.2140})
        })
    }
}
</script>

<style type="text/css">

</style>
