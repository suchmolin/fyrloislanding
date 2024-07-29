const scriptURL = 'https://script.google.com/macros/s/AKfycbyVUwo3TwJ0pZoqtztE8XMvXav8EeXO0SnYEAMZWxePMDwpEaPKkRU0-8zu3BjWJaUa9g/exec'


const form = document.forms['contact-form']



form.addEventListener('submit', e => {
  e.preventDefault()
  document.getElementById('btn_send_me').disabled = true; /* para desactivar el boton de enviar */

  fetch(scriptURL, { method: 'POST', body: new FormData(form)})
  .then(response => Swal.fire({
    title: "¡Enviado!",
    text: "En breve serás contactado por nuestro equipo de atención al cliente.",
    icon: "success"
  })) 
  .then(() => { window.location.reload(); })
  .catch(error => console.error('¡Error no se logro enviar!', error.message))
}  )  


