{{-- <form id="chat-form">
    <textarea name="content" id="content" class="form-control" rows="3" placeholder="Écrivez votre message..."></textarea>
    <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
</form>

<div id="chat-box">
    <!-- messages seront ajoutés ici -->
</div>
<script>
    const receiverId = {{ $selectedDoctor->id }};
    const senderName = "{{ auth()->user()->name }}";

    // Écoute les nouveaux messages via Echo
    Echo.private('chat.' + {{ auth()->id() }})
        .listen('MessageSent', (e) => {
            const msg = e.message;
            const chatBox = document.getElementById('chat-box');
            chatBox.innerHTML += `<div><strong>${msg.sender}:</strong> ${msg.content} <small>${msg.created_at}</small></div>`;
        });

    // Envoi du message avec Ajax
    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();
        let content = document.getElementById('content').value;

        fetch('{{ route('message.store') }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                receiver_id: receiverId,
                content: content
            })
        }).then(response => response.json())
          .then(data => {
              document.getElementById('content').value = '';
          });
    });
</script> --}}
