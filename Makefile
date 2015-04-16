dependencies:
	npm install \
	&& bower install

install:
	make clean \
	&& npm install \
	&& bower install \
	&& gem install bundler \
	&& bundle \
	&& make build \
	&& make link

link:
	powder link

clean:
	rm -rf ./node_modules \
	&& rm -rf ./components \
	&& rm -rf ./public \
	&& rm -rf ./theme

update:
	npm update
	&& bundle update \
	&& bower update

build:
	gulp cleanbuild

theme:
	make build \
	&& gulp theme

watch:
	gulp

open:
	powder open

release:
	gulp release

deploy:
	make release \
	&& s3_website push \
	&& git push adventures master

adventures:
	make theme \
	&& git push adventures master

.PHONY: theme adventures