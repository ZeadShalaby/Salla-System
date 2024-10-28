<template>
    <footer class="footer">
      <div class="footer-top">
        <div>
          <h3>الاشتراك في النشرة البريدية</h3>
          <p>انضم الآن واحصل على خصم 10% على مشترياتك التالية!</p>
        </div>
        <div>
          <input type="email" placeholder="أدخل البريد الإلكتروني">
          <button>إشترك</button>
        </div>
        <div class="app-links">
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/67/App_Store_badge.svg" alt="App Store">
          <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Play Store">
        </div>
      </div>
      
      <div class="footer-links">
        <div class="footer-column">
          <h3>عن متجرنا</h3>
          <ul>
            <li>متجر سلة من افضل المتاجر لبيع المنتجات الرقمية.</li>
            <li>عالمية تسوق الآن بأفضل الأسعار.</li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>حسابي</h3>
          <ul>
            <li><a href="#">حسابي</a></li>
            <li><a href="#">طلباتي</a></li>
            <li><a href="#">سلة المشتريات</a></li>
            <li><a href="#">المفضلة</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>روابط مهمة</h3>
          <ul>
            <li><a href="#">من نحن</a></li>
            <li><a href="#">سياسة الخصوصية</a></li>
            <li><a href="#">الشروط والاحكام</a></li>
            <li><a href="#">الدعم الفني</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>تواصل معنا</h3>
          <ul>
            <li>واتساب : 009612345678932</li>
            <li>موبايل : 009612345678932</li>
            <li>البريد : <a href="https://salla.sa">https://salla.sa</a></li>
          </ul>
        </div>
      </div>
      
      <div class="social-icons">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/aa/Instagram_icon.png" alt="Instagram">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f7/Snapchat_Logo.png" alt="Snapchat">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/4f/Twitter-logo.svg" alt="Twitter">
      </div>
      
      <div class="payment-icons">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/52/Visa_2014.svg" alt="Visa">
        <img src="https://upload.wikimedia.org/wikipedia/commons/c/cb/MasterCard_Logo.svg" alt="MasterCard">
        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Paypal.svg" alt="PayPal">
      </div>
  
      <div class="footer-bottom">
        © 2023 جميع الحقوق محفوظة لمنصة سلة
      </div>
    </footer>
  </template>
  
  <style scoped>
  .footer {
    background-color: #f8f8f8;
    padding: 40px 0;
  }
  .footer-top {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding-bottom: 20px;
    border-bottom: 1px solid #ddd;
  }
  .footer-top div {
    flex: 1;
    text-align: center;
  }
  .footer-top input[type="email"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-left: 10px;
  }
  .footer-top button {
    padding: 10px 20px;
    background-color: #4bd0a0;
    color: white;
    border: none;
    border-radius: 5px;
  }
  .app-links img {
    width: 150px;
    margin: 5px;
  }
  .footer-links {
    display: flex;
    justify-content: space-around;
    padding: 20px 0;
  }
  .footer-column {
    flex: 1;
    padding: 0 20px;
  }
  .footer-column h3 {
    margin-bottom: 15px;
    color: #666;
  }
  .footer-column ul {
    list-style-type: none;
    padding: 0;
  }
  .footer-column ul li {
    margin-bottom: 10px;
    color: #666;
  }
  .footer-column ul li a {
    text-decoration: none;
    color: #666;
  }
  .social-icons {
    text-align: center;
    margin-bottom: 20px;
  }
  .social-icons img {
    width: 40px;
    margin: 0 10px;
  }
  .payment-icons {
    text-align: center;
    margin-top: 20px;
  }
  .payment-icons img {
    width: 50px;
    margin: 0 10px;
  }
  .footer-bottom {
    background-color: #222;
    color: #fff;
    text-align: center;
    padding: 10px;
  }
  </style>
  