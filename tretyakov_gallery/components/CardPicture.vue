<template>
    <div class="col-xl-3 col-lg-6 col-sm-12" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="card">
          <div class="card-body">
            <img :src="pictureUrl" :alt="name" class="card-img-top">
            <h3 class="card-title">{{name}}</h3>
            <p class="card-text">{{author}}</p>
            <p class="card-text">{{description}}</p>
            <p class="card-text">#{{tagName}}</p>
            <p class="card-text"> <NuxtLink class="nuxt-link" :to="{ name: 'picture-id', params: { id: id } }"> Подробнее</NuxtLink></p>
            <NuxtLink v-if="role == 'admin'" class="nuxt-link" :to="{ name: 'picture-edit-id', params: { id: id } }">
              <img class="setting" src="/settings.svg" alt="Настройки" style="width: 30px; height: 30px;">
            </NuxtLink>
          </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'CardPicture',
  props: ['id' ,'pictureUrl', 'name', 'description', 'author', 'tagName'],

  data() {
    return {
      role: this.$config.role
    }
  }
}
</script>

<style>

  .card{
    width: 100%;
    height: 100%;
    transition: all 0.3s ease-in;
    border: none;
    background-color: #F6F3F0
  }

  .card:hover {
    transform: scale(1.1);
  }

  .nuxt-link{
    color: black;
    text-decoration: underline;
  }

  .nuxt-link:hover {
    color: grey;
    text-decoration: underline;
  }

  .setting {
    transition: all 0.5s ease-out;
  }

  .setting:hover {
    transform: rotate(180deg);
  }
</style>
