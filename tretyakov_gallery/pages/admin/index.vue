<template>
  <div class="container">
    <h2>Панель администратора</h2>
    <form @submit.prevent="createPicture">
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
          <button @click="showAlert" type="submit" class="btn btn-primary">Создать</button>
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
      <p>Картина создана</p>
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
      dismissSecs: 3,
      dismissCountDown: 0,
    }
  },

  async mounted() {
    const tags = await this.$axios.$get('/getAllTags');
    this.tags = tags;
  },

  methods: {
    async createPicture() {
      await this.$axios.$post('/createPicture', {
        picturesUrl: this.picturesUrl,
        name: this.name,
        description: this.description,
        author: this.author,
        tagId: this.tagId,
      });
      this.picturesUrl = '';
      this.name = '';
      this.description = '';
      this.author = '';
      this.tagId = '';
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
