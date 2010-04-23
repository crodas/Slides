all: build view

build:
	./highlight.sh
	pdflatex slide.tex
	ppower4 slide.pdf cslide.pdf
	mv cslide.pdf slide.pdf

view:
	evince slide.pdf &

edit:
	vim slide.tex

clean:
	rm -f source/*.tex
	rm -f source/*.html
	rm -f *.log *.out *.aux

