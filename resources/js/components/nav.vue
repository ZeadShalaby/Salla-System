<template>

  <nav class="navbar">
    <div class="top-bar">
      <ul class="contact-info">
        <li><a href="mailto:Support@salla.sa"><i class="fa fa-envelope"></i> Support@salla.sa</a></li>
        <li><i class="fa fa-phone"></i> +966556754472</li>
      </ul>
      <ul class="nav-links">
        <li>  <router-link to="/">Home</router-link></li>
        <li><router-link to="/product">Product</router-link></li>
        <li><a href="#">الفئة</a></li>
        <li><a href="#">سياسة الإستبدال أو الإسترجاع</a></li>
        <li><a href="#">تواصل معنا</a></li>
      </ul>
    </div>

    <div class="main-nav">
      <div class="logo-search">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Shop.svg" alt="Logo" class="logo">
        <input type="text" placeholder="إبحث عما تريد" class="search-bar">
      </div>

      <div class="account-cart">
        <ul>
          <li><a href="#">مرحباً بك</a></li>
          <li><a href="#">تسجيل دخول</a></li>
          <li><a href="#" class="cart">
            <i class="fa fa-shopping-cart"></i> سلة المشتريات <span class="cart-amount">1,200 رس</span>
          </a></li>
        </ul>
      </div>
    </div>

    <div class="bottom-nav">
      <ul class="category-links">
        <li><a href="#">كل المنتجات</a></li>
        <li><a href="#">إلكترونيات</a></li>
        <li><a href="#">موبايلات</a></li>
        <li><a href="#">كاميرات مراقبة</a></li>
        <li><a href="#">كاميرات رقمية</a></li>
        <li><a href="#">شاشات كمبيوتر</a></li>
        <li><a href="#">اكسسوارات</a></li>
        <li><a href="#">سماعات</a></li>
      </ul>
    </div>
  </nav>
</template>

<style scoped>
.navbar {
  background-color: #f8f8f8;
}

.top-bar {
  display: flex;
  justify-content: space-between;
  padding: 10px;
  background-color: #fafafa;
  border-bottom: 1px solid #e6e6e6;
}

.contact-info, .nav-links {
  display: flex;
  list-style-type: none;
}

.contact-info li, .nav-links li {
  margin-left: 20px;
}

.contact-info li a, .nav-links li a {
  text-decoration: none;
  color: #444;
}

.main-nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 10px;
}

.logo {
  width: 80px;
  margin-right: 20px;
}

.search-bar {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 300px;
}

.account-cart ul {
  display: flex;
  list-style-type: none;
}

.account-cart li {
  margin-left: 20px;
}

.cart {
  position: relative;
  color: #444;
  text-decoration: none;
}

.cart-amount {
  background-color: red;
  color: white;
  border-radius: 12px;
  padding: 2px 5px;
  position: absolute;
  top: -10px;
  right: -15px;
}

.bottom-nav {
  background-color: #222;
  padding: 10px;
  text-align: center;
}

.bottom-nav ul {
  list-style-type: none;
  display: flex;
  justify-content: center;
}

.bottom-nav li {
  margin-left: 20px;
}

.bottom-nav li a {
  color: #fff;
  text-decoration: none;
}
</style>

