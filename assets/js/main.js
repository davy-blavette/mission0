// Get the wizard field
let q = document.querySelector('#q');
let res = document.getElementById("result");
const url = '/api/address';
function addResult(val) {
    q.value = val;
    res.innerHTML = '';
    res.style.display = "none";
    save(val);
}

function showResults(val) {

    res.innerHTML = '';
    res.style.display = "block";
    if (val.length < 4) {
        return;
    }
    let list = '';
    fetch(url, {
        method: 'POST',
        body: JSON.stringify({
            q: val
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }}).then(
        function (response) {
            return response.json();
        }).then(function (data) {
        for (i=0; i<data.length; i++) {
            list += '<li onclick="addResult(\''+data[i].replaceAll("'", "\\'")+'\')">' + data[i] + '</li>';
        }
        res.innerHTML = '<ul>' + list + '</ul>';
        return true;
    }).catch(function (err) {
        console.warn('Something went wrong.', err);
        return false;
    });
}

function save(val) {

    fetch(url, {
        method: 'POST',
        body: JSON.stringify({
            address: val
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8'
        }}).then(
        function (response) {
            return response.json();
        }).then(function (data) {
        res.innerHTML = 'save';
        return true;
    }).catch(function (err) {
        console.warn('Something went wrong.', err);
        return false;
    });
}
