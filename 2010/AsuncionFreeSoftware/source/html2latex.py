#!/usr/bin/python

import sys
from string import atoi
from HTMLParser import HTMLParser

class MyHTMLParser(HTMLParser):
    __level = 0
    __zOut = ""
    __colors = []
    __lasttag=""
    def handle_starttag(self, tag, attrs):
        self.__lasttag = tag
        if tag == 'br':
            if self.__color:
                self.__zOut += '}'
            self.__zOut += "\\\\\n"
            if self.__color:
                self.__zOut += '{\color{%s} ' % self.__color

        if tag == 'pause':
            self.__zOut += "\\pause"
        for attr in attrs:
            if attr[0] == 'color':
                self.__level=self.__level+1
                self.__zOut += '{\color{%s} ' % self.color(attr[1])
                self.__color   = self.color(attr[1])

    def handle_entityref(self,name):
        if name == 'lt':
            self.__zOut += '<'
        if name == 'gt':
            self.__zOut += '>'
        if name == 'nbsp':
            #self.__zOut += '\\ '
            self.__zOut += '\\hspace{0.1in}'
                

    def handle_data(self,data):
        data = data.replace('\\','\\textbackslash ')
        data = data.replace('$','\\$')
        data = data.replace('}','\\}')
        data = data.replace('{','\\{')
        data = data.replace('%','\\%')
        data = data.replace('_','\\_')
        data = data.replace('**','***')
        self.__zOut += "%s" % data

    def handle_endtag(self, tag):
        if self.__lasttag == 'br':
            self.__lasttag = ''
            return
        for i in range(self.__level):
            self.__color = False
            self.__zOut += "}"
        self.__level = 0

    def code(self):
        data = ""
        for color in  self.__colors:
            r,g,b = float(atoi(color[0:2],16))/255,float(atoi(color[2:4],16))/255,float(atoi(color[4:6],16))/255
            data += "\definecolor{%s}{rgb}{%.3f,%.3f,%.3f}\n" % (color,r,g,b)
        data+="\\begin{noindent}%s\\end{noindent}" % self.__zOut
        return data

    def color(self,zColor):
        if zColor[0] == '#':
            zColor = zColor[1:]
        if zColor not in self.__colors:
            self.__colors.append(zColor)
        return zColor

if __name__ == '__main__':
    zFile = sys.argv[1]
    zContent =  file(zFile).read()
    oParser = MyHTMLParser()
    oParser.feed(zContent)
    print oParser.code()
