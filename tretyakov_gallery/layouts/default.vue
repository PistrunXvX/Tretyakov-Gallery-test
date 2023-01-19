<template>
  <div class="wrapper">
    <div class="content">
      <Header />
        <div class="container-fluid main-property">
          <Nuxt />
        </div>
      <Footer />
    </div>
  </div>
</template>

<style>
  .main-property{
    background-color: #F6F3F0;
    min-height: 100vh;
  }

  .wrapper {
	  display: flex;
	  flex-direction: column;
	  min-height: 100%;
  }

  .content {
	  flex: 1 0 auto;
  }

  html, body {
	  height: 100%;
  }
</style>

