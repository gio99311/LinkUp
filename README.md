# 🌐 LinkHub - Piattaforma stile Linktree con Laravel 12 e Livewire

LinkUp è un'applicazione web realizzata con **Laravel 12**, **Livewire** e **Bootstrap 5.3**, che consente agli utenti di creare una pagina personale contenente tutti i propri link ai social media. Il progetto permette una gestione semplice e veloce dei propri profili digitali, in un’unica interfaccia responsive e moderna.

---

## 🚀 Funzionalità principali

### 👤 Profilo utente (protetto da middleware)
- Accessibile solo agli utenti autenticati.
- Possibilità di modificare:
  - **Username**
  - **Biografia**
  - **Link social associati**
- Interfaccia Livewire con validazioni in tempo reale.
- Modal di conferma al salvataggio del profilo.
- Redirect automatico alla pagina pubblica dopo l’aggiornamento.

### 🔗 Selezione e gestione dei social
- L’utente può selezionare i social.
- Inserimento dei link per ciascuna piattaforma selezionata.
- Tutti i link vengono salvati contemporaneamente.
- Possibilità di rimuovere un singolo link.
- Validazione URL in formato `https://...` per garantire link corretti.

### 👁️‍🗨️ Anteprima del sito
- Pulsante “**Vedi anteprima del tuo profilo**” per accedere rapidamente alla visualizzazione pubblica della propria pagina.

### 🌍 Pagina pubblica dell’utente
- Ogni utente ha una pagina pubblica accessibile tramite URL
- Interfaccia responsive e accessibile anche da mobile.
- Pulsante per **copiare l’URL negli appunti**, così l’utente può condividerlo facilmente con altri.

## 💻 Tecnologie utilizzate

- **Laravel 12**
- **Livewire 3**
- **Bootstrap 5** (via Vite)
- **Vite** per la gestione di asset e JS
- **MySQL** per il database

## 📸 Screenshot

### 📱 Homepage
![Homepage](public/screenshots/homepage-auth.png)

### 🔧 Pagina Profilo Utente
![Profilo Utente](public/screenshots/private-profile.png)

### 👁️‍🗨️ Pagina Profilo Pubblico
![Profilo Pubblico](public/screenshots/public-profile.png)

