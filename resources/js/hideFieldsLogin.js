document.getElementById('login').addEventListener('change', displayButton);
document.getElementById('password').addEventListener('change', displayButton);
function displayButton() {
    if (document.getElementById('login').value != ''
        && document.getElementById('password').value != '') {
        document.getElementById('submit').hidden = false;
    } else {
        document.getElementById('submit').hidden = true;
    }
}
