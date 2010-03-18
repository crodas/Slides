all: build view

build:
	./highlight.sh
	pdflatex hackday.tex
	ppower4 hackday.pdf chackday.pdf
	mv chackday.pdf hackday.pdf

view:
	evince hackday.pdf &

edit:
	vim hackday.tex

clean:
	rm -f source/*.tex
	rm -f source/*.html
	rm -f *.log *.out *.aux

