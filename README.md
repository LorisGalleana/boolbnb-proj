# BOOLBNB

BoolBnB è una piattaforma web che consente agli utenti di cercare, visualizzare e gestire appartamenti in affitto. I proprietari di appartamenti possono registrarsi, aggiungere le loro proprietà, e sponsorizzarle per aumentarne la visibilità, mentre gli utenti interessati possono esplorare le opzioni disponibili e contattare i proprietari per maggiori informazioni.

## TECNOLOGIE UTILIZZATE

- **Frontend**: Vue.js, Vite, HTML, CSS (con Flexbox)
- **Backend**: Laravel 10
- **Database**: MySQL
- **Geocoding**: TomTom API
- **Sistema di Pagamento**: Braintree API

## FUNZIONALITÀ PRINCIPALI

- **Ricerca avanzata**: Gli utenti possono cercare appartamenti per città, indirizzo e vari filtri (stanze, letti, servizi aggiuntivi).
- **Dettagli appartamenti**: Ogni appartamento ha una pagina dedicata con dettagli completi, inclusi la mappa con la posizione e la possibilità di inviare messaggi al proprietario.
- **Registrazione e gestione appartamenti**: I proprietari possono registrarsi, aggiungere, modificare e sponsorizzare appartamenti.
- **Statistiche**: I proprietari possono visualizzare le statistiche delle visualizzazioni e dei messaggi per ogni appartamento.

## REQUISITI TECNICI

- **RT1**: Validazione client-side per tutti gli input.
- **RT2**: Salvataggio di latitudine e longitudine nel database per ogni appartamento.
- **RT3**: Sistema di pagamento tramite Braintree per sponsorizzare appartamenti.
- **RT4**: Sito responsivo per una visualizzazione ottimale su desktop e mobile.
- **RT5**: Filtraggio della ricerca e aggiornamento dei risultati senza refresh della pagina.

## REQUISITI FUNZIONALI

- **RF1**: Registrazione per i proprietari di appartamenti.
- **RF2**: Aggiunta di appartamenti alla piattaforma da parte dei proprietari.
- **RF3**: Ricerca di appartamenti per gli utenti non registrati.
- **RF4**: Visualizzazione dei dettagli degli appartamenti.
- **RF5**: Invio di messaggi da parte degli utenti ai proprietari.
- **RF6**: Visualizzazione dei messaggi ricevuti dai proprietari.
- **RF7**: Sponsorizzazione degli appartamenti da parte dei proprietari.
- **RF8**: Statistiche di visualizzazione degli appartamenti.

