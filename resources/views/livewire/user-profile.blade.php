<div>
    <div>

    <form class="card p-5 shadow" wire:submit.prevent="updateProfile">
        <div class="mb-3">
            <label for="name" class="form-label">Username</label>
            <input type="text" class="form-control" id="name" wire:model="username" placeholder="{{Auth::user()->name}}">
            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
            
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Biografia</label>
            <textarea wire:model="bio" class="form-control" rows="3" id="bio" placeholder="Scrivi qualcosa su di te..."></textarea>
            @error('bio') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button class="border-0 rounded-5 mt-3 px-2 py-1 " type="submit">
            <i class="bi bi-pen color-b">Aggiorna</i>
        </button>
        

        <button class="btn btn-secondary" onclick="copyPageUrl()">📋 Copia URL</button>

        <!-- Messaggio di conferma che verrà mostrato dopo la copia -->
        <div id="copyMessage" style="display:none; color: green; margin-top: 10px;">
            URL copiato negli appunti!
        </div>

        <script>
            function copyPageUrl() {
                // Ottieni l'URL della pagina corrente
                const url = window.location.href;

                // Copia l'URL negli appunti
                navigator.clipboard.writeText(url)
                    .then(() => {
                        // Mostra il messaggio di successo dopo la copia
                        const messageDiv = document.getElementById('copyMessage');
                        messageDiv.style.display = 'block'; // Rendi visibile il messaggio
                        messageDiv.textContent = 'URL copiato negli appunti!'; // Imposta il testo

                        // Dopo 5 secondi, nascondi il messaggio
                        setTimeout(() => {
                            messageDiv.style.display = 'none';  // Nascondi il messaggio dopo 5 secondi
                        }, 5000);  // 5000 ms = 5 secondi
                    })
                    .catch((err) => {
                        // Gestione errore (se qualcosa va storto)
                        const messageDiv = document.getElementById('copyMessage');
                        messageDiv.style.display = 'block'; // Mostra il messaggio di errore
                        messageDiv.textContent = 'Errore nel copiare l\'URL: ' + err;
                        messageDiv.style.color = 'red'; // Cambia il colore per errore
                    });
            }
        </script>





    </form>
  
</div>

    
                        
</div>
