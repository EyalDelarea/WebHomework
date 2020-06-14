if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

function ready() {


    document.getElementById("checkout").addEventListener('click', byebye);

}

function byebye() {

    window.alert("Thank you for your pruchse! ");
    window.location.replace('index.php');
}