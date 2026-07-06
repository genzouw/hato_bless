#!/bin/sh
mv "$1" "$(printf '%s\n' "$1" | sed -e "s|$2|$3|g")"
