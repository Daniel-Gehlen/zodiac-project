document.getElementById('checkSignoButton').addEventListener('click', function() {
    const birthdate = document.getElementById('birthdate').value;
    const resultContainer = document.getElementById('resultContainer');

    fetch(`result.php?birthdate=${encodeURIComponent(birthdate)}`)
    .then(response => response.text())
    .then(data => {
        resultContainer.innerHTML = data;
    })
    .catch(error => {
        console.error('Error:', error);
        resultContainer.innerHTML = "<p>Erro ao obter o signo. Tente novamente.</p>";
    });
});
