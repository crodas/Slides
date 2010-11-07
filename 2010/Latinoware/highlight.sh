#!/bin/bash -x

cd source
#rm *tex *html
for FILE in `ls *.php`
do
    NAME=`echo $FILE | sed -e 's/\..*//g'`
    if test $FILE -nt $NAME.tex
    then
        php -q -s $FILE  | sed -e 's/&lt;?php//g'  |sed -e 's/span/font/g' \
            |  sed -e "s/style=\"color: #\([0-9a-fA-Z]*\)\">/color=\"#\1\">/g" > $NAME.html
        ./html2latex.py $NAME.html > $NAME.tex
    fi
done
rm -f *html 
