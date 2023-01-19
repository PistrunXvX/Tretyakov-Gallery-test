<template>
  <div class="container">
    <div class="row align-items-center">
      <div class="col">
        <img :src="picturesUrl" :alt="name" class="img-fluid">
      </div>
      <div class="col-md-auto">
        <h2>{{ name }}</h2>
        <p> {{ description }} </p>
        <p> {{ author }} </p>
        <p>#{{ tagName }} </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  layouts: 'default',

  data() {
    return {
      picturesUrl: '',
      name: '',
      description: '',
      author: '',
      tagName: '',
    }
  },

  async mounted() {
    const picture = await this.$axios.$get(`/getPictureById/${this.$route.params.id}`);
    this.picturesUrl = picture[0].picturesUrl;
    this.name = picture[0].name;
    this.description = picture[0].description;
    this.author = picture[0].author;
    this.tagName = picture[0].tagName;
  }
}
</script>
