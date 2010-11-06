
CWD = $(notdir $(PWD))
HOMEDIR = $(PWD)

EXAMPLE = eso-ex

PACKAGE = eso-pic

LATEX = elatex 
PDFLATEX = pdfelatex 

ARCHNAME = $(PACKAGE)-$(shell echo `date +%y%m%d`).zip

ALL = $(EXAMPLE)1.ps $(EXAMPLE)2.ps $(EXAMPLE)3.pdf $(EXAMPLE)4.ps \
      $(EXAMPLE)5.ps

all : $(ALL)

$(EXAMPLE)%.ps : $(EXAMPLE)%.dvi
	dvips -Pwww $< -o $@

$(EXAMPLE)%.dvi : $(EXAMPLE)%.tex $(PACKAGE).sty
	$(LATEX) $<
	
$(EXAMPLE)%.pdf : $(EXAMPLE)%.tex $(PACKAGE).sty
	$(PDFLATEX) $<
	
$(PACKAGE).sty : $(PACKAGE).ins $(PACKAGE).dtx
	echo -e "y\ny" | tex $<	

doc : $(PACKAGE).ps

%.ps : %.dvi
	dvips -Pwww $< -o $@
	
$(PACKAGE).dvi : $(PACKAGE).dtx
	$(LATEX) $<
	makeindex -s gglo.ist -o $(basename $<).gls $(basename $<).glo
	$(LATEX) $<

arch :
	zip $(ARCHNAME) Makefile $(patsubst %.pdf,%.tex,$(ALL:.ps=.tex)) \
	  $(PACKAGE).dtx $(PACKAGE).ins -x "*.zip" 
	@ echo; echo $(ARCHNAME); echo;
	
clean :
	$(RM) *.log *.aux *.toc
	
veryclean : clean
	$(RM) *.dvi *.ps *.pdf
	
	
.SECONDARY : $(patsubst %.pdf,%.tex,$(ALL:.ps=.tex)) $(PACKAGE).sty
# Aus der dtx-Datei erzeugte Dateien am Ende nicht wieder löschen.



	
	
