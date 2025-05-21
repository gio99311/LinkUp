
function copyPageUrl() {
    
    const url = window.location.href;
    navigator.clipboard.writeText(url).then(() => {
            
        const messageDiv = document.querySelector('#copyMessage');
        messageDiv.style.display = 'block'; 
        messageDiv.textContent = 'URL copiato negli appunti!';

        
        setTimeout(() => {
            messageDiv.style.display = 'none';  
        }, 5000);
    })
        
}

window.copyPageUrl = copyPageUrl;

window.addEventListener('profile-updated', () => {
    const modalElement = document.getElementById('profileUpdatedModal');
    if (modalElement) {
        const modal = new bootstrap.Modal(modalElement);
        modal.show();
        setTimeout(() => {
            modal.hide();
        }, 8000);
    }
});










