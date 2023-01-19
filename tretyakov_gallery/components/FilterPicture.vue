<template>
  <div class="filter">
    <div class="row">
      <div class="col-12">
        <h3 class="filter-header">Параметры</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <select class="form-custom" @change="selectTag($event)">
          <option selected value="none" >Все типы</option>
          <option v-for="tag in tags" :key="tag.id" :value="tag.id">
            {{ tag.tagName }}
          </option>
        </select>
      </div>
      <div class="col-6">
        <select class="form-custom" @change="selectAuthor($event)">
          <option selected value="none">Все авторы</option>
          <option v-for="author in authors" :key="author.author" :value="author.author">
            {{ author.author }}
          </option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FilterPicture",
  emits: ['changeTag', 'changeAuthor'],

  data() {
    return {
      tags: [],
      authors: [],
    }
  },

  async mounted() {
    const tags = await this.$axios.$get('/getAllTags');
    const authors = await this.$axios.$get('/getAllAuthorPicture');
    this.tags = tags;
    this.authors = authors;
  },

  methods: {
    selectTag(event) {
      this.$emit('changeTag', event.target.value);
    },
    selectAuthor(event) {
      this.$emit('changeAuthor', event.target.value);
    }
  }
}
</script>

<style>
  .filter {
    padding-top: 20px;
    padding-bottom: 20px;
  }

  .filter-header {
    padding-bottom: 5px;
    border-bottom: 2px solid #B7976E;
  }

  .form-custom {
    background-color: inherit;
    border: none;
    border-bottom: 2px solid #4C4B4B;
    color: #676767;
    width: 100%;
  }
</style>
