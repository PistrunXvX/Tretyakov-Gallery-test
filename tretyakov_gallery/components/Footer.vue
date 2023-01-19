<template>
  <footer class="container-fluid footer">
    <div class="row footer_block">
      <section class="col-6 footer_description-block-1">
        <ul class="list">
          <li><a href="#">Ответы на частые вопросы</a></li>
          <li><a href="#">История</a></li>
          <li><a href="#">Проекты</a></li>
          <li><a href="#">Попечительский совет</a></li>
          <li><a href="#">Фонд поддержки</a></li>
          <li><a href="#">Контакты</a></li>
        </ul>
      </section>
      <section class="col-6 footer_description-block-2">
        <ul class="list">
          <li><a href="#">Купить билеты</a></li>
          <li><a href="#">Возвраты</a></li>
        </ul>
      </section>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
}
</script>

<style>
  .footer_block{
    padding-top: 20px;
    padding-bottom: 20px;
  }

  .footer {
    background-color: #0D1117;
    flex: 0 0 auto;
  }

  .footer .list {
    list-style: none;
  }

  .footer .list a {
    color: #565656;
    text-decoration: none;
  }

  .footer .list a:hover {
    color: white;
  }
</style>
