# ADC-Store

Progetto d'esame per il corso di **Programmazione per il Web** 2020-21 (Ingegneria dell’Informazione, Università degli Studi dell’Aquila).

## Il progetto

![main](READMEimages/main.jpg)

Il progetto prevede la progettazione e l'implementazione di un'applicazione web che faciliti la gestione della catena locale di supermercati ADC Store, con diversi punti vendita dislocati in città. 
Essa permette agli utenti di effettuare la propria spesa online e di scegliere le modalità di consegna/ritiro.
L'applicazione nasce dalla necessità della catena di supermercati di digitalizzare i servizi offerti ai clienti. L’importanza di tale digitalizzazione risulta evidente per far fronte alle difficoltà poste dall’attuale pandemia, sia nei confronti dell’attività, che ne risulta agevolata, sia verso i clienti, che possono effettuare la spesa comodamente da casa, senza necessità di spostamenti.

## Tipologie di utenti

- *Amministratore*

	Gestisce la merce in vendita e possiede una panoramica degli utenti registrati.

- *Utenti registrati*

	Possono effettuare la spesa, accumulare punti e salvare carrelli preferiti.

- *Utenti non registrati*

	Possono visualizzare i prodotti in vendita ed effettuare la registrazione per avere accesso alle funzionalità offerte agli utenti registrati.

## Requisiti

- Architetturali: applicazione web distribuita su tre livelli (*presentation*, *application* e *data management*).

- Tecnologici: 
	- Server: **Apache** (versione 2.4.48 o superiore)
	- Linguaggio lato server: **PHP** (versione 8.0.7 o superiore)
	- DBMS: **MariaDB** (versione 10.4.19 o superiore)
	- Web: **HTML** + **CSS** + **JavaScript**

- Interfaccia: *responsive*

## Istruzioni d'installazione
- Decomprimere la cartella ADC-Store ed inserirla all'interno della directory htdocs oppure public_html. Nel caso della public_html, è necessario indicare ad Apache la directory deputata ad ospitare il progetto tramite l'apposita direttiva in httpd.conf:
  ```
  <IfModule mod_userdir.c>
  	UserDir public_html
  </IfModule>
  ```
- Verificare che i diritti di accesso alla cartella siano impostati per garantire i privilegi di scrittura a tutti gli utenti del sistema. 
  In ambiente LINUX: spostare la cartella in /opt/lampp/htdocs. Inoltre abilitare i permessi di lettura su tutta la cartella ADC-Store scrivendo i seguenti comandi sul terminale:
  ```
  $ sudo chmod 777 /opt/lampp/htdocs/ADC-Store
  ```
- Inserire nel file *"configDB.php"* le proprie credenziali di accesso al database.
- Da riga di comando, portarsi sulla directory dove è presente il file *"adc_store.sql"* ed eseguire lo script per l'inizializzazione ed il popolamento del database:
	- in Windows:
	  ```
	  $ /xampp/mysql/bin/mysql -h localhost -u root -p -f < adc_store.sql
	  ```
	- in MacOS:
	  ```
	  $ /Applications/XAMPP/bin/mysql -u root -p -f < adc_store.sql
	  ```
	- in Linux:
	  ```
	  $ sudo /opt/lampp/bin/mysql -u root -p -f < adc_store.sql
	  ```
- Ai fini del reindirizzamento, se il progetto è stato inserito nella public_html, è necessario aggiornare il file .htaccess con il proprio nome utente nell'ultima regola di riscrittura (RewriteRule).
- Controllare l'abilitazione dei cookie sul proprio browser. Se non dovessero essere attivi, si verrà reindirizzati ad una pagina di errore.
- Per usufruire delle potenzialità dell'admin, si fornisce un account amministratore con le seguenti credenziali:
  - email: serafino.admin@gmail.com
  - password: secret
- La registrazione di nuovi admin non è consentita nel sito per simulare un maggiore realismo nell'applicazione. Per inserirne di nuovi, si consiglia di farlo dall'apposita console di gestione fornita da PHPMyAdmin, eseguendo una INSERT adeguata e passando la password cifrata tramite la funzione PHP password_hash().
- Goditi l'esperienza d'acquisto su **ADC-Store**!

## Informazioni aggiuntive
Si può visitare il sito facendo click sul seguente link: [ADC-Store](https://adcstore.altervista.org/)

## Il team di sviluppo

- [Angelo Casciani](https://github.com/AngeloC99)
- [David Di Marco](https://github.com/david99686)
- [Chiara Romano](https://github.com/Chiara-R) 


