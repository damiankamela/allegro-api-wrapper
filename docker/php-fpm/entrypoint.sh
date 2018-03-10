#!/bin/sh

set -e

cd /application && nohup php artisan serve --host=0.0.0.0 > /var/log/phpd.log 2>&1 &

sleep infinity