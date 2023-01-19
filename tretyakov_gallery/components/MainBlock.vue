<template>
  <div class="container">
    <FilterPicture @changeTag="setTag" @changeAuthor="setAuthor"/>
    <div class="row card_picture">
      <card-picture
        v-for="(picture, index) in sortPicture(pictures)"
        :id ="picture.id"
        :pictureUrl="picture.picturesUrl"
        :name="picture.name"
        :description="picture.description"
        :author="picture.author"
        :tagName="picture.tagName"
        :key="index"/>
    </div>
  </div>
</template>

<script>
export default {
  name: "MainBlock",

  data() {
    return {
      pictures: [],
      findTag: '',
      findAuthor: '',
    }
  },

  async mounted() {
    const pictures = await this.$axios.$get('/getAllPictures');
    this.pictures = pictures;
  },

  methods: {
    setTag(data) {
      this.findTag = data;
    },
    setAuthor(data) {
      this.findAuthor = data;
    },
    sortPicture(array) {
      if ((this.findTag == '' || this.findTag == 'none' || this.findTag == undefined) &&
          (this.findAuthor == 'none' || this.findAuthor == '' || this.findAuthor == undefined))
        array = this.pictures;
      else if (this.findAuthor == 'none' || this.findAuthor == '')
        array = array.filter((picture) => {return picture.tagId == this.findTag});
      else if (this.findTag == 'none' || this.findTag == '')
        array = array.filter((picture) => {return picture.author == this.findAuthor});
      else
        array = array.filter((picture) => {return picture.author == this.findAuthor && picture.tagId == this.findTag});

      return array;
    }
  },
}
</script>

<style>
  .card_picture {
    padding-top: 20px;
    padding-bottom: 20px;
  }
</style>
