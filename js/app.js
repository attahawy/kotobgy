import { config } from './config.js';

const keywords = ['فقه السنة', 'فلسطين', 'تاريخ الأندلس', 'الرحيق المختوم', 'ابن حزم', 'طوق الحمامة', 'الصحابة', 'موسوعة'];
const query = (new URLSearchParams(location.search).get('q') || '').trim();
if (query) {
  document.title = `${query} — كتبجي`;
  document.body.classList.add('has-results');
  document.querySelector('[data-home-content]').hidden = true;
  document.querySelector('.results-section').hidden = false;
  document.querySelector('#book-search').value = query;
  document.querySelector('#query-heading').textContent = `«${query}»`;
  const status = document.querySelector('#search-status');
  const timeout = window.setTimeout(() => {
    status.hidden = false;
    status.textContent = 'يستغرق تحميل النتائج وقتًا أطول من المعتاد. أعد تحميل الصفحة للمحاولة مجددًا.';
  }, 15000);
  window.__gcse = {
    searchCallbacks: { web: { rendered: () => {
      window.clearTimeout(timeout);
      status.hidden = true;
    } } },
  };
  const script = document.createElement('script');
  script.async = true;
  script.src = `https://cse.google.com/cse.js?${new URLSearchParams({ cx: config.searchEngineId })}`;
  script.onerror = () => {
    window.clearTimeout(timeout);
    status.textContent = 'تعذّر تحميل نتائج البحث. أعد تحميل الصفحة وحاول مجددًا.';
  };
  document.head.append(script);
}

document.querySelector('.search-form').addEventListener('submit', event => {
  const input = document.querySelector('#book-search');
  input.value = input.value.trim();
  if (!input.value) {
    event.preventDefault();
    input.reportValidity();
  }
});

const suggestions = document.querySelector('.suggestions');
if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
  const links = [...suggestions.querySelectorAll('a')];
  let offset = 0;
  let hovered = false;
  suggestions.addEventListener('mouseenter', () => hovered = true);
  suggestions.addEventListener('mouseleave', () => hovered = false);
  window.setInterval(() => {
    if (hovered || suggestions.contains(document.activeElement) || document.hidden) return;
    offset = (offset + links.length) % keywords.length;
    links.forEach((link, index) => {
      const keyword = keywords[(offset + index) % keywords.length];
      link.textContent = keyword;
      link.href = `./?q=${encodeURIComponent(keyword)}`;
    });
  }, 4200);
}
