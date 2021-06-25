DROP DATABASE IF EXISTS progettodiesame;
CREATE DATABASE progettodiesame;
USE progettodiesame;

CREATE TABLE Amministratore (
    email VARCHAR(30) NOT NULL,
    nome VARCHAR(15) NOT NULL,
    cognome VARCHAR(20) NOT NULL,
    password VARCHAR(15) NOT NULL,
    PRIMARY KEY (email)
);

CREATE TABLE Immagine(
    id CHAR(14) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    byte BLOB NOT NULL,
    formato VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE Premio(
	id CHAR(16) NOT NULL,
	punti INT NOT NULL,
	nome VARCHAR(15) NOT NULL,
	descrizione VARCHAR(100) NOT NULL,
	quantita INT NOT NULL,
	marca VARCHAR(15) NOT NULL,
    idImmagine CHAR(16) NOT NULL,
    PRIMARY KEY (id),
    INDEX (punti),
    FOREIGN KEY (idImmagine) REFERENCES Immagine(id)
    ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE CartaCredito(
	numero CHAR(19) NOT NULL,
	titolare VARCHAR(25) NOT NULL,
	circuito VARCHAR(15) NOT NULL,
	cvv INT NOT NULL,
	ammontare FLOAT NOT NULL,
	scadenza DATE NOT NULL,
	PRIMARY KEY (numero)
);

CREATE TABLE Indirizzo(
	via VARCHAR(25) NOT NULL,
	numerocivico INT NOT NULL,
	cap CHAR(5) NOT NULL,
	comune VARCHAR(25) NOT NULL,
	provincia CHAR(2) NOT NULL,
	predefinito BOOLEAN,
	PRIMARY KEY (via,numerocivico,cap)
);


CREATE TABLE UtenteReg(
    email VARCHAR(30) NOT NULL,
    nome VARCHAR(15) NOT NULL,
    cognome VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    punti INT NOT NULL,
	PRIMARY KEY (email)
);


CREATE TABLE UtenteSalvaIndirizzo(
	mailutente VARCHAR(30) NOT NULL,
	via VARCHAR(25) NOT NULL,
	numerocivico INT NOT NULL,
	cap CHAR(5) NOT NULL,
	PRIMARY KEY (mailutente,via,numerocivico,cap),
	FOREIGN KEY (mailutente) REFERENCES UtenteReg(email)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (via,numerocivico,cap) REFERENCES Indirizzo(via,numerocivico,cap)
	ON UPDATE CASCADE ON DELETE CASCADE		
);


CREATE TABLE UtenteUsaCarta(
    mailutente VARCHAR(30) NOT NULL,
    numerocarta CHAR(19) NOT NULL,
	PRIMARY KEY (mailutente,numerocarta),
	FOREIGN KEY (mailutente) REFERENCES UtenteReg(email)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (numerocarta) REFERENCES CartaCredito(numero)
	ON UPDATE CASCADE ON DELETE CASCADE		
);

CREATE TABLE Carrello(
    id CHAR(16) NOT NULL,
    nome VARCHAR(15) NOT NULL,
    mailutente VARCHAR(30) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (mailutente) REFERENCES UtenteReg(email)
	ON UPDATE CASCADE ON DELETE CASCADE

);

CREATE TABLE BuonoSconto(
    codice CHAR(15) NOT NULL,
    ammontare INT NOT NULL,
    percentuale BOOLEAN NOT NULL,
    scadenza DATE NOT NULL,
    mailutente VARCHAR(30) NOT NULL,
	PRIMARY KEY (codice),
	FOREIGN KEY (mailutente) REFERENCES UtenteReg(email)
);

CREATE TABLE Prodotto(
    id CHAR(16) NOT NULL,
    nome VARCHAR(15) NOT NULL,
    descrizione VARCHAR(100) NOT NULL,
    tipologia VARCHAR(20) NOT NULL,
    quantita INT NOT NULL,
    marca VARCHAR(15) NOT NULL,
    prezzo FLOAT NOT NULL,
    idImmagine CHAR(16) NOT NULL,
    PRIMARY KEY (id),
    INDEX (tipologia),
    INDEX (nome),
    FOREIGN KEY (idImmagine) REFERENCES Immagine(id)
    ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Contiene(
    idcarrello CHAR(16) NOT NULL,
    idprodotto CHAR(16) NOT NULL,
    quantitaNelCarrello INT NOT NULL,
	PRIMARY KEY (idcarrello,idprodotto),
	FOREIGN KEY (idcarrello) REFERENCES Carrello(id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idprodotto) REFERENCES Prodotto(id)
	ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Ordine(
    id CHAR(16) NOT NULL,
    dataacquisto DATE NOT NULL,
    prezzototale INT NOT NULL,
    idcarrello CHAR(16) NOT NULL,
    viaConsegna VARCHAR(25) NOT NULL,
    numerocivicoConsegna INT NOT NULL,
    capConsegna CHAR(5) NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (idcarrello) REFERENCES Carrello(id)
	ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (viaConsegna,numerocivicoConsegna,capConsegna) REFERENCES Indirizzo(via,numerocivico,cap)
    ON UPDATE CASCADE ON DELETE CASCADE
);




