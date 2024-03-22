
<button onclick="share()">Partager</button>

<script>
function share() {
  if (navigator.share) {
    navigator.share({
      title: 'Love you',
      text: 'Description de ce que vous partagez',
      url: 'http://localhost/PHP/Quizzeo/quizzstart.php?bb=Test22',
    })
    .then(() => console.log('Partage réussi !'))
    .catch((error) => console.error('Erreur de partage :', error));
  } else {
    alert('La fonction de partage n\'est pas prise en charge par votre navigateur.');
  }
}
</script>
