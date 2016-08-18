// external js: masonry.pkgd.js, imagesloaded.pkgd.js

// init Isotope
var grid = document.querySelector('.grid');

var msnry = new Masonry( grid, {
  itemSelector: '.grid-item',
  columnWidth: '.grid-sizer',
  percentPosition: true
});

imagesLoaded( grid ).on( 'progress', function() {
  // layout Masonry after each image loads
  msnry.layout();
});




$( ".grid-item" ).mouseover(function() {
  if($(this).find('div.namedisplay').html().length > 0){
    $(this).find('div.namedisplay').show();
  }
  if($(this).find('div.descriptiondisplay').html().length > 0){
    $(this).find('div.descriptiondisplay').show();
  }

});
$( ".grid-item" ).mouseleave(function() {
  $(this).find('div.namedisplay').hide();
  $(this).find('div.descriptiondisplay').hide();
});

//Make higher resolution pic
/*
$( ".grid-item" ).mouseclick(function() {
  $(this).find('div.namedisplay').hide();
  $(this).find('div.descriptiondisplay').hide();
});
*/
