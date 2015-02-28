install:
	make clean \
	&& npm install \
	&& gem install bundler \
	&& bundle install \
	&& bourbon install --path assets/css/vendor \
	&& neat install \
	&& mv neat assets/css/vendor/ \
	&& curl -L http://bit.ly/jqsource > ./assets/js/vendor/jquery.js \
	&& make build 

link:
	powder link

clean:
	rm -rf ./node_modules \
	&& rm -rf ./public \
	&& rm -rf ./theme \
	&& rm -rf ./tmp \
	&& rm -rf ./sass-cache \
	&& rm -rf ./assets/css/vendor/neat \
	&& rm -rf ./assets/css/vendor/bourbon

update:
	npm update
	&& bundle update \
	&& bourbon update --path assets/css/vendor \
	&& rm -rf ./assets/css/vendor/neat \
	&& neat install \
	&& mv neat assets/css/vendor/

build:
	gulp cleanbuild

theme:
	gulp cleanbuild \
	&& gulp theme

watch:
	gulp

open:
	powder open

deploy:
	s3_website push