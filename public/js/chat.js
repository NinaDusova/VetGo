$(document).ready(function () {
    let currentDoctorId = null;

    $(".person-circle").on("click", function () {
        const doctorId = $(this).data("id");
        const chatMessages = $("#chat-messages");
        const receiverIdInput = $("#receiver-id");

        receiverIdInput.val(doctorId);
        currentDoctorId = doctorId;

        const baseUrl = $('meta[name="base-url"]').attr("content");

        loadMessages(doctorId, chatMessages, baseUrl);
    });

    $("#chat-form").on("submit", function (e) {
        e.preventDefault();
        const message = $("#message-input").val();
        const receiverId = $("#receiver-id").val();
        const baseUrl = $('meta[name="base-url"]').attr("content");

        if (message) {
            $.ajax({
                url: `${baseUrl}/chat/send`,
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    receiver_id: receiverId,
                    message: message
                },
                success: function(response) {
                    if (response.status === 'success') {
                        const messageHtml = `
                            <div class="chat-message sent">
                                <p>${response.message.message}</p>
                                <small>${new Date(response.message.created_at).toLocaleTimeString()}</small>
                            </div>
                        `;
                        $("#chat-messages").append(messageHtml);
                        $("#message-input").val('');
                    }
                },
                error: function() {
                    alert("Message could not be sent. Please try again.");
                }
            });
        }
    });
    setInterval(function () {
        if (currentDoctorId) {
            const chatMessages = $("#chat-messages");
            const baseUrl = $('meta[name="base-url"]').attr("content");
            loadMessages(currentDoctorId, chatMessages, baseUrl);
        }
    }, 3000);
    function loadMessages(doctorId, chatMessages, baseUrl) {
        $.ajax({
            url: `${baseUrl}/chat/messages/${doctorId}`,
            method: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            success: function (messages) {
                chatMessages.html("");
                messages.forEach(function (msg) {
                    const messageClass = msg.sender_id === parseInt($("#receiver-id").val()) ? "received" : "sent";
                    const messageHtml = `
                        <div class="chat-message ${messageClass}">
                            <p>${msg.message}</p>
                            <small>${new Date(msg.created_at).toLocaleTimeString()}</small>
                        </div>
                    `;
                    chatMessages.append(messageHtml);
                });
            },
            error: function () {
                console.error("Could not load messages.");
            }
        });
    }
});
