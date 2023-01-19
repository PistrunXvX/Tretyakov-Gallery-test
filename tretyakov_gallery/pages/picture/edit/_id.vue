<template>
  <div class="container">
    <h2>Изменить параметры картины</h2>
    <form @submit.prevent="updatePicture">
      <div class="row mb-3">
        <label for="urlPath" class="col-sm-2 col-form-label">URL путь к картине</label>
        <div class="col-sm-10">
          <input v-model="picturesUrl" type="text" class="form-control" required placeholder="URL путь" id="urlPath">
        </div>
      </div>
      <div class="row mb-3">
        <label for="pictureName" class="col-sm-2 col-form-label">Название картины</label>
        <div class="col-sm-10">
          <input v-model="name" type="text" class="form-control" required placeholder="Название картины" id="pictureName">
        </div>
      </div>
      <div class="row mb-3">
        <label for="pictureDescription" class="col-sm-2 col-form-label">Описание картины</label>
        <div class="col-sm-10">
          <input v-model="description" type="text" class="form-control" required placeholder="Описание картины" id="pictureDescription">
        </div>
      </div>
      <div class="row mb-3">
        <label for="pictureAuthor" class="col-sm-2 col-form-label">Автор картины</label>
        <div class="col-sm-10">
          <input v-model="author" type="text" class="form-control" required placeholder="Автор картины" id="pictureAuthor">
        </div>
      </div>
      <div class="row mb-3">
        <label for="pictureAuthor" class="col-sm-2 col-form-label">Тег</label>
        <div class="col-sm-10">
          <select v-model="tagId" class="form-select" required>
            <option v-for="tag in tags" :key="tag.id" :value="tag.id">
              {{ tag.tagName }}
            </option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10">
          <button @click="showAlert" type="submit" class="btn btn-primary">Обновить</button>
        </div>
      </div>
    </form>
    <b-alert
      :show="dismissCountDown"
      dismissible
      variant="success"
      @dismissed="dismissCountDown=0"
      @dismiss-count-down="countDownChanged"
      class="alert-popup"
    >
      <p>Картина обновлена</p>
    </b-alert>
  </div>
</template>

<script>
export default {
  layout: 'default',

  data() {
    return {
      tags: [],
      picturesUrl: '',
      name: '',
      description: '',
      author: '',
      tagId: '',
      tagName: '',
      dismissSecs: 3,
      dismissCountDown: 0,
    }
  },

  async mounted() {
    const tags = await this.$axios.$get('/getAllTags');
    const picture = await this.$axios.$get(`/getPictureById/${this.$route.params.id}`);
    this.picturesUrl = picture[0].picturesUrl;
    this.name = picture[0].name;
    this.description = picture[0].description;
    this.author = picture[0].author;
    this.tagName = picture[0].tagName;
    this.tagId = picture[0].tagId;
    this.tags = tags;
  },

  methods: {
    async updatePicture() {
      await this.$axios.$post('/updatePicture', {
        id: parseInt(this.$route.params.id, 10),
        picturesUrl: this.picturesUrl,
        name: this.name,
        description: this.description,
        author: this.author,
        tagId: this.tagId,
      });
    },
    countDownChanged(dismissCountDown) {
      this.dismissCountDown = dismissCountDown;
    },
    showAlert() {
      this.dismissCountDown = this.dismissSecs;
    }
  },
}
</script>

<style scoped>
  .alert-popup {
    position: absolute;
    top: 5%;
    left: 50%;
  }
</style>
