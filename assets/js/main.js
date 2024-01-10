// Get the wizard field
let q = document.querySelector('#q');
let res = document.getElementById("result");

function addResult(val) {
    q.value = val;
    res.innerHTML = '';
}

function showResults(val) {

    res.innerHTML = '';
    if (val.length < 4) {
        return;
    }
    let list = '';
    fetch('/api/adresses', {
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
            list += '<li onclick="addResult(\''+data[i]+'\')">' + data[i] + '</li>';
        }
        res.innerHTML = '<ul>' + list + '</ul>';
        return true;
    }).catch(function (err) {
        console.warn('Something went wrong.', err);
        return false;
    });
}