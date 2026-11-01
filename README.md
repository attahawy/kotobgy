# كتبجي — نسخة GitHub Pages

نسخة ثابتة من الموقع الحالي، بنفس التصميم العربي ودعم الوضع الليلي والموبايل.
تعمل دون PHP أو قاعدة بيانات أو مفاتيح API سرية، ودون تثبيت حزم npm.

- البحث عن الكتب يستخدم Google Programmable Search الموجود بالفعل، مباشرة من المتصفح. يحتاج اتصالًا بالإنترنت ويظل تابعًا لتوفّر خدمة Google وإعدادات المحرك.
- أُلغي دليل المصادر ونموذج الاقتراحات وملف بيانات الاقتراحات؛ كانت تلك الروابط اقتراحات مستخدمين وليست إعدادات محرك البحث.
- نطاق البحث يُدار من لوحة تحكم Google Programmable Search فقط، ولا يعتمد على قائمة روابط محلية.
- تُحوّل روابط الدليل والنموذج القديمة إلى صفحة البحث الرئيسية.

## التشغيل محليًا

يتطلب البناء Node.js 22 أو أحدث. المعاينة تستخدم Python 3:

```sh
npm test
npm run build
npm run preview
```

افتح `http://127.0.0.1:4173/`. استخدم خادم ملفات ثابتة بدل فتح `index.html` عبر `file://`، حتى تعمل JavaScript modules. يتحقق `npm test` من صحة صياغة JavaScript، ثم يبني `npm run build` ملفات النشر.

## النشر على GitHub Pages

المستودع: https://github.com/attahawy/kotobgy

1. ارفع التعديلات إلى فرع `main` في المستودع، بما فيها مجلد `.github` المخفي. يمكن استخدام محتويات `kotobgy-github-pages.zip` لنقل ملفات النسخة الثابتة فقط.
2. من **Settings → Pages → Build and deployment → Source** اختر **GitHub Actions**.
3. شغّل **Actions → Deploy static Kotobgy to GitHub Pages → Run workflow**، أو ادفع تعديلًا إلى `main`.

ينشر المسار `.github/workflows/pages.yml` مجلد `dist` فقط بعد الاختبارات والبناء. الروابط النسبية تعمل على دومين خاص وعلى `username.github.io/repository/`؛ يضبط البناء مسار روابط 404 القديمة تلقائيًا من إعدادات Pages.

للنشر يدويًا أو على مضيف ثابت آخر، انشر **محتويات `dist` فقط**. عند البناء لموقع مشروع دون GitHub Actions:

```sh
PAGES_BASE_PATH=/repository npm run build
```

يمكن ربط `kotobgy.com` لاحقًا من إعدادات Pages وDNS. لم تُغيَّر الاستضافة الحالية أو DNS في هذا التحويل.

تُنفّذ تحويلات روابط PHP وصفحتي الدليل والنموذج القديمتين داخل صفحة 404 في المتصفح، مع الاحتفاظ بمعلمات الرابط؛ لا توفر GitHub Pages تحويلات خادم HTTP 301/308. صفحة البحث `/` ملف ثابت مباشر.

## الملفات القديمة

نُقلت ملفات PHP وإعدادات الاتصال القديمة خارج مجلد الموقع إلى مجلد أرشيف `legacy-php-*` بجواره، للاسترجاع عند الحاجة. يقدّم Apache المحلي `index.html` عبر `.htaccess`، ويحوّل روابط الدليل والنموذج القديمة إلى الرئيسية. لا تحتاج نسخة GitHub Pages إلى ملف `.htaccess`.

**لا ترفع مجلد المشروع القديم كاملًا** إلى مستودع عام. استخدم الحزمة المجهزة أو قائمة الملفات المسموح بها في `scripts/package.py`.

لإعادة تجهيز الحزمة بعد التعديل:

```sh
npm run package
```

توثيق إعداد النشر: https://docs.github.com/en/pages/getting-started-with-github-pages/using-custom-workflows-with-github-pages
