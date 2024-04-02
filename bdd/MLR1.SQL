DROP DATABASE IF EXISTS boisduroy;

CREATE DATABASE IF NOT EXISTS boisduroy;
USE boisduroy;
# -----------------------------------------------------------------------------
#       TABLE : STATUT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS STATUT
 (
   IDSTATUT INTEGER(2) NOT NULL  ,
   NOMSTATUT CHAR(32) NOT NULL  ,
   REFUS BOOL NOT NULL  
   , PRIMARY KEY (IDSTATUT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : NOTEFRAIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS NOTEFRAIS
 (
   IDNOTEFRAIS INTEGER(2) NOT NULL  ,
   MATRICULE CHAR(32) NOT NULL  ,
   DATENOTEFRAIS DATE NOT NULL  ,
   LIBELLENOTEFRAIS CHAR(50) NOT NULL  
   , PRIMARY KEY (IDNOTEFRAIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE NOTEFRAIS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_NOTEFRAIS_EMPLOYE
     ON NOTEFRAIS (MATRICULE ASC);

# -----------------------------------------------------------------------------
#       TABLE : TYPEMETIER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPEMETIER
 (
   IDTYPEMETIER INTEGER(2) NOT NULL  ,
   NOMMETIER CHAR(32) NOT NULL  
   , PRIMARY KEY (IDTYPEMETIER) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ETAPE_VALIDATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETAPE_VALIDATION
 (
   IDSTATUT INTEGER(2) NOT NULL  ,
   MATRICULE CHAR(32) NOT NULL  ,
   RAISONREFUS BOOL NOT NULL  ,
   IDETAPVALID INTEGER(5) NOT NULL AUTO_INCREMENT ,
   DATEVALID DATE NOT NULL  
   , PRIMARY KEY (IDETAPVALID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ETAPE_VALIDATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ETAPE_VALIDATION_STATUT
     ON ETAPE_VALIDATION (IDSTATUT ASC);

CREATE  INDEX I_FK_ETAPE_VALIDATION_EMPLOYE
     ON ETAPE_VALIDATION (MATRICULE ASC);

# -----------------------------------------------------------------------------
#       TABLE : TYPEFRAIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPEFRAIS
 (
   IDTYPEFRAIS INTEGER(4) NOT NULL  ,
   TYPEFRAIS CHAR(32) NOT NULL  ,
   REMBOURSEMENTTYPEFRAIS CHAR(32) NOT NULL  
   , PRIMARY KEY (IDTYPEFRAIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : LIGNENOTE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LIGNENOTE
 (
   IDNOTEFRAIS INTEGER(2) NOT NULL  ,
   IDLIGNENOTE INTEGER(2) NOT NULL  ,
   IDTYPEFRAIS INTEGER(4) NOT NULL  ,
   QUANTITE INTEGER(2) NOT NULL  ,
   COUTTOTAL INTEGER(2) NOT NULL  
   , PRIMARY KEY (IDNOTEFRAIS,IDLIGNENOTE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE LIGNENOTE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_LIGNENOTE_NOTEFRAIS
     ON LIGNENOTE (IDNOTEFRAIS ASC);

CREATE  INDEX I_FK_LIGNENOTE_TYPEFRAIS
     ON LIGNENOTE (IDTYPEFRAIS ASC);

# -----------------------------------------------------------------------------
#       TABLE : TYPEPRODUIT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPEPRODUIT
 (
   CODEPRODUIT INTEGER(2) NOT NULL  ,
   TYPEPRODUIT INTEGER(2) NOT NULL  
   , PRIMARY KEY (CODEPRODUIT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : EMPLOYE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EMPLOYE
 (
   MATRICULE CHAR(32) NOT NULL  ,
   CODEPRODUIT INTEGER(2) NULL  ,
   MATRICULE_ÊTRE_RESPONSABLE CHAR(32) NULL  ,
   IDTYPEMETIER INTEGER(2) NOT NULL  ,
   NOM CHAR(50) NOT NULL  ,
   PRENOM CHAR(50) NOT NULL  ,
   DATENAISS DATE NOT NULL  ,
   DATEENTREE DATE NOT NULL  ,
   DATESORTIE DATE NOT NULL  ,
   MDPCOMPTE CHAR(32) NOT NULL  ,
   PREMIERECONNEXION BOOL NOT NULL  ,
   ADMIN BOOL NOT NULL  
   , PRIMARY KEY (MATRICULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EMPLOYE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EMPLOYE_TYPEPRODUIT
     ON EMPLOYE (CODEPRODUIT ASC);

CREATE  INDEX I_FK_EMPLOYE_EMPLOYE
     ON EMPLOYE (MATRICULE_ÊTRE_RESPONSABLE ASC);

CREATE  INDEX I_FK_EMPLOYE_TYPEMETIER
     ON EMPLOYE (IDTYPEMETIER ASC);

# -----------------------------------------------------------------------------
#       TABLE : VALIDER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VALIDER
 (
   IDETAPVALID INTEGER(5) NOT NULL  ,
   IDNOTEFRAIS INTEGER(2) NOT NULL  
   , PRIMARY KEY (IDETAPVALID,IDNOTEFRAIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VALIDER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VALIDER_ETAPE_VALIDATION
     ON VALIDER (IDETAPVALID ASC);

CREATE  INDEX I_FK_VALIDER_NOTEFRAIS
     ON VALIDER (IDNOTEFRAIS ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE NOTEFRAIS 
  ADD FOREIGN KEY FK_NOTEFRAIS_EMPLOYE (MATRICULE)
      REFERENCES EMPLOYE (MATRICULE) ;


ALTER TABLE ETAPE_VALIDATION 
  ADD FOREIGN KEY FK_ETAPE_VALIDATION_STATUT (IDSTATUT)
      REFERENCES STATUT (IDSTATUT) ;


ALTER TABLE ETAPE_VALIDATION 
  ADD FOREIGN KEY FK_ETAPE_VALIDATION_EMPLOYE (MATRICULE)
      REFERENCES EMPLOYE (MATRICULE) ;


ALTER TABLE LIGNENOTE 
  ADD FOREIGN KEY FK_LIGNENOTE_NOTEFRAIS (IDNOTEFRAIS)
      REFERENCES NOTEFRAIS (IDNOTEFRAIS) ;


ALTER TABLE LIGNENOTE 
  ADD FOREIGN KEY FK_LIGNENOTE_TYPEFRAIS (IDTYPEFRAIS)
      REFERENCES TYPEFRAIS (IDTYPEFRAIS) ;


ALTER TABLE EMPLOYE 
  ADD FOREIGN KEY FK_EMPLOYE_TYPEPRODUIT (CODEPRODUIT)
      REFERENCES TYPEPRODUIT (CODEPRODUIT) ;


ALTER TABLE EMPLOYE 
  ADD FOREIGN KEY FK_EMPLOYE_EMPLOYE (MATRICULE_ÊTRE_RESPONSABLE)
      REFERENCES EMPLOYE (MATRICULE) ;


ALTER TABLE EMPLOYE 
  ADD FOREIGN KEY FK_EMPLOYE_TYPEMETIER (IDTYPEMETIER)
      REFERENCES TYPEMETIER (IDTYPEMETIER) ;


ALTER TABLE VALIDER 
  ADD FOREIGN KEY FK_VALIDER_ETAPE_VALIDATION (IDETAPVALID)
      REFERENCES ETAPE_VALIDATION (IDETAPVALID) ;


ALTER TABLE VALIDER 
  ADD FOREIGN KEY FK_VALIDER_NOTEFRAIS (IDNOTEFRAIS)
      REFERENCES NOTEFRAIS (IDNOTEFRAIS) ;

