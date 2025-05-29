#!/bin/sh
set -o xtrace

cp -r htdocs/*.php //10.0.0.43/web
mkdir //10.0.0.43/web/private
cp -r htdocs/private //10.0.0.43/web

cp -r htdocs/public/*.css //10.0.0.43/web/public
cp -r htdocs/public/*.php //10.0.0.43/web/public

cp -r htdocs/public/images/*.csv //10.0.0.43/web/public/images


