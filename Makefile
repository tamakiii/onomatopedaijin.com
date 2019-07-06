install: \
	node_modules

lint:
	npx --no-install prettier --check $(shell find docs -name '*.html')

lint-fix:
	npx --no-install prettier --write $(shell find docs -name '*.html')

node_modules:
	npm install

clean:
	rm -rf node_modules
