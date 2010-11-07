all: build view

build:
	./highlight.sh
	pdflatex Latinoware.tex
	ppower4 Latinoware.pdf cLatinoware.pdf
	mv cLatinoware.pdf Latinoware.pdf

view:
	evince Latinoware.pdf &

edit:
	vim Latinoware.tex

clean:
	rm -f source/*.tex
	rm -f source/*.html
	rm -f *.log *.out *.aux

