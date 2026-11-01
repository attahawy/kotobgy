import { cp, mkdir, readFile, rm, writeFile } from 'node:fs/promises';
import { fileURLToPath } from 'node:url';
import path from 'node:path';

const root = fileURLToPath(new URL('../', import.meta.url));
const dist = path.join(root, 'dist');
await rm(dist, { recursive: true, force: true });
await mkdir(dist, { recursive: true });
// Explicit public allowlist: never copy PHP, editor settings, backups or credentials.
for (const entry of ['index.html', 'js', 'img', 'css']) {
  await cp(path.join(root, entry), path.join(dist, entry), { recursive: true, dereference: true });
}
await writeFile(path.join(dist, '.nojekyll'), '');

const rawBase = process.env.PAGES_BASE_PATH || '';
if (rawBase && !/^\/[a-zA-Z0-9_.-]+$/.test(rawBase)) throw new Error('Invalid PAGES_BASE_PATH');
const base = `${rawBase}/`;
const fallback = `<!doctype html>
<html lang="ar" dir="rtl"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>الصفحة غير موجودة — كتبجي</title></head>
<body><h1>الصفحة غير موجودة</h1><p><a href="${base}">العودة إلى كتبجي</a></p>
<script>
const base = ${JSON.stringify(base)};
const relative = location.pathname.startsWith(base) ? location.pathname.slice(base.length).replace(/\\/$/, '') : '';
const routes = {'index.php':'', 'beta.php':'', 'beta2.php':'', 'sources.php':'', 'sources':'', 'sources/index.html':'', 'newsource':'', 'newsource.php':'', 'newsource/index.html':''};
if (Object.hasOwn(routes, relative)) location.replace(base + routes[relative] + location.search + location.hash);
</script></body></html>\n`;
await writeFile(path.join(dist, '404.html'), fallback);
// Fail early on accidentally reintroduced server markup.
for (const entry of ['index.html']) {
  if ((await readFile(path.join(dist, entry), 'utf8')).includes('<?')) throw new Error(`Server code in ${entry}`);
}
console.log('Static site built in dist/ (no PHP or runtime backend).');
