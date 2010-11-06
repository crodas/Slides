#!/bin/bash
# KMB 2005 Aug 31

font=$1

ttf2afm -e T1-WGL4.enc ${font}.ttf -o rec${font}.afm
afm2tfm rec${font}.afm -T T1-WGL4.enc rec${font}.tfm

cat >| t1${font}.fd <<End-of-fdfile
\ProvidesFile{t1${font}.fd}[${font}]
\DeclareFontFamily{T1}{${font}}{}
\DeclareFontShape{T1}{${font}}{m}{n}{<-> rec${font}}{}
\DeclareFontShape{T1}{${font}}{bx}{n}{<->ssub * ptm/m/n}{}
\DeclareFontShape{T1}{${font}}{m}{it}{<->ssub * ptm/m/it}{}
\DeclareFontShape{T1}{${font}}{m}{sl}{<->ssub * ptm/m/sl}{}
\DeclareFontShape{T1}{${font}}{m}{sc}{<->ssub * ptm/m/sc}{}
\DeclareFontShape{T1}{${font}}{bx}{it}{<->ssub * ptm/b/it}{}
\DeclareFontShape{T1}{${font}}{bx}{sl}{<->ssub * ptm/b/sl}{}
\pdfmapline{+rec${font}\space <${font}.ttf\space <T1-WGL4.enc}
End-of-fdfile

cat >| ${font}.map <<End-of-mapfile
rec${font} ${font} T1Encoding ReEncodeFont < T1-WGL4.enc < ${font}.ttf
End-of-mapfile

cat >| ${font}.tex <<End-of-texfile
\documentclass{article}
\DeclareTextFontCommand{\text${font}}{\fontencoding{T1}\fontfamily{${font}}\selectfont}
\begin{document}
\noindent\text${font}{Hello! in ${font} abcdefghijklmnopqrstuvwxyz}
\end{document}
End-of-texfile

#pdflatex ${font}.tex
