#!/bin/bash
# KMB 2005 Aug 31

font=$1

texmf=/usr/share/texmf

mkdir -p ${texmf}/fonts/afm/unknown
mv rec${font}.afm ${texmf}/fonts/afm/unknown

mkdir -p ${texmf}/fonts/tfm/unknown
mv rec${font}.tfm ${texmf}/fonts/tfm/unknown

mkdir -p ${texmf}/fonts/truetype/unknown
cp ${font}.ttf ${texmf}/fonts/truetype/unknown

mkdir -p ${texmf}/tex/latex/unknown
mv t1${font}.fd ${texmf}/tex/latex/unknown

mkdir -p ${texmf}/fonts/map/pdftex/unknown/
cp ${font}.map ${texmf}/fonts/map/pdftex/unknown/
updmap --enable Map ${font}.map

texhash
