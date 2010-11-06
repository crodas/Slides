#/bin/bash -x

for TTF in `ls *.ttf`
do
    BNAME=${TTF:0:${#TTF}-4}
    ./make_font.sh $BNAME
    ./install_font.sh $BNAME
   # updmap --enable Map ${BNAME}.map
done
