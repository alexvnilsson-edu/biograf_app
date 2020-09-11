freeze:
	pip freeze | grep -v "pkg-resources" > requirements.txt
docs-pdf-export:
	bin/phpdoc-md
	ENABLE_PDF_EXPORT=1 mkdocs build