let searchSubmit = document.getElementById('search');

searchSubmit.addEventListener('click', function(e) {
    let wordset = document.getElementById('textarea').value;

    if(wordset.length > 0) {
        formData = new FormData()
        formData.append("wordset", wordset);
        var requestOptions = {
            method: 'POST',
            body:formData,
            redirect: 'follow'
        }
        fetch('/gogole/detector.php', requestOptions)
        .then(response => response.text())
        .then(result => {
            document.getElementById('resultat').innerHTML = "Language "+result;
        })
        .catch(error => console.log('error', error));
    }else{
        document.getElementById('resultat').innerHTML = "Please enter a word set";
    }

    
})