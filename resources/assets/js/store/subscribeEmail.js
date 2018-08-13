$(document).ready(function () {

  $('#subscribeEmail').click(function (e) {
    e.preventDefault();
    var email = $('#subscribe-email').val();

    if (email) {
      fetch('/api/subscribe/email', { 
        method: 'POST', 
        credentials: 'same-origin',
        headers: { 
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({email: email}),
      }).then(function(results) {
        if (results.redirected) {
          return swal("Этот E-mail уже подписан!", {
            icon: "warning",
          });
        }
        return swal("Подписка оформлена!", {
          icon: "success",
        });
      });
    }
  });

});