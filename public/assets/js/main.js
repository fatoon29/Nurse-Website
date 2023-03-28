const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const success = urlParams.get('success')

if(success == 1){
    Swal.fire({
        icon: 'success',
        title: 'Message envoyé',
        text: 'Votre email à bien été envoyé',
    })
}