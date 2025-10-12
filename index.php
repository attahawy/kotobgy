<!DOCTYPE>
<html lang="ar">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <base href="https://www.kotobgy.com">

 <title>كتبجي - محرك بحث الكتب العربية</title>
 <meta name="description" content="ابحث في ملايين الكتب العربية مع محرك البحث العربي الأول المخصص للكتب.">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <link rel="stylesheet" href="./css/hood.css">

 <meta name="twitter:card" content="summary_large_image">
 <meta name="twitter:title" content="كتبجي - محرك بحث الكتب العربية">
 <meta name="twitter:description" content="جميع مواقع الكتب في موقع واحد، ابحث واقرأ آلاف الكتب العربية">
 <meta name="twitter:image" content="https://www.kotobgy.com/img/assets/kotobgy-card-005.png">

 <meta property="og:url" content="https://www.kotobgy.com/">
 <meta property="og:title" content="كتبجي - محرك بحث الكتب العربية">
 <meta property="og:image" content="https://www.kotobgy.com/img/assets/kotobgy-card-005.png">
 <meta property="og:description" content="جميع مواقع الكتب في موقع واحد، ابحث واقرأ آلاف الكتب العربية">
 <link rel="shortcut icon" href="./img/assets/favicon.ico">
</head>

<body class="bg-dark text-light">

 <?php if (isset($_GET['submit'])) { ?>
  <div class="alert alert-success rtl mt-n2 mb-3">جزاك الله خيرًا، استلمنا الرابط وسنضيفه في أقرب وقت إن شاء الله.</div>
 <? } ?>

 <div class="container">

  <div class="row">
   <div class="col-md-6 offset-md-3 rtl">

    <h1 class="text-hide mt-3 text-center"><a href="https://www.kotobgy.com">كتبجي - محرك بحث الكتب العربية <img src="./img/assets/logo.png" height="170" alt="محرك بحث الكتب العربية - كتبجي"></a></h1>

    <div class="text-center rtl">

     <b>ماذا تريد أن تقرأ اليوم؟</b>

     ابحث في مئات الآلاف من الكتب العربية من عشرات المواقع. جمعناها لك في صفحة واحدة. كتبجي يشبه محرك البحث جوجل لكنه يبحث فقط في مواقع الكتب.

     <form class="mt-3 ltr" action="https://www.kotobgy.com/" method="get">
      <div class="input-group mb-3">
       <div class="input-group-prepend">
        <button class="btn btn-warning" type="search">بحث</button>
       </div>
       <input name="q" type="text" class="form-control rtl border border-warning text-light bg-dark" value="<?= str_replace("+", " ", $_GET['q']); ?>">
      </div>
     </form>

    </div>

    <?php if (isset($_GET['q'])) { ?>

     <div class="rtl bg-dark">
      <script>
       (function() {
        var cx = '011017032579473379479:stqpxmjugza';
        var gcse = document.createElement('script');
        gcse.type = 'text/javascript';
        gcse.async = true;
        gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(gcse, s);
       })();
      </script>
      <gcse:searchresults-only></gcse:searchresults-only>
     </div>

   </div>
  </div>
 </div>

<? } ?>

<div class="text-center my-5">
 <a href="https://play.google.com/store/apps/details?id=com.hassaneltantawy.alazkar" target="_blank" class="text-warning">حمّل تطبيق الأذكار النووية لأندرويد مجانًا</a><br><br>
 <a href="https://play.google.com/store/apps/details?id=com.hassaneltantawy.alazkar" target="_blank"><img width="300" src="https://raw.githubusercontent.com/muslimpack/Al-Azkar/main/alazkar/assets/icons/app.png" alt="تطبيق الأذكار النووية"></a>
</div>

<hr>

<div class="text-center small footnote text-light rtl my-5">
 <script>
  urls = [
   '<a class="text-warning" href="https://rajol.net">رجل - دليل الرجل العربي إلى الحياة</a>',
   '<a class="text-warning" target="_blank" href="https://t.me/kotobgycom">اشترك في قناة كتبجي في تليجرام</a>',
   '<a class="text-warning" target="_blank" href="https://t.me/rajolmag">اشترك في قناة رجل في تليجرام</a>',

  ];
  document.write(urls[Math.floor(Math.random() * urls.length)]);
 </script>
 <br><br>
 جميع الحقوق محفوظة لأصحابها، كتبجي غير مسؤول عن انتهاك حقوق الملكية الفكرية.
</div>

</body>

</html>