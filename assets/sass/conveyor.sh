#!/bin/sh

cd `dirname $0`;
inotifywait -e modify -e create -e delete_self -r -m ./*.scss | while read line;
do
    make
done
