"""Bundle only the static site's source for a new GitHub repository."""
from pathlib import Path
from zipfile import ZipFile, ZIP_DEFLATED

root = Path(__file__).resolve().parent.parent
entries = ['index.html', 'js', 'css', 'img', 'scripts',
           '.github', '.gitignore', 'package.json', 'README.md']
target = root / 'kotobgy-github-pages.zip'
with ZipFile(target, 'w', ZIP_DEFLATED) as archive:
    for entry in entries:
        source = root / entry
        files = sorted(source.rglob('*')) if source.is_dir() else [source]
        for file in files:
            if file.is_file() and not file.is_symlink() and file.name != '.DS_Store':
                archive.write(file, file.relative_to(root))
print(f'Created {target.name}')
