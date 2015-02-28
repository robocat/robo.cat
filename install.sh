#!/bin/sh

cd /var/repo/theme/
make clean && make build && make theme
rm -rf /var/www/wp-content/themes/robotheme
cp -R ./theme/ /var/www/wp-content/themes/robotheme