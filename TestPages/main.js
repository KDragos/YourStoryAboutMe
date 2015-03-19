var container = document.querySelector('.container');
var msnry = new Masonry( container, {
  // options
  columnWidth: 275,
  itemSelector: '.snippet'
});

msnry.layout()
