<template>
  <header class="container-fluid main-block">
    <div class="row">
      <div class="logo col-6 align-self-center">
        <NuxtLink to="/">
          <img class="logo-icon" src="/logo.svg" alt="Логотип">
        </NuxtLink>
      </div>
      <div v-if="role == 'admin'" class="user col-6 align-self-center">
        <NuxtLink to="/admin"> Админ панель </NuxtLink>
        <p class="user">Администратор</p>
        <img class="user-icon" src="/user.svg" alt="Пользователь">
      </div>
      <div v-else class="user col-6 align-self-center">
        <p class="user">Пользователь</p>
        <img class="user-icon" src="/user.svg" alt="Пользователь">
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "Header",

  data() {
    return {
      role: this.$config.role,
    }
  },

  mounted() {
    console.log(this.$config.role);
  }
}
</script>

<style>
  .main-block {
    background-color: #0D1117;
  }

  .main-block .row{
    padding: 20px;
  }

  .user {
    text-align: right;
    color: white;
    display: inline;
  }

  .user-icon {
    width: 40px;
    height: 40px;
  }
</style>
